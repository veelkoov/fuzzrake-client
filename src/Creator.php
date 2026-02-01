<?php

declare(strict_types=1);

namespace Fuzzrake;

final class Creator
{
    private const MAKER_ID = 'MAKER_ID';
    private const FORMER_MAKER_IDS = 'FORMER_MAKER_IDS';
    private const FORMERLY = 'FORMERLY';
    private const INTRO = 'INTRO';
    private const SINCE = 'SINCE';
    private const LANGUAGES = 'LANGUAGES';
    private const COUNTRY = 'COUNTRY';
    private const STATE = 'STATE';
    private const CITY = 'CITY';
    private const PRODUCTION_MODELS_COMMENT = 'PRODUCTION_MODELS_COMMENT';
    private const PRODUCTION_MODELS = 'PRODUCTION_MODELS';
    private const STYLES_COMMENT = 'STYLES_COMMENT';
    private const STYLES = 'STYLES';
    private const OTHER_STYLES = 'OTHER_STYLES';
    private const ORDER_TYPES_COMMENT = 'ORDER_TYPES_COMMENT';
    private const ORDER_TYPES = 'ORDER_TYPES';
    private const OTHER_ORDER_TYPES = 'OTHER_ORDER_TYPES';
    private const FEATURES_COMMENT = 'FEATURES_COMMENT';
    private const FEATURES = 'FEATURES';
    private const OTHER_FEATURES = 'OTHER_FEATURES';
    private const LEGACY_PAYMENT_PLANS = 'PAYMENT_PLANS';
    private const OFFERS_PAYMENT_PLANS = 'OFFERS_PAYMENT_PLANS';
    private const PAYMENT_PLANS_INFO = 'PAYMENT_PLANS_INFO';
    private const SPECIES_COMMENT = 'SPECIES_COMMENT';
    private const SPECIES_DOES = 'SPECIES_DOES';
    private const SPECIES_DOESNT = 'SPECIES_DOESNT';
    private const URL_WEBSITE = 'URL_WEBSITE';
    private const URL_PRICES = 'URL_PRICES';
    private const URL_COMMISSIONS = 'URL_COMMISSIONS';
    private const URL_FAQ = 'URL_FAQ';
    private const URL_FUR_AFFINITY = 'URL_FUR_AFFINITY';
    private const URL_DEVIANTART = 'URL_DEVIANTART';
    private const URL_MASTODON = 'URL_MASTODON';
    private const URL_TWITTER = 'URL_TWITTER';
    private const URL_FACEBOOK = 'URL_FACEBOOK';
    private const URL_TUMBLR = 'URL_TUMBLR';
    private const URL_INSTAGRAM = 'URL_INSTAGRAM';
    private const URL_YOUTUBE = 'URL_YOUTUBE';
    private const URL_LINKLIST = 'URL_LINKLIST';
    private const URL_FURRY_AMINO = 'URL_FURRY_AMINO';
    private const URL_ETSY = 'URL_ETSY';
    private const URL_THE_DEALERS_DEN = 'URL_THE_DEALERS_DEN';
    private const URL_OTHER_SHOP = 'URL_OTHER_SHOP';
    private const URL_QUEUE = 'URL_QUEUE';
    private const URL_SCRITCH = 'URL_SCRITCH';
    private const URL_FURTRACK = 'URL_FURTRACK';
    private const CS_TRACKER_ISSUE = 'CS_TRACKER_ISSUE';
    private const OPEN_FOR = 'OPEN_FOR';
    private const CLOSED_FOR = 'CLOSED_FOR';

    /**
     * @param array<mixed> $data
     */
    public function __construct(
        private readonly array $data,
    ) {}

    /**
     * @return list<string>
     */
    public function getAllCreatorIds(): array
    {
        $result = $this->getStringList(self::FORMER_MAKER_IDS);

        if ('' !== ($creatorId = $this->getString(self::MAKER_ID))) {
            array_unshift($result, $creatorId);
        }

        return $result;
    }

    public function getCreatorId(): string
    {
        return $this->getString('MAKER_ID');
    }

    public function getName(): string
    {
        return $this->getString('NAME');
    }

    /**
     * @return list<string>
     */
    public function getFormerly(): array
    {
        return $this->getStringList(self::FORMERLY);
    }

    public function getIntro(): string
    {
        return $this->getString(self::INTRO);
    }

    public function getSince(): string
    {
        return $this->getString(self::SINCE);
    }

    public function getCountry(): string
    {
        return $this->getString(self::COUNTRY);
    }

    public function getState(): string
    {
        return $this->getString(self::STATE);
    }

    public function getCity(): string
    {
        return $this->getString(self::CITY);
    }

    /**
     * @return list<string>
     */
    public function getProductionModels(): array
    {
        return $this->getStringList(self::PRODUCTION_MODELS);
    }

    public function getProductionModelsComment(): string
    {
        return $this->getString(self::PRODUCTION_MODELS_COMMENT);
    }

    /**
     * @return list<string>
     */
    public function getStyles(): array
    {
        return $this->getStringList(self::STYLES);
    }

    /**
     * @return list<string>
     */
    public function getOtherStyles(): array
    {
        return $this->getStringList(self::OTHER_STYLES);
    }

    public function getStylesComment(): string
    {
        return $this->getString(self::STYLES_COMMENT);
    }

    /**
     * @return list<string>
     */
    public function getOrderTypes(): array
    {
        return $this->getStringList(self::ORDER_TYPES);
    }

