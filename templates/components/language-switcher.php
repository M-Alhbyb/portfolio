<div class="flex items-center space-x-2" dir="ltr">
    <a href="/lang/en" class="text-xs px-2 py-1 rounded <?= \App\Helpers\Language::getLocale() === 'en' ? 'bg-blue-500 text-white' : 'text-gray-400 hover:text-white' ?> transition-colors">EN</a>
    <a href="/lang/ar" class="text-xs px-2 py-1 rounded <?= \App\Helpers\Language::getLocale() === 'ar' ? 'bg-blue-500 text-white' : 'text-gray-400 hover:text-white' ?> transition-colors">AR</a>
</div>
