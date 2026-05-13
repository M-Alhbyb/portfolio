<?php

namespace App\Helpers;

class Markdown
{
    public static function render(string $text): string
    {
        $text = self::escapeHtml($text);
        $text = self::renderHeaders($text);
        $text = self::renderBoldItalic($text);
        $text = self::renderLinks($text);
        $text = self::renderImages($text);
        $text = self::renderCodeBlocks($text);
        $text = self::renderInlineCode($text);
        $text = self::renderLists($text);
        $text = self::renderBlockquotes($text);
        $text = self::renderHorizontalRules($text);
        $text = self::renderParagraphs($text);

        return $text;
    }

    private static function escapeHtml(string $text): string
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }

    private static function renderHeaders(string $text): string
    {
        $text = preg_replace('/^###### (.+)$/m', '<h6>$1</h6>', $text);
        $text = preg_replace('/^##### (.+)$/m', '<h5>$1</h5>', $text);
        $text = preg_replace('/^#### (.+)$/m', '<h4>$1</h4>', $text);
        $text = preg_replace('/^### (.+)$/m', '<h3>$1</h3>', $text);
        $text = preg_replace('/^## (.+)$/m', '<h2>$1</h2>', $text);
        $text = preg_replace('/^# (.+)$/m', '<h1>$1</h1>', $text);
        return $text;
    }

    private static function renderBoldItalic(string $text): string
    {
        $text = preg_replace('/\*\*\*(.+?)\*\*\*/', '<strong><em>$1</em></strong>', $text);
        $text = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $text);
        $text = preg_replace('/\*(.+?)\*/', '<em>$1</em>', $text);
        return $text;
    }

    private static function renderLinks(string $text): string
    {
        return preg_replace('/\[([^\]]+)\]\(([^)]+)\)/', '<a href="$2" target="_blank" rel="noopener noreferrer" class="text-blue-400 hover:text-blue-300 underline">$1</a>', $text);
    }

    private static function renderImages(string $text): string
    {
        return preg_replace('/!\[([^\]]*)\]\(([^)]+)\)/', '<img src="$2" alt="$1" class="rounded-lg max-w-full">', $text);
    }

    private static function renderCodeBlocks(string $text): string
    {
        $text = preg_replace_callback('/```(\w*)\n(.*?)```/s', function ($matches) {
            $lang = $matches[1] ? ' class="language-' . htmlspecialchars($matches[1]) . '"' : '';
            return '<pre class="bg-gray-900 rounded-lg p-4 overflow-x-auto my-4"><code' . $lang . '>' . $matches[2] . '</code></pre>';
        }, $text);
        return $text;
    }

    private static function renderInlineCode(string $text): string
    {
        return preg_replace('/`([^`]+)`/', '<code class="bg-gray-800 text-red-400 px-1.5 py-0.5 rounded text-sm">$1</code>', $text);
    }

    private static function renderLists(string $text): string
    {
        $text = preg_replace('/^(\*|-|\+) (.+)$/m', '<li>$2</li>', $text);
        $text = preg_replace('/((?:<li>.*<\/li>\n?)+)/', '<ul class="list-disc list-inside my-2 space-y-1">$1</ul>', $text);

        $text = preg_replace('/^(\d+)\. (.+)$/m', '<li value="$1">$2</li>', $text);
        $text = preg_replace('/((?:<li value=.*<\/li>\n?)+)/', '<ol class="list-decimal list-inside my-2 space-y-1">$1</ol>', $text);
        return $text;
    }

    private static function renderBlockquotes(string $text): string
    {
        $text = preg_replace('/^> (.+)$/m', '<blockquote class="border-l-4 border-blue-500 pl-4 my-2 italic text-gray-300">$1</blockquote>', $text);
        return $text;
    }

    private static function renderHorizontalRules(string $text): string
    {
        return preg_replace('/^---$/m', '<hr class="my-6 border-gray-700">', $text);
    }

    private static function renderParagraphs(string $text): string
    {
        $lines = explode("\n", $text);
        $inBlock = false;
        $result = [];

        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) {
                if ($inBlock) {
                    $inBlock = false;
                }
                continue;
            }

            if (preg_match('/^<h[1-6]|<li|<pre|<blockquote|<hr/', $line)) {
                if ($inBlock) {
                    $inBlock = false;
                }
                $result[] = $line;
                continue;
            }

            if (preg_match('/^<\/?(ul|ol|pre|blockquote)/', $line)) {
                $result[] = $line;
                continue;
            }

            if (!$inBlock) {
                $inBlock = true;
                $result[] = '<p class="my-2 leading-relaxed">' . $line . '</p>';
            } else {
                $result[] = $line;
            }
        }

        return implode("\n", $result);
    }
}