    /**
     * @return list<string>
     */
    public function getOtherOrderTypes(): array
    {
        return $this->getStringList(self::OTHER_ORDER_TYPES);
    }

    public function getOrderTypesComment(): string
    {
        return $this->getString(self::ORDER_TYPES_COMMENT);
    }

    /**
     * @return list<string>
     */
    public function getFeatures(): array
    {
        return $this->getStringList(self::FEATURES);
    }

    /**
     * @return list<string>
     */
    public function getOtherFeatures(): array
    {
        return $this->getStringList(self::OTHER_FEATURES);
    }

    public function getFeaturesComment(): string
    {
        return $this->getString(self::FEATURES_COMMENT);
    }

    public function getWebsiteUrl(): string
    {
        return $this->getString(self::URL_WEBSITE);
    }

    public function getFurAffinityUrl(): string
    {
        return $this->getString(self::URL_FUR_AFFINITY);
    }

    public function getDeviantArtUrl(): string
    {
        return $this->getString(self::URL_DEVIANTART);
    }

    public function getMastodonUrl(): string
    {
        return $this->getString(self::URL_MASTODON);
    }

    public function getTwitterUrl(): string
    {
        return $this->getString(self::URL_TWITTER);
    }

    public function getFacebookUrl(): string
    {
        return $this->getString(self::URL_FACEBOOK);
    }

    public function getTumblrUrl(): string
    {
        return $this->getString(self::URL_TUMBLR);
    }

    public function getInstagramUrl(): string
    {
        return $this->getString(self::URL_INSTAGRAM);
    }

    public function getYouTubeUrl(): string
    {
        return $this->getString(self::URL_YOUTUBE);
    }

    public function getLinkListUrl(): string
    {
        return $this->getString(self::URL_LINKLIST);
    }

    public function getFurryAmino(): string
    {
        return $this->getString(self::URL_FURRY_AMINO);
    }

    public function getEtsyUrl(): string
    {
        return $this->getString(self::URL_ETSY);
    }

    public function getTheDealersDenUrl(): string
    {
        return $this->getString(self::URL_THE_DEALERS_DEN);
    }

    public function getOtherShopUrl(): string
    {
        return $this->getString(self::URL_OTHER_SHOP);
    }

    public function getScritchUrl(): string
    {
        return $this->getString(self::URL_SCRITCH);
    }

    public function getFurtrackUrl(): string
    {
        return $this->getString(self::URL_FURTRACK);
    }

    public function getOffersPaymentPlans(): ?bool
    {
        return $this->getPaymentPlans()[0];
    }

    public function getPaymentPlansInfo(): string
    {
        return $this->getPaymentPlans()[1];
    }

    public function getSpeciesComment(): string
    {
        return $this->getString(self::SPECIES_COMMENT);
    }

    /**
     * @return list<string>
     */
    public function getSpeciesDoes(): array
    {
        return $this->getStringList(self::SPECIES_DOES);
    }

    /**
     * @return list<string>
     */
    public function getSpeciesDoesnt(): array
    {
        return $this->getStringList(self::SPECIES_DOESNT);
    }

    /**
     * @return list<string>
     */
    public function getLanguages(): array
    {
        return $this->getStringList(self::LANGUAGES);
    }

    public function getFaqUrl(): string
    {
        return $this->getString(self::URL_FAQ);
    }

    public function getPricesUrl(): string
    {
        return $this->getString(self::URL_PRICES);
    }

    public function getQueueUrl(): string
    {
        return $this->getString(self::URL_QUEUE);
    }

    public function getCommissionsUrl(): string
    {
        return $this->getString(self::URL_COMMISSIONS);
    }

    /**
     * @return list<string>
     */
    public function getOpenFor(): array
    {
        return $this->getStringList(self::OPEN_FOR);
    }

    /**
     * @return list<string>
     */
    public function getClosedFor(): array
    {
        return $this->getStringList(self::CLOSED_FOR);
    }

    public function getCsTrackerIssue(): ?bool
    {
        return $this->getBool(self::CS_TRACKER_ISSUE);
    }

    /**
     * @return array{?bool, string}
     */
    private function getPaymentPlans(): array
    {
        if (!\array_key_exists(self::LEGACY_PAYMENT_PLANS, $this->data)) {
            return [$this->getBool(self::OFFERS_PAYMENT_PLANS), $this->getString(self::PAYMENT_PLANS_INFO)];
        }

        $plans = $this->getStringList(self::LEGACY_PAYMENT_PLANS);

        if ([] === $plans) {
            return [null, ''];
        }
        if (['None'] === $plans) {
            return [false, ''];
        }
        if (1 === \count($plans)) {
            return [true, $plans[0]];
        }

        return [true, '- '.implode("\n- ", $plans)];
    }

    private function getString(string $field): string
    {
        $result = $this->data[$field] ?? '';

        return \is_string($result) ? $result : '';
    }

    private function getBool(string $field): ?bool
    {
        $value = $this->data[$field] ?? null;

        return \is_bool($value) ? $value : null;
    }

    /**
     * @return list<string>
     */
    private function getStringList(string $field): array
    {
        $result = $this->data[$field] ?? null;

        if (!\is_array($result) || !array_is_list($result) || !array_all($result, static fn (mixed $item) => \is_string($item))) {
            return [];
        }

        return $result; // @phpstan-ignore return.type
    }
}
