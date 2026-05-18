<div class="py-24 term-section">
    <p class="term-prompt text-cat-green text-sm font-mono mb-2">cat about.txt</p>
    <h1 class="text-2xl font-bold text-cat-mauve font-mono mb-8"><?= \App\Helpers\Language::t('about.title') ?></h1>

    <div class="space-y-8">
        <!-- My Story -->
        <section>
            <h2 class="term-man-section text-sm mb-3">STORY</h2>
            <div class="term-panel p-4">
                <p class="text-sm text-cat-text font-mono leading-relaxed">
                    I'm MohamedElhabib Mohamed, a Full Stack Developer and AI Engineer with a passion for building resilient, scalable systems. My journey in technology started with a curiosity about how things work, which led me to pursue a degree in Computer Engineering.
                </p>
                <p class="text-sm text-cat-text font-mono leading-relaxed mt-3">
                    Over the years, I've worked across the full stack — from designing cloud infrastructure and CI/CD pipelines to developing web applications and microservices. I believe in automation, clean architecture, and measurable outcomes.
                </p>
            </div>
        </section>

        <!-- Engineering Philosophy -->
        <section>
            <h2 class="term-man-section text-sm mb-3">PHILOSOPHY</h2>
            <div class="term-panel p-4">
                <p class="text-sm text-cat-text font-mono leading-relaxed mb-4">
                    I approach engineering with a philosophy of simplicity, reliability, and continuous improvement. Every system I build follows these principles:
                </p>
                <div class="space-y-3 text-sm font-mono">
                    <div class="flex items-start gap-3">
                        <span class="text-cat-blue mt-0.5">◆</span>
                        <div><span class="text-cat-lavender">Resilience by Design</span> — Systems should handle failure gracefully and recover automatically.</div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-teal mt-0.5">◆</span>
                        <div><span class="text-cat-lavender">Automation First</span> — Everything that can be automated should be automated.</div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-yellow mt-0.5">◆</span>
                        <div><span class="text-cat-lavender">Measure Everything</span> — If you can't measure it, you can't improve it.</div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-red mt-0.5">◆</span>
                        <div><span class="text-cat-lavender">Security in Depth</span> — Security is not a feature; it's a foundation.</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Infrastructure Mindset -->
        <section>
            <h2 class="term-man-section text-sm mb-3">INFRASTRUCTURE MINDSET</h2>
            <div class="term-panel p-4">
                <p class="text-sm text-cat-text font-mono leading-relaxed mb-4">
                    Infrastructure is the backbone of modern software. I treat infrastructure as code, ensuring that environments are reproducible, version-controlled, and auditable. My approach combines:
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div class="term-panel p-3">
                        <h4 class="text-xs text-cat-blue font-mono mb-1">Cloud & Infrastructure</h4>
                        <p class="text-xs text-cat-subtext0 font-mono">AWS, GCP, DigitalOcean, Terraform, Kubernetes, Docker</p>
                    </div>
                    <div class="term-panel p-3">
                        <h4 class="text-xs text-cat-teal font-mono mb-1">CI/CD & Automation</h4>
                        <p class="text-xs text-cat-subtext0 font-mono">GitHub Actions, Jenkins, Ansible, Helm, ArgoCD</p>
                    </div>
                    <div class="term-panel p-3">
                        <h4 class="text-xs text-cat-yellow font-mono mb-1">Monitoring & Observability</h4>
                        <p class="text-xs text-cat-subtext0 font-mono">Prometheus, Grafana, ELK Stack, Datadog</p>
                    </div>
                    <div class="term-panel p-3">
                        <h4 class="text-xs text-cat-red font-mono mb-1">Security & Compliance</h4>
                        <p class="text-xs text-cat-subtext0 font-mono">Vault, OPA, SAST/DAST, SOC2, ISO 27001</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Languages -->
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

        <!-- Learning Journey -->
        <section>
            <h2 class="term-man-section text-sm mb-3">LEARNING JOURNEY</h2>
            <div class="term-panel p-4">
                <p class="text-sm text-cat-text font-mono leading-relaxed mb-4">
                    I believe in lifelong learning. From earning my B.Sc. in Computer Engineering to obtaining cloud certifications and mastering new technologies, I continuously push the boundaries of my knowledge.
                </p>
                <div class="space-y-2 text-sm font-mono">
                    <div class="flex items-center gap-3">
                        <span class="text-cat-blue">●</span>
                        <span class="text-cat-text">AWS Solutions Architect & DevOps Professional</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-cat-blue">●</span>
                        <span class="text-cat-text">Certified Kubernetes Administrator (CKA)</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-cat-blue">●</span>
                        <span class="text-cat-text">HashiCorp Certified Terraform Associate</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-cat-blue">●</span>
                        <span class="text-cat-text">Google Cloud Professional Engineer</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Volunteering -->
        <section>
            <h2 class="term-man-section text-sm mb-3">VOLUNTEERING</h2>
            <div class="term-panel p-4">
                <p class="text-sm text-cat-text font-mono leading-relaxed mb-4">
                    I actively contribute to the tech community through mentoring, open-source contributions, and knowledge sharing. I believe in giving back and helping the next generation of engineers grow.
                </p>
                <div class="space-y-2 text-sm font-mono">
                    <div class="flex items-start gap-3">
                        <span class="text-cat-mauve mt-1">◇</span>
                        <span class="text-cat-text">Open Source Contributor — Kubernetes, Terraform providers, DevOps tooling</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-mauve mt-1">◇</span>
                        <span class="text-cat-text">Technical Mentor — Coding bootcamps, university hackathons</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-cat-mauve mt-1">◇</span>
                        <span class="text-cat-text">Community Speaker — Local meetups, conferences, workshops</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
