<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <p class="text-sm font-mono text-cyan-400 mb-1"><span class="text-gray-500">//</span> projects</p>
        <h1 class="text-2xl font-bold gradient-text"><?= !empty($project['id']) ? 'Edit Project' : 'Create Project' ?></h1>
    </div>

    <form method="POST" action="<?= !empty($project['id']) ? '/admin/projects/' . (int) $project['id'] : '/admin/projects' ?>" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
        <?php if (!empty($project['id'])): ?>
            <input type="hidden" name="_method" value="PUT">
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="p-4 rounded-lg bg-red-500/10 border border-red-500/20">
                <?php foreach ($errors as $fieldErrs): ?>
                    <?php foreach ($fieldErrs as $err): ?>
                        <p class="text-sm text-red-400"><?= htmlspecialchars($err) ?></p>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm text-gray-300 mb-1">Title *</label>
                <input type="text" name="title" value="<?= htmlspecialchars($project['title'] ?? '') ?>" required maxlength="200"
                       class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm text-gray-300 mb-1">Slug</label>
                <input type="text" name="slug" value="<?= htmlspecialchars($project['slug'] ?? '') ?>"
                       class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm text-gray-300 mb-1">Status</label>
                <select name="status" class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500">
                    <option value="draft" <?= ($project['status'] ?? '') === 'draft' ? 'selected' : '' ?>>Draft</option>
                    <option value="published" <?= ($project['status'] ?? '') === 'published' ? 'selected' : '' ?>>Published</option>
                </select>
            </div>
            <div>
                <label class="block text-sm text-gray-300 mb-1">Tech Stack (comma-separated)</label>
                <input type="text" name="tech_stack" value="<?= htmlspecialchars($project['tech_stack'] ?? '') ?>"
                       class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm text-gray-300 mb-1">Sort Order</label>
                <input type="number" name="sort_order" value="<?= (int) ($project['sort_order'] ?? 0) ?>"
                       class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm text-gray-300 mb-1">Link (URL)</label>
                <input type="url" name="link" value="<?= htmlspecialchars($project['link'] ?? '') ?>"
                       class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500">
            </div>
            <div class="md:col-span-2">
                <label class="flex items-center gap-2 text-sm text-gray-300">
                    <input type="checkbox" name="featured" value="1" <?= !empty($project['featured']) ? 'checked' : '' ?>
                           class="rounded bg-gray-800 border-gray-700 text-blue-500">
                    Featured project (show on homepage)
                </label>
            </div>
        </div>

        <div>
            <label class="block text-sm text-gray-300 mb-1">Short Description *</label>
            <textarea name="short_description" required rows="3" maxlength="500"
                      class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500"><?= htmlspecialchars($project['short_description'] ?? '') ?></textarea>
        </div>

        <div>
            <label class="block text-sm text-gray-300 mb-1">Content (Markdown) *</label>
            <textarea name="content" required rows="12"
                      class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500 font-mono text-sm"><?= htmlspecialchars($project['content'] ?? '') ?></textarea>
        </div>

        <div>
            <label class="block text-sm text-gray-300 mb-1">Architecture Details (Markdown)</label>
            <textarea name="architecture_details" rows="6"
                      class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500 font-mono text-sm"><?= htmlspecialchars($project['architecture_details'] ?? '') ?></textarea>
        </div>

        <div>
            <label class="block text-sm text-gray-300 mb-1">Challenges Solved (Markdown)</label>
            <textarea name="challenges" rows="6"
                      class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500 font-mono text-sm"><?= htmlspecialchars($project['challenges'] ?? '') ?></textarea>
        </div>

        <div>
            <label class="block text-sm text-gray-300 mb-1">Deployment & Process Notes (Markdown)</label>
            <textarea name="deployment_notes" rows="6"
                      class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500 font-mono text-sm"><?= htmlspecialchars($project['deployment_notes'] ?? '') ?></textarea>
        </div>

        <div>
            <label class="block text-sm text-gray-300 mb-1">Measurable Outcomes (Markdown)</label>
            <textarea name="outcomes" rows="6"
                      class="w-full px-4 py-2.5 rounded-lg bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500 font-mono text-sm"><?= htmlspecialchars($project['outcomes'] ?? '') ?></textarea>
        </div>

        <?php if (!empty($images)): ?>
        <div>
            <label class="block text-sm text-gray-300 mb-2">Gallery Images</label>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php foreach ($images as $img): ?>
                <div class="glass-card rounded-lg p-3">
                    <input type="hidden" name="existing_images[<?= (int) $img['id'] ?>][id]" value="<?= (int) $img['id'] ?>">
                    <div class="aspect-video rounded-lg overflow-hidden bg-gray-800 mb-2">
                        <img src="/<?= htmlspecialchars($img['filepath']) ?>" alt="" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div class="space-y-2">
                        <div>
                            <label class="block text-xs text-gray-400 mb-0.5">Alt Text</label>
                            <input type="text" name="existing_images[<?= (int) $img['id'] ?>][alt_text]"
                                   value="<?= htmlspecialchars($img['alt_text'] ?? '') ?>"
                                   class="w-full px-2 py-1 text-xs rounded bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-400 mb-0.5">Sort Order</label>
                            <input type="number" name="existing_images[<?= (int) $img['id'] ?>][sort_order]"
                                   value="<?= (int) ($img['sort_order'] ?? 0) ?>"
                                   class="w-full px-2 py-1 text-xs rounded bg-gray-800/50 border border-gray-700 text-white focus:border-blue-500">
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <div>
            <label class="block text-sm text-gray-300 mb-1">Gallery Images (JPEG, PNG, WebP, GIF, max 5MB each)</label>
            <input type="file" name="gallery[]" multiple accept=".jpg,.jpeg,.png,.webp,.gif"
                   class="w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-blue-500/10 file:text-blue-300 hover:file:bg-blue-500/20">
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn-primary"><?= !empty($project['id']) ? 'Update Project' : 'Create Project' ?></button>
            <a href="/admin/projects" class="text-sm text-gray-400 hover:text-white">Cancel</a>
        </div>
    </form>
</div>
