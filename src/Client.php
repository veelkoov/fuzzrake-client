<?php

declare(strict_types=1);

namespace Fuzzrake;

use Psr\SimpleCache\CacheInterface;
use Psr\SimpleCache\InvalidArgumentException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class Client
{
    private readonly string $cacheKeyPrefix;

    public function __construct(
        private readonly CacheInterface $cache,
        private readonly string $apiBaseUrl,
        private readonly int $ttlMinutes = 60,
    ) {
        if ($this->ttlMinutes < 60) {
            throw new \InvalidArgumentException('TTL must be minimum 60 minutes.');
        }

        $this->cacheKeyPrefix = CacheKey::getPrefix($this->apiBaseUrl);
    }

    public function getCreator(string $creatorId): Creator
    {
        try {
            $result = $this->cache->get($this->getCacheKey($creatorId));

            if (null === $result) {
                $result = $this->refetch($creatorId);

                $this->cache->set($this->getCacheKey($creatorId), $result, $this->ttlMinutes * 60);
            }

            return $result;
        } catch (InvalidArgumentException $exception) {
            throw new \RuntimeException('Unsupported cache key.', previous: $exception);
        }
    }

    private function getCacheKey(string $creatorId): string
    {
        return $this->cacheKeyPrefix.$creatorId;
    }

    private function refetch(string $creatorId): Creator
    {
        $client = HttpClient::create();

        try {
            $response = $client->request('GET', $this->apiBaseUrl.'/api/creator/'.$creatorId);
            return new Creator($response->toArray());
        } catch (ExceptionInterface $exception) {
            throw new \RuntimeException(previous: $exception); // FIXME
        }
    }
}
