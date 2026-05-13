<?php

namespace App\Helpers;

class Language
{
    private static ?array $strings = [];
    private static ?string $currentLocale = null;

    public static function get(string $key, array $replacements = []): string
    {
        $locale = self::getLocale();
        self::load($locale);

        $value = self::$strings[$locale][$key] ?? $key;

        foreach ($replacements as $k => $v) {
            $value = str_replace('{' . $k . '}', $v, $value);
        }

        return $value;
    }

    public static function getLocale(): string
    {
        if (self::$currentLocale === null) {
            self::$currentLocale = \App\Core\Session::get('locale', 'en');
        }
        return self::$currentLocale;
    }

    public static function setLocale(string $locale): void
    {
        $locale = in_array($locale, ['en', 'ar']) ? $locale : 'en';
        self::$currentLocale = $locale;
        \App\Core\Session::set('locale', $locale);
    }

    public static function isRtl(): bool
    {
        return self::getLocale() === 'ar';
    }

    public static function dir(): string
    {
        return self::isRtl() ? 'rtl' : 'ltr';
    }

    public static function load(string $locale): void
    {
        if (isset(self::$strings[$locale])) {
            return;
        }

        $file = __DIR__ . '/../../lang/' . $locale . '.php';
        if (file_exists($file)) {
            self::$strings[$locale] = require $file;
        } else {
            self::$strings[$locale] = [];
        }
    }

    public static function t(string $key, array $replacements = []): string
    {
        return self::get($key, $replacements);
    }
}
