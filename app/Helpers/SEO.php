<?php

namespace App\Helpers;

class SEO
{
    private array $data = [
        'title' => 'Mohamed Elhabib - Engineering Portfolio',
        'description' => 'Portfolio of Mohamed Elhabib, showcasing engineering projects, DevOps infrastructure, and technical expertise.',
        'og_title' => null,
        'og_description' => null,
        'og_image' => null,
        'og_type' => 'website',
        'twitter_card' => 'summary_large_image',
        'canonical' => null,
        'noindex' => false,
    ];

    public function setTitle(string $title): self
    {
        $this->data['title'] = $title;
        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->data['description'] = $description;
        return $this;
    }

    public function setOgTitle(?string $title): self
    {
        $this->data['og_title'] = $title;
        return $this;
    }

    public function setOgDescription(?string $description): self
    {
        $this->data['og_description'] = $description;
        return $this;
    }

    public function setOgImage(?string $image): self
    {
        $this->data['og_image'] = $image;
        return $this;
    }

    public function setOgType(string $type): self
    {
        $this->data['og_type'] = $type;
        return $this;
    }

    public function setCanonical(?string $url): self
    {
        $this->data['canonical'] = $url;
        return $this;
    }

    public function setNoindex(bool $noindex): self
    {
        $this->data['noindex'] = $noindex;
        return $this;
    }

    public function render(): string
    {
        $d = $this->data;
        $html = '';

        $title = $d['title'];
        $description = $d['description'];
        $ogTitle = $d['og_title'] ?? $title;
        $ogDescription = $d['og_description'] ?? $description;

        $html .= "<title>" . $this->escape($title) . "</title>\n";
        $html .= '<meta name="description" content="' . $this->escape($description) . '">' . "\n";

        $html .= '<meta property="og:title" content="' . $this->escape($ogTitle) . '">' . "\n";
        $html .= '<meta property="og:description" content="' . $this->escape($ogDescription) . '">' . "\n";
        $html .= '<meta property="og:type" content="' . $this->escape($d['og_type']) . '">' . "\n";

        if ($d['og_image']) {
            $html .= '<meta property="og:image" content="' . $this->escape($d['og_image']) . '">' . "\n";
        }

        $html .= '<meta name="twitter:card" content="' . $this->escape($d['twitter_card']) . '">' . "\n";

        if ($d['canonical']) {
            $html .= '<link rel="canonical" href="' . $this->escape($d['canonical']) . '">' . "\n";
        }

        if ($d['noindex']) {
            $html .= '<meta name="robots" content="noindex, nofollow">' . "\n";
        }

        return $html;
    }

    private function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
}
