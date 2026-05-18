<div class="term-section">
    <p class="term-prompt text-cat-green text-xs font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.cmd') ?></p>
    <h1 class="text-lg font-bold text-cat-mauve font-mono mb-6"><?= \App\Helpers\Language::t('admin.timeline.title') ?></h1>

    <?php if ($error ?? false): ?>
        <div class="term-panel p-3 border-cat-red mb-4"><p class="text-xs text-cat-red font-mono"><?= htmlspecialchars($error) ?></p></div>
    <?php endif; ?>
    <?php if ($success ?? false): ?>
        <div class="term-panel p-3 border-cat-green mb-4"><p class="text-xs text-cat-green font-mono"><?= htmlspecialchars($success) ?></p></div>
    <?php endif; ?>

    <div class="term-panel p-4 mb-6">
        <h2 class="text-sm font-bold text-cat-peach font-mono mb-4"><?= \App\Helpers\Language::t('admin.timeline.add') ?></h2>
        <form method="POST" action="/admin/timeline" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.type') ?></label>
                <select name="type" class="w-full px-3 py-2 text-sm">
                    <option value="experience"><?= \App\Helpers\Language::t('admin.timeline.experience') ?></option>
                    <option value="education"><?= \App\Helpers\Language::t('admin.timeline.education') ?></option>
                </select>
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.period') ?></label>
                <input type="text" name="period" required maxlength="100" placeholder="<?= \App\Helpers\Language::t('admin.timeline.period_placeholder') ?>" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.title_field') ?></label>
                <input type="text" name="title" required maxlength="200" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.organization') ?></label>
                <input type="text" name="organization" required maxlength="200" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.place') ?></label>
                <input type="text" name="place" maxlength="100" placeholder="<?= \App\Helpers\Language::t('admin.timeline.place_placeholder') ?>" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.work_type') ?></label>
                <select name="work_type" class="w-full px-3 py-2 text-sm">
                    <option value=""><?= \App\Helpers\Language::t('admin.timeline.empty_option') ?></option>
                    <option value="Remote"><?= \App\Helpers\Language::t('admin.timeline.remote') ?></option>
                    <option value="On-site"><?= \App\Helpers\Language::t('admin.timeline.on_site') ?></option>
                    <option value="Hybrid"><?= \App\Helpers\Language::t('admin.timeline.hybrid') ?></option>
                </select>
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.link') ?></label>
                <input type="url" name="link" maxlength="255" placeholder="<?= \App\Helpers\Language::t('admin.timeline.link_placeholder') ?>" class="w-full px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.logo') ?></label>
                <input type="file" name="logo" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm text-cat-text file:mr-3 file:py-1.5 file:px-3 file:border-0 file:text-xs file:bg-cat-surface0 file:text-cat-blue hover:file:bg-cat-surface1">
            </div>
            <div class="sm:col-span-2">
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.description') ?></label>
                <textarea name="description" rows="3" maxlength="5000" class="w-full px-3 py-2 text-sm"></textarea>
            </div>
            <div>
                <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.sort_order') ?></label>
                <input type="number" name="sort_order" value="0" class="w-full px-3 py-2 text-sm">
            </div>
            <div class="flex items-end">
                <button type="submit" class="term-btn term-btn-primary text-sm w-full"><?= \App\Helpers\Language::t('admin.timeline.add_btn') ?></button>
            </div>
        </form>
    </div>

    <div class="term-panel overflow-hidden">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-cat-surface1 text-cat-overlay2 text-left">
                    <th class="p-4 font-mono font-medium"><?= \App\Helpers\Language::t('admin.timeline.type') ?></th>
                    <th class="p-4 font-mono font-medium"><?= \App\Helpers\Language::t('admin.timeline.period') ?></th>
                    <th class="p-4 font-mono font-medium hidden sm:table-cell"><?= \App\Helpers\Language::t('admin.timeline.title_field') ?></th>
                    <th class="p-4 font-mono font-medium hidden sm:table-cell"><?= \App\Helpers\Language::t('admin.timeline.organization') ?></th>
                    <th class="p-4 font-mono font-medium"><?= \App\Helpers\Language::t('admin.languages.actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($entries)): ?>
                <tr><td colspan="5" class="p-8 text-center text-cat-overlay0 font-mono text-xs"><?= \App\Helpers\Language::t('admin.timeline.empty') ?></td></tr>
                <?php else: ?>
                <?php foreach ($entries as $e): ?>
                <tr class="border-b border-cat-surface0 hover:bg-cat-surface0/50">
                    <td class="p-4">
                        <span class="text-xs px-2 py-0.5 font-mono <?= $e['type'] === 'experience' ? 'text-cat-blue bg-cat-surface0' : 'text-cat-green bg-cat-surface0' ?>">
                            <?= htmlspecialchars(ucfirst($e['type'])) ?>
                        </span>
                    </td>
                    <td class="p-4 text-cat-text font-mono"><?= htmlspecialchars($e['period']) ?></td>
                    <td class="p-4 hidden sm:table-cell text-cat-text font-mono"><?= htmlspecialchars($e['title']) ?></td>
                    <td class="p-4 hidden sm:table-cell text-cat-subtext0 font-mono"><?= htmlspecialchars($e['organization']) ?></td>
                    <td class="p-4">
                        <button @click="document.getElementById('edit-<?= (int) $e['id'] ?>').classList.toggle('hidden')"
                                class="text-xs px-2 py-1 rounded bg-cat-surface0 text-cat-blue hover:bg-cat-surface1 font-mono"><?= \App\Helpers\Language::t('admin.timeline.edit') ?></button>
                        <form method="POST" action="/admin/timeline/<?= (int) $e['id'] ?>" class="inline" onsubmit="return confirm('<?= \App\Helpers\Language::t('admin.timeline.delete_confirm') ?>')">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                            <button type="submit" class="text-xs px-2 py-1 rounded bg-cat-surface0 text-cat-red hover:bg-cat-surface1 font-mono"><?= \App\Helpers\Language::t('admin.timeline.delete') ?></button>
                        </form>

                        <div id="edit-<?= (int) $e['id'] ?>" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-cat-base/80" @click.self="document.getElementById('edit-<?= (int) $e['id'] ?>').classList.add('hidden')">
                            <div class="term-panel p-6 w-full max-w-lg mx-4 max-h-[90vh] overflow-y-auto">
                                <h3 class="text-sm font-bold text-cat-peach font-mono mb-4"><?= \App\Helpers\Language::t('admin.timeline.edit_title') ?></h3>
                                <form method="POST" action="/admin/timeline/<?= (int) $e['id'] ?>" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="csrf_token" value="<?= \App\Core\Session::getCsrfToken() ?>">
                                    <div class="sm:col-span-2">
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.type') ?></label>
                                        <select name="type" class="w-full px-3 py-2 text-sm">
                                            <option value="experience" <?= $e['type'] === 'experience' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.timeline.experience') ?></option>
                                            <option value="education" <?= $e['type'] === 'education' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.timeline.education') ?></option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.period') ?></label>
                                        <input type="text" name="period" value="<?= htmlspecialchars($e['period']) ?>" required maxlength="100" class="w-full px-3 py-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.title_field') ?></label>
                                        <input type="text" name="title" value="<?= htmlspecialchars($e['title']) ?>" required maxlength="200" class="w-full px-3 py-2 text-sm">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.organization') ?></label>
                                        <input type="text" name="organization" value="<?= htmlspecialchars($e['organization']) ?>" required maxlength="200" class="w-full px-3 py-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.place') ?></label>
                                        <input type="text" name="place" value="<?= htmlspecialchars($e['place'] ?? '') ?>" maxlength="100" placeholder="<?= \App\Helpers\Language::t('admin.timeline.place_placeholder') ?>" class="w-full px-3 py-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.work_type') ?></label>
                                        <select name="work_type" class="w-full px-3 py-2 text-sm">
                                            <option value=""><?= \App\Helpers\Language::t('admin.timeline.empty_option') ?></option>
                                            <option value="Remote" <?= ($e['work_type'] ?? '') === 'Remote' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.timeline.remote') ?></option>
                                            <option value="On-site" <?= ($e['work_type'] ?? '') === 'On-site' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.timeline.on_site') ?></option>
                                            <option value="Hybrid" <?= ($e['work_type'] ?? '') === 'Hybrid' ? 'selected' : '' ?>><?= \App\Helpers\Language::t('admin.timeline.hybrid') ?></option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.link') ?></label>
                                        <input type="url" name="link" value="<?= htmlspecialchars($e['link'] ?? '') ?>" maxlength="255" placeholder="<?= \App\Helpers\Language::t('admin.timeline.link_placeholder') ?>" class="w-full px-3 py-2 text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.logo') ?></label>
                                        <input type="file" name="logo" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm text-cat-text file:mr-3 file:py-1.5 file:px-3 file:border-0 file:text-xs file:bg-cat-surface0 file:text-cat-blue hover:file:bg-cat-surface1">
                                        <?php if (!empty($e['logo'])): ?>
                                            <div class="mt-2">
                                                <img src="/<?= htmlspecialchars($e['logo']) ?>" alt="Current logo" class="h-10 w-auto rounded">
                                                    <label class="text-xs text-cat-overlay2 font-mono mt-1 flex items-center gap-1">
                                                        <input type="checkbox" name="remove_logo" value="1">
                                                        <?= \App\Helpers\Language::t('admin.timeline.remove_logo') ?>
                                                    </label>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.description') ?></label>
                                        <textarea name="description" rows="3" maxlength="5000" class="w-full px-3 py-2 text-sm"><?= htmlspecialchars($e['description'] ?? '') ?></textarea>
                                    </div>
                                    <div>
                                        <label class="block text-xs text-cat-overlay2 font-mono mb-1"><?= \App\Helpers\Language::t('admin.timeline.sort_order') ?></label>
                                        <input type="number" name="sort_order" value="<?= (int) ($e['sort_order'] ?? 0) ?>" class="w-full px-3 py-2 text-sm">
                                    </div>
                                    <div class="flex items-end gap-2">
                                        <button type="submit" class="term-btn term-btn-primary text-sm flex-1"><?= \App\Helpers\Language::t('admin.timeline.save') ?></button>
                                        <button type="button" @click="document.getElementById('edit-<?= (int) $e['id'] ?>').classList.add('hidden')"
                                                class="term-btn text-sm flex-1"><?= \App\Helpers\Language::t('admin.timeline.cancel') ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
