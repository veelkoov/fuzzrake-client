<?php

declare(strict_types=1);

namespace Fuzzrake;

final class CacheKey
{
    private function __construct() {}

    public static function getPrefix(string $apiBaseUrl): string
    {
        $hash = base64_encode(hash('sha256', self::class."\t".$apiBaseUrl, true));
        \assert(44 === \strlen($hash));

        // Will get rid of the = padding and keep us way below 64 char limit PSR-16 allows
        // So 32 characters are left for keys, far enough
        $short = substr($hash, 0, 32);

        // PSR-16 allows A-Z a-z 0-9 . _
        // = were removed above
        return strtr($short, '+/', '._');
    }
}
