<div class="term-section">
    <p class="term-prompt text-cat-green text-xs font-mono mb-1">./posts</p>
    <h1 class="text-lg font-bold text-cat-mauve font-mono mb-6"><?= !empty($post['id']) ? 'Edit Post' : 'Create Post' ?></h1>

    <form method="POST" action="<?= !empty($post['id']) ? '/admin/posts/' . (int) $post['id'] : '/admin/posts' ?>" class="space-y-4">
        <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
        <?php if (!empty($post['id'])): ?>
            <input type="hidden" name="_method" value="PUT">
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="term-panel p-3 border-cat-red">
                <?php foreach ($errors as $fieldErrs): ?>
                    <?php foreach ($fieldErrs as $err): ?>
                        <p class="text-xs text-cat-red font-mono"><?= htmlspecialchars($err) ?></p>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label class="block text-xs text-cat-peach font-mono mb-1">Title *</label>
                <input type="text" name="title" value="<?= htmlspecialchars($post['title'] ?? '') ?>" required maxlength="200" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-peach font-mono mb-1">Slug</label>
                <input type="text" name="slug" value="<?= htmlspecialchars($post['slug'] ?? '') ?>" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-peach font-mono mb-1">Status</label>
                <select name="status" class="w-full px-3 py-2 text-sm">
                    <option value="draft" <?= ($post['status'] ?? '') === 'draft' ? 'selected' : '' ?>>Draft</option>
                    <option value="published" <?= ($post['status'] ?? '') === 'published' ? 'selected' : '' ?>>Published</option>
                </select>
            </div>
            <div>
                <label class="block text-xs text-cat-peach font-mono mb-1">Locale</label>
                <select name="locale" class="w-full px-3 py-2 text-sm">
                    <option value="en" <?= ($post['locale'] ?? 'en') === 'en' ? 'selected' : '' ?>>English</option>
                    <option value="ar" <?= ($post['locale'] ?? '') === 'ar' ? 'selected' : '' ?>>Arabic</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-xs text-cat-peach font-mono mb-1">Excerpt</label>
            <textarea name="excerpt" rows="2" maxlength="500" class="w-full px-3 py-2 text-sm"><?= htmlspecialchars($post['excerpt'] ?? '') ?></textarea>
        </div>

        <div>
            <label class="block text-xs text-cat-peach font-mono mb-1">Content (Markdown) *</label>
            <textarea name="content" required rows="16" class="w-full px-3 py-2 text-sm font-mono resize-none"><?= htmlspecialchars($post['content'] ?? '') ?></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs text-cat-peach font-mono mb-1">Categories</label>
                <select name="category_ids[]" multiple class="w-full px-3 py-2 text-sm">
                    <?php foreach ($categories ?? [] as $cat): ?>
                        <option value="<?= (int) $cat['id'] ?>"
                            <?= in_array($cat['id'], array_column($selectedCategories ?? [], 'id')) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($cat['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-xs text-cat-peach font-mono mb-1">Tags</label>
                <select name="tag_ids[]" multiple class="w-full px-3 py-2 text-sm">
                    <?php foreach ($tags ?? [] as $tag): ?>
                        <option value="<?= (int) $tag['id'] ?>"
                            <?= in_array($tag['id'], array_column($selectedTags ?? [], 'id')) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($tag['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs text-cat-peach font-mono mb-1">Meta Title (SEO)</label>
                <input type="text" name="meta_title" value="<?= htmlspecialchars($post['meta_title'] ?? '') ?>" maxlength="70" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-peach font-mono mb-1">Meta Description (SEO)</label>
                <textarea name="meta_description" rows="2" maxlength="160" class="w-full px-3 py-2 text-sm"><?= htmlspecialchars($post['meta_description'] ?? '') ?></textarea>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="term-btn term-btn-primary text-sm py-2 px-4">$ <?= !empty($post['id']) ? 'update' : 'create' ?></button>
            <a href="/admin/posts" class="text-xs text-cat-subtext0 hover:text-cat-text font-mono">cancel</a>
        </div>
    </form>
</div>
