<div class="term-section">
    <p class="term-prompt text-cat-green text-xs font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.cmd') ?></p>
    <h1 class="text-lg font-bold text-cat-mauve font-mono mb-6"><?= !empty($project['id']) ? \App\Helpers\Language::t('admin.projects.form.edit_title') : \App\Helpers\Language::t('admin.projects.form.create_title') ?></h1>

    <form method="POST" action="<?= !empty($project['id']) ? '/admin/projects/' . (int) $project['id'] : '/admin/projects' ?>" enctype="multipart/form-data" class="space-y-4">
        <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
        <?php if (!empty($project['id'])): ?>
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
                <label class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.title') ?></label>
                <input type="text" name="title" value="<?= htmlspecialchars($project['title'] ?? '') ?>" required maxlength="200" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.slug') ?></label>
                <input type="text" name="slug" value="<?= htmlspecialchars($project['slug'] ?? '') ?>" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.status') ?></label>
                <select name="status" class="w-full px-3 py-2 text-sm">
                    <option value="draft" <?= ($project['status'] ?? '') === 'draft' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.projects.form.draft') ?></option>
                    <option value="published" <?= ($project['status'] ?? '') === 'published' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.projects.form.published') ?></option>
                </select>
            </div>
            <div>
                <label class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.featured') ?></label>
                <select name="featured" class="w-full px-3 py-2 text-sm">
                    <option value="0" <?= ($project['featured'] ?? 'false') === 'false' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.projects.form.no') ?></option>
                    <option value="1" <?= ($project['featured'] ?? '') === 'true' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.projects.form.yes') ?></option>
                </select>
            </div>
            <div>
                <label class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.sort_order') ?></label>
                <input type="number" name="sort_order" value="<?= (int) ($project['sort_order'] ?? 0) ?>" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.project_link') ?></label>
                <input type="url" name="link" value="<?= htmlspecialchars($project['link'] ?? '') ?>" class="w-full px-3 py-2 text-sm">
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.short_desc') ?></label>
                <textarea name="short_description" required maxlength="500" rows="3" class="w-full px-3 py-2 text-sm resize-none"><?= htmlspecialchars($project['short_description'] ?? '') ?></textarea>
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.tech_stack') ?></label>
                <input type="text" name="tech_stack" value="<?= htmlspecialchars($project['tech_stack'] ?? '') ?>" class="w-full px-3 py-2 text-sm">
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.content') ?></label>
                <textarea name="content" rows="10" class="w-full px-3 py-2 text-sm font-mono resize-none"><?= htmlspecialchars($project['content'] ?? '') ?></textarea>
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.architecture') ?></label>
                <textarea name="architecture_details" rows="6" class="w-full px-3 py-2 text-sm font-mono resize-none"><?= htmlspecialchars($project['architecture_details'] ?? '') ?></textarea>
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.challenges') ?></label>
                <textarea name="challenges" rows="6" class="w-full px-3 py-2 text-sm font-mono resize-none"><?= htmlspecialchars($project['challenges'] ?? '') ?></textarea>
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.outcomes') ?></label>
                <textarea name="outcomes" rows="6" class="w-full px-3 py-2 text-sm font-mono resize-none"><?= htmlspecialchars($project['outcomes'] ?? '') ?></textarea>
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs text-cat-peach font-mono mb-1"><?= \App\Helpers\Language::t('admin.projects.form.thumbnail') ?></label>
                <input type="file" name="thumbnail" accept="image/*" class="w-full px-3 py-2 text-sm">
                <?php if (!empty($project['thumbnail'])): ?>
                    <p class="text-xs text-cat-subtext0 font-mono mt-1"><?= \App\Helpers\Language::t('admin.projects.form.current', ['filename' => htmlspecialchars(basename($project['thumbnail']))]) ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-4">
            <button type="submit" class="term-btn term-btn-primary text-sm py-2 px-4">
                <?= !empty($project['id']) ? \App\Helpers\Language::t('admin.projects.form.update') : \App\Helpers\Language::t('admin.projects.form.create') ?>
            </button>
            <a href="/admin/projects" class="term-btn text-sm py-2 px-4"><?= \App\Helpers\Language::t('admin.projects.form.cancel') ?></a>
        </div>
    </form>
</div>
