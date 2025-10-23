<?php

declare(strict_types=1);

namespace Fuzzrake\Tests;

use Composer\Pcre\Preg;
use Fuzzrake\CacheKey;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversClass(CacheKey::class)]
final class CacheKeyTest extends TestCase
{
    #[Test]
    public function getPrefixGeneratePsr6AndPsr16CompliantOutput(): void
    {
        $hadSlash = false;
        $hadPlus = false;

        for ($i = 0; $i < 5; ++$i) {
            $apiUrl = \sprintf('https://TEST%03d', $i);
            $result = CacheKey::getPrefix($apiUrl);

            // Use control result to simulate the calculations to make sure the filtering works properly.
            $controlResult = substr(base64_encode(hash('sha256', "Fuzzrake\\CacheKey\t{$apiUrl}", true)), 0, 32);

            if (str_contains($controlResult, '/')) {
                $hadSlash = true;
            }

            if (str_contains($controlResult, '+')) {
                $hadPlus = true;
            }

            self::assertSame(
                strtr($result, '._', '  '),
                strtr($controlResult, '/+', '  '),
                'Control result and result do not match. The control result calculation is probably broken.'
            );

            self::assertTrue(
                Preg::isMatch('#^[A-Za-z0-9._]{32}$#', $result),
                "{$result} cache key prefix is not PSR-6 compliant.",
            );
        }

        self::assertTrue($hadSlash, 'There were not test cases where a / sign would be filtered out. '
            .'Either the control result calculation is broken, or there were not enough iterations.');
        self::assertTrue($hadPlus, 'There were not test cases where a + sign would be filtered out. '
            .'Either the control result calculation is broken, or there were not enough iterations.');
    }
}
