<div class="py-24 term-section">
    <p class="term-prompt text-cat-green text-sm font-mono mb-2">cat about.txt</p>
    <h1 class="text-2xl font-bold text-cat-mauve font-mono mb-8"><?= \App\Helpers\Language::t('about.title') ?></h1>

    <div class="space-y-8">
        <!-- STORY -->
        <section>
            <h2 class="term-man-section text-sm mb-3">STORY</h2>
            <div class="term-panel p-4">
                <p class="text-sm text-cat-text font-mono leading-relaxed">
                    I'm Mohamed Elhabib Mohamed, a Full Stack Web Developer from Sudan. I build web applications, internal systems, and automation tools with a focus on reliability, simplicity, and long term maintainability.
                </p>
                <p class="text-sm text-cat-text font-mono leading-relaxed mt-3">
                    My background started with curiosity and self learning. Over time, I studied web development, Linux systems, scripting, and backend engineering. I enjoy understanding how systems work under the hood, from frontend interfaces to servers, containers, databases, and deployment pipelines.
                </p>
                <p class="text-sm text-cat-text font-mono leading-relaxed mt-3">
                    I work mostly with modern web technologies and open source tools. I like building products end to end, improving workflows, and reducing repetitive work through automation.
                </p>
            </div>
        </section>

        <!-- PHILOSOPHY -->
        <section>
            <h2 class="term-man-section text-sm mb-3">PHILOSOPHY</h2>
            <div class="term-panel p-4">
                <p class="text-sm text-cat-text font-mono leading-relaxed mb-4">
                    My approach to engineering is practical:
                </p>
                <div class="space-y-2 text-sm font-mono">
                    <div class="flex items-start gap-3">
                        <span class="text-cat-blue mt-1">◆</span>
                        <span class="text-cat-text">Keep systems simple and maintainable.</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-teal mt-1">◆</span>
                        <span class="text-cat-text">Automate repetitive tasks whenever possible.</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-yellow mt-1">◆</span>
                        <span class="text-cat-text">Build solutions based on real needs, not trends.</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-mauve mt-1">◆</span>
                        <span class="text-cat-text">Learn continuously and improve step by step.</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-red mt-1">◆</span>
                        <span class="text-cat-text">Focus on stability and user experience.</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- WHAT I WORK WITH -->
        <section>
            <h2 class="term-man-section text-sm mb-3">WHAT I WORK WITH</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="term-panel p-4">
                    <h3 class="text-xs text-cat-blue font-mono mb-2">Web Development</h3>
                    <p class="text-xs text-cat-subtext0 font-mono">HTML, CSS, JavaScript, TypeScript, Python, FastAPI, Next.js</p>
                </div>
                <div class="term-panel p-4">
                    <h3 class="text-xs text-cat-teal font-mono mb-2">Linux & Development Environment</h3>
                    <p class="text-xs text-cat-subtext0 font-mono">Linux, Bash, Git, Neovim, Tmux, Docker</p>
                </div>
                <div class="term-panel p-4">
                    <h3 class="text-xs text-cat-yellow font-mono mb-2">Automation & Tooling</h3>
                    <p class="text-xs text-cat-subtext0 font-mono">GitHub Actions, scripting, deployment workflows, AI-assisted development</p>
                </div>
                <div class="term-panel p-4">
                    <h3 class="text-xs text-cat-mauve font-mono mb-2">Design & UI</h3>
                    <p class="text-xs text-cat-subtext0 font-mono">Responsive interfaces, dark themed layouts, graphic design experience with Inkscape and Canva</p>
                </div>
            </div>
        </section>

        <!-- CURRENT INTERESTS -->
        <section>
            <h2 class="term-man-section text-sm mb-3">CURRENT INTERESTS</h2>
            <div class="term-panel p-4">
                <div class="space-y-2 text-sm font-mono">
                    <div class="flex items-start gap-3">
                        <span class="text-cat-blue mt-1">◆</span>
                        <span class="text-cat-text">AI powered applications</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-teal mt-1">◆</span>
                        <span class="text-cat-text">Developer tooling and automation</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-yellow mt-1">◆</span>
                        <span class="text-cat-text">System design and backend architecture</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-mauve mt-1">◆</span>
                        <span class="text-cat-text">Adaptive learning platforms</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-red mt-1">◆</span>
                        <span class="text-cat-text">Open source software and Linux ecosystems</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- LANGUAGES -->
        <?php if (!empty($languages)): ?>
        <section>
            <h2 class="term-man-section text-sm mb-3">LANGUAGES</h2>
            <div class="term-panel p-4">
                <div class="space-y-1 divide-y divide-cat-surface1">
                    <?php foreach ($languages as $l): ?>
                    <div class="flex items-center justify-between py-2 px-2">
                        <span class="text-sm text-cat-text font-mono"><?= htmlspecialchars($l['name']) ?></span>
                        <span class="text-xs text-cat-green font-mono"><?= htmlspecialchars($l['proficiency']) ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- LEARNING JOURNEY -->
        <section>
            <h2 class="term-man-section text-sm mb-3">LEARNING JOURNEY</h2>
            <div class="term-panel p-4">
                <p class="text-sm text-cat-text font-mono leading-relaxed mb-4">
                    I believe strong engineering comes from consistent practice and curiosity. Most of my skills came from building real projects, experimenting, fixing problems, and learning from experience.
                </p>
                <p class="text-sm text-cat-text font-mono leading-relaxed mb-4">
                    I continue improving my knowledge in:
                </p>
                <div class="space-y-2 text-sm font-mono">
                    <div class="flex items-center gap-3">
                        <span class="text-cat-blue">●</span>
                        <span class="text-cat-text">Backend architecture</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-cat-teal">●</span>
                        <span class="text-cat-text">AI integrations and agents</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-cat-yellow">●</span>
                        <span class="text-cat-text">Infrastructure and deployment</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-cat-mauve">●</span>
                        <span class="text-cat-text">NLP and Python ecosystems</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-cat-red">●</span>
                        <span class="text-cat-text">Software design principles</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- VOLUNTEERING & COMMUNITY -->
        <section>
            <h2 class="term-man-section text-sm mb-3">VOLUNTEERING & COMMUNITY</h2>
            <div class="term-panel p-4">
                <p class="text-sm text-cat-text font-mono leading-relaxed">
                    I enjoy helping others through technical discussions, mentoring, sharing solutions, and contributing ideas to projects and communities when possible.
                </p>
            </div>
        </section>
    </div>
</div>
