<div class="flex items-center space-x-2" dir="ltr">
    <a href="/lang/en" class="text-xs px-2 py-1 font-mono <?= \App\Helpers\Language::getLocale() === 'en' ? 'text-cat-green bg-cat-surface0' : 'text-cat-subtext0 hover:text-cat-text' ?> transition-colors">EN</a>
    <a href="/lang/ar" class="text-xs px-2 py-1 font-mono <?= \App\Helpers\Language::getLocale() === 'ar' ? 'text-cat-green bg-cat-surface0' : 'text-cat-subtext0 hover:text-cat-text' ?> transition-colors">AR</a>
</div>
