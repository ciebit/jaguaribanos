<?php

declare(strict_types=1);

namespace App\Settings;

use App\Settings\Settings;

class Environment implements Settings
{
    private string $locale;
    private string $mediaUrl;
    private string $timezone;
    private string $viewsCache;
    
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
