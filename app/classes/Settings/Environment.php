<?php
namespace App\Settings;

use App\Settings\Settings;

class Environment implements Settings
{
    /** @var string */
    private $locale;

    /** @var string */
    private $mediaUrl;

    /** @var string */
    private $timezone;

    /** @var string */
    private $viewsCache;

    public function __construct(array $config)
    {
        $this->locale = (string) ($config['locale'] ?? '');
        $this->mediaUrl = (string) ($config['mediaUrl'] ?? '');
        $this->timezone = (string) ($config['timezone'] ?? '');
        $this->viewsCache = (string) ($config['viewsCache'] ?? '');
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function getMediaUrl(): string
    {
        return $this->mediaUrl;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function getViewsCache(): string
    {
        return $this->viewsCache;
    }
}
