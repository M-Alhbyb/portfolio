<?php

namespace App\Controllers;

use App\Helpers\Language;

class LanguageController
{
    public function switch(array $params = []): void
    {
        $locale = $params['locale'] ?? 'en';
        Language::setLocale($locale);

        $redirect = '/';
        if (!empty($_SERVER['HTTP_REFERER'])) {
            $referer = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
            $host = $_SERVER['HTTP_HOST'] ?? '';
            if ($referer === $host) {
                $redirect = $_SERVER['HTTP_REFERER'];
            }
        }
        header('Location: ' . $redirect);
        exit;
    }
}
