<?php

declare(strict_types=1);

namespace Fuzzrake\Tests;

use Fuzzrake\Creator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversClass(Creator::class)]
final class PaymentPlansBcTest extends TestCase
{
    /**
     * @param array<mixed> $data
     */
    #[DataProvider('provideSthCases')]
    public function testSth(array $data, ?bool $expectedOffersPaymentPlans, string $expectedPaymentPlansInfo): void
    {
        $subject = new Creator($data);

        self::assertSame($expectedOffersPaymentPlans, $subject->getOffersPaymentPlans());
        self::assertSame($expectedPaymentPlansInfo, $subject->getPaymentPlansInfo());
    }

    /**
     * @return array<string, array{array<mixed>, ?bool, string}>
     */
    public static function provideSthCases(): iterable
    {
        return [
            'Legacy, missing information' => [
                ['PAYMENT_PLANS' => ''], null, '',
            ],
            'Legacy, no payment plans' => [
                ['PAYMENT_PLANS' => 'None'], false, '',
            ],
            'Legacy, offers payment plans' => [
                ['PAYMENT_PLANS' => 'Something'], true, 'Something',
            ],
            'New, missing information' => [
                ['OFFERS_PAYMENT_PLANS' => null, 'PAYMENT_PLANS_INFO' => ''], null, '',
            ],
            'New, no payment plans' => [
                ['OFFERS_PAYMENT_PLANS' => false, 'PAYMENT_PLANS_INFO' => ''], false, '',
            ],
            'New, offers payment plans, no extra info' => [
                ['OFFERS_PAYMENT_PLANS' => true, 'PAYMENT_PLANS_INFO' => ''], true, '',
            ],
            'New, offers payment plans, with extra info' => [
                ['OFFERS_PAYMENT_PLANS' => true, 'PAYMENT_PLANS_INFO' => 'Something'], true, 'Something',
            ],
        ];
    }
}
