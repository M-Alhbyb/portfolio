<div class="relative py-24 mt-16">
    <div class="absolute inset-0 grid-pattern opacity-20"></div>
    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <p class="text-sm font-mono text-cyan-400 mb-2">
                <span class="text-gray-500">//</span> <?= \App\Helpers\Language::t('about.subtitle') ?>
            </p>
            <h1 class="text-3xl sm:text-4xl font-bold gradient-text">
                <?= \App\Helpers\Language::t('about.title') ?>
            </h1>
        </div>

        <div class="space-y-12">
            <!-- My Story -->
            <section>
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-2 h-2 rounded-full bg-blue-500 shadow-[0_0_8px_rgba(59,130,246,0.6)]"></span>
                    <h2 class="text-xl font-semibold text-white"><?= \App\Helpers\Language::t('about.story') ?></h2>
                </div>
                <div class="glass-card rounded-xl p-6">
                    <p class="text-sm text-gray-300 leading-relaxed">
                        I'm Mohamed Elhabib, a Senior DevOps Engineer and Full Stack Developer with a passion for building resilient, scalable systems. My journey in technology started with a curiosity about how things work, which led me to pursue a degree in Computer Engineering.
                    </p>
                    <p class="text-sm text-gray-300 leading-relaxed mt-4">
                        Over the years, I've worked across the full stack — from designing cloud infrastructure and CI/CD pipelines to developing web applications and microservices. I believe in automation, clean architecture, and measurable outcomes.
                    </p>
                </div>
            </section>

            <!-- Engineering Philosophy -->
            <section>
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-2 h-2 rounded-full bg-cyan-400 shadow-[0_0_8px_rgba(6,182,212,0.6)]"></span>
                    <h2 class="text-xl font-semibold text-white"><?= \App\Helpers\Language::t('about.philosophy') ?></h2>
                </div>
                <div class="glass-card rounded-xl p-6">
                    <p class="text-sm text-gray-300 leading-relaxed">
                        I approach engineering with a philosophy of simplicity, reliability, and continuous improvement. Every system I build follows these principles:
                    </p>
                    <ul class="mt-4 space-y-2 text-sm text-gray-300">
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">&#9656;</span>
                            <span><strong class="text-white">Resilience by Design</strong> — Systems should handle failure gracefully and recover automatically.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">&#9656;</span>
                            <span><strong class="text-white">Automation First</strong> — Everything that can be automated should be automated.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">&#9656;</span>
                            <span><strong class="text-white">Measure Everything</strong> — If you can't measure it, you can't improve it.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-blue-400 mt-1">&#9656;</span>
                            <span><strong class="text-white">Security in Depth</strong> — Security is not a feature; it's a foundation.</span>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Infrastructure Mindset -->
            <section>
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-2 h-2 rounded-full bg-red-400 shadow-[0_0_8px_rgba(239,68,68,0.6)]"></span>
                    <h2 class="text-xl font-semibold text-white"><?= \App\Helpers\Language::t('about.mindset') ?></h2>
                </div>
                <div class="glass-card rounded-xl p-6">
                    <p class="text-sm text-gray-300 leading-relaxed">
                        Infrastructure is the backbone of modern software. I treat infrastructure as code, ensuring that environments are reproducible, version-controlled, and auditable. My approach combines:
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div class="bg-gray-800/30 rounded-lg p-4">
                            <h4 class="text-sm font-semibold text-cyan-400 mb-1">Cloud & Infrastructure</h4>
                            <p class="text-xs text-gray-400">AWS, GCP, DigitalOcean, Terraform, Kubernetes, Docker</p>
                        </div>
                        <div class="bg-gray-800/30 rounded-lg p-4">
                            <h4 class="text-sm font-semibold text-cyan-400 mb-1">CI/CD & Automation</h4>
                            <p class="text-xs text-gray-400">GitHub Actions, Jenkins, Ansible, Helm, ArgoCD</p>
                        </div>
                        <div class="bg-gray-800/30 rounded-lg p-4">
                            <h4 class="text-sm font-semibold text-cyan-400 mb-1">Monitoring & Observability</h4>
                            <p class="text-xs text-gray-400">Prometheus, Grafana, ELK Stack, Datadog</p>
                        </div>
                        <div class="bg-gray-800/30 rounded-lg p-4">
                            <h4 class="text-sm font-semibold text-cyan-400 mb-1">Security & Compliance</h4>
                            <p class="text-xs text-gray-400">Vault, OPA, SAST/DAST, SOC2, ISO 27001</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Languages -->
            <?php if (!empty($languages)): ?>
            <section>
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-2 h-2 rounded-full bg-green-400 shadow-[0_0_8px_rgba(34,197,94,0.6)]"></span>
                    <h2 class="text-xl font-semibold text-white"><?= \App\Helpers\Language::t('about.languages') ?></h2>
                </div>
                <div class="glass-card rounded-xl p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php foreach ($languages as $l): ?>
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-sm text-white"><?= htmlspecialchars($l['name']) ?></span>
                                <span class="text-xs text-gray-500"><?= (int) $l['proficiency'] ?>%</span>
                            </div>
                            <div class="w-full h-2 bg-gray-800 rounded-full overflow-hidden">
                                <div class="h-full rounded-full bg-gradient-to-r from-green-500 to-emerald-400 transition-all duration-1000" style="width: <?= (int) $l['proficiency'] ?>%"></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <!-- Learning Journey -->
            <section>
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-2 h-2 rounded-full bg-blue-400 shadow-[0_0_8px_rgba(59,130,246,0.6)]"></span>
                    <h2 class="text-xl font-semibold text-white"><?= \App\Helpers\Language::t('about.journey') ?></h2>
                </div>
                <div class="glass-card rounded-xl p-6">
                    <p class="text-sm text-gray-300 leading-relaxed">
                        I believe in lifelong learning. From earning my B.Sc. in Computer Engineering to obtaining cloud certifications and mastering new technologies, I continuously push the boundaries of my knowledge.
                    </p>
                    <div class="mt-4 space-y-3">
                        <div class="flex items-center gap-3 text-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>
                            <span class="text-gray-300">AWS Solutions Architect & DevOps Professional</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>
                            <span class="text-gray-300">Certified Kubernetes Administrator (CKA)</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>
                            <span class="text-gray-300">HashiCorp Certified Terraform Associate</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>
                            <span class="text-gray-300">Google Cloud Professional Engineer</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Volunteering -->
            <section>
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-2 h-2 rounded-full bg-purple-400 shadow-[0_0_8px_rgba(168,85,247,0.6)]"></span>
                    <h2 class="text-xl font-semibold text-white"><?= \App\Helpers\Language::t('about.volunteering') ?></h2>
                </div>
                <div class="glass-card rounded-xl p-6">
                    <p class="text-sm text-gray-300 leading-relaxed">
                        I actively contribute to the tech community through mentoring, open-source contributions, and knowledge sharing. I believe in giving back and helping the next generation of engineers grow.
                    </p>
                    <div class="mt-4 space-y-3">
                        <div class="flex items-center gap-3 text-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-purple-400"></span>
                            <span class="text-gray-300">Open Source Contributor — Kubernetes, Terraform providers, DevOps tooling</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-purple-400"></span>
                            <span class="text-gray-300">Technical Mentor — Coding bootcamps, university hackathons</span>
                        </div>
                        <div class="flex items-center gap-3 text-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-purple-400"></span>
                            <span class="text-gray-300">Community Speaker — Local meetups, conferences, workshops</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
