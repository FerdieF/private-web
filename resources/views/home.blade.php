<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('portfolio.name') }} — {{ config('portfolio.title') }}</title>
    <meta name="description" content="{{ config('portfolio.tagline') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-700 antialiased">

    {{-- Navigation --}}
    <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur">
        <nav class="mx-auto flex max-w-5xl items-center justify-between px-6 py-4">
            <a href="#" class="text-lg font-semibold text-slate-900">Ferdi<span class="text-indigo-600">.</span></a>
            <div class="hidden items-center gap-6 text-sm font-medium sm:flex">
                <a href="#about" class="hover:text-indigo-600">About</a>
                <a href="#skills" class="hover:text-indigo-600">Skills</a>
                <a href="#experience" class="hover:text-indigo-600">Experience</a>
                <a href="#projects" class="hover:text-indigo-600">Projects</a>
                <a href="#contact" class="rounded-full bg-slate-900 px-4 py-1.5 text-white hover:bg-indigo-600">Contact</a>
            </div>
        </nav>
    </header>

    {{-- Hero --}}
    <section class="border-b border-slate-100 bg-slate-50">
        <div class="mx-auto flex max-w-5xl flex-col-reverse items-start gap-10 px-6 py-20 sm:py-28 md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">{{ config('portfolio.title') }}</p>
                <h1 class="mt-3 text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">{{ config('portfolio.full_name') }}</h1>
                <p class="mt-4 max-w-2xl text-lg text-slate-600">{{ config('portfolio.tagline') }}</p>
                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <a href="mailto:{{ config('portfolio.email') }}"
                       class="rounded-full bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white hover:bg-indigo-500">
                        Get in touch
                    </a>
                    <a href="{{ config('portfolio.github') }}" target="_blank" rel="noopener"
                       class="rounded-full border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:border-indigo-600 hover:text-indigo-600">
                        GitHub
                    </a>
                    <a href="{{ config('portfolio.linkedin') }}" target="_blank" rel="noopener"
                       class="rounded-full border border-slate-300 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 hover:border-indigo-600 hover:text-indigo-600">
                        LinkedIn
                    </a>
                </div>
                <dl class="mt-12 grid max-w-lg grid-cols-3 gap-6">
                    @foreach (config('portfolio.stats') as $stat)
                        <div>
                            <dt class="text-2xl font-bold text-slate-900">{{ $stat['value'] }}</dt>
                            <dd class="mt-1 text-xs text-slate-500">{{ $stat['label'] }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
            <img src="{{ asset('images/profile.jpg') }}" alt="Photo of {{ config('portfolio.name') }}"
                 class="h-44 w-44 shrink-0 rounded-full object-cover object-top shadow-lg ring-4 ring-white sm:h-52 sm:w-52 md:h-60 md:w-60">
        </div>
    </section>

    {{-- About --}}
    <section id="about" class="scroll-mt-20">
        <div class="mx-auto max-w-5xl px-6 py-20">
            <h2 class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Who I Am</h2>
            <div class="mt-6 grid gap-10 md:grid-cols-5">
                <p class="text-lg leading-relaxed text-slate-600 md:col-span-3">{{ config('portfolio.summary') }}</p>
                <div class="space-y-3 text-sm md:col-span-2">
                    <div class="flex items-center gap-3">
                        <span class="font-semibold text-slate-900">Location</span>
                        <span>{{ config('portfolio.location') }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="font-semibold text-slate-900">Education</span>
                        <span>{{ config('portfolio.education.institution') }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="font-semibold text-slate-900">Email</span>
                        <a href="mailto:{{ config('portfolio.email') }}" class="text-indigo-600 hover:underline">{{ config('portfolio.email') }}</a>
                    </div>
                </div>
            </div>

            {{-- What I do --}}
            <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach (config('portfolio.services') as $service)
                    <div class="rounded-xl border border-slate-200 p-6 transition hover:border-indigo-300 hover:shadow-sm">
                        <h3 class="font-semibold text-slate-900">{{ $service['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ $service['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Skills --}}
    <section id="skills" class="scroll-mt-20 border-y border-slate-100 bg-slate-50">
        <div class="mx-auto max-w-5xl px-6 py-20">
            <h2 class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Skills</h2>
            <h3 class="mt-2 text-2xl font-bold text-slate-900">Technical & Professional Skills</h3>
            <div class="mt-8 space-y-6">
                @foreach ($skills as $skill)
                    <div class="flex flex-col gap-2 sm:flex-row sm:items-baseline">
                        <p class="w-56 shrink-0 text-sm font-semibold text-slate-900">{{ $skill->category }}</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($skill->items as $item)
                                <span class="rounded-full border border-slate-200 bg-white px-3 py-1 text-sm text-slate-700">{{ $item }}</span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Experience --}}
    <section id="experience" class="scroll-mt-20">
        <div class="mx-auto max-w-5xl px-6 py-20">
            <h2 class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Experience</h2>
            <h3 class="mt-2 text-2xl font-bold text-slate-900">Where I've Worked</h3>
            <div class="mt-10 space-y-12 border-l-2 border-slate-200 pl-8">
                @foreach ($experiences as $experience)
                    <div class="relative">
                        <span class="absolute -left-[41px] top-1.5 h-4 w-4 rounded-full border-4 border-white bg-indigo-600"></span>
                        <p class="text-sm text-slate-500">{{ $experience->period }}</p>
                        <h4 class="mt-1 text-lg font-semibold text-slate-900">{{ $experience->company }}</h4>
                        <p class="text-sm font-medium text-indigo-600">{{ $experience->role }}</p>
                        <ul class="mt-3 list-disc space-y-2 pl-5 text-sm leading-relaxed text-slate-600">
                            @foreach ($experience->highlights as $highlight)
                                <li>{{ $highlight }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Projects --}}
    <section id="projects" class="scroll-mt-20 border-y border-slate-100 bg-slate-50">
        <div class="mx-auto max-w-5xl px-6 py-20">
            <h2 class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Projects</h2>
            <h3 class="mt-2 text-2xl font-bold text-slate-900">Selected Work</h3>
            <div class="mt-10 space-y-6">
                @foreach ($projects as $project)
                    <article class="rounded-xl border border-slate-200 bg-white p-6 sm:p-8">
                        <div class="flex flex-wrap items-baseline justify-between gap-2">
                            <h4 class="text-lg font-semibold text-slate-900">{{ $project->title }}</h4>
                            <p class="text-sm text-slate-500">{{ $project->period }}</p>
                        </div>
                        <p class="mt-1 text-sm font-medium text-indigo-600">
                            {{ $project->project_type }}@if ($project->role) · {{ $project->role }}@endif
                        </p>
                        <p class="mt-3 text-sm leading-relaxed text-slate-600">{{ $project->summary }}</p>
                        <ul class="mt-4 list-disc space-y-2 pl-5 text-sm leading-relaxed text-slate-600">
                            @foreach ($project->highlights as $highlight)
                                <li>{{ $highlight }}</li>
                            @endforeach
                        </ul>
                        <div class="mt-5 flex flex-wrap gap-2">
                            @foreach ($project->tech_stack as $tech)
                                <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-medium text-indigo-700">{{ $tech }}</span>
                            @endforeach
                        </div>
                        @if ($project->repository_url)
                            <a href="{{ $project->repository_url }}" target="_blank" rel="noopener"
                               class="mt-5 inline-flex rounded-full border border-indigo-200 px-4 py-2 text-sm font-semibold text-indigo-700 hover:border-indigo-600 hover:bg-indigo-50">
                                View on GitHub
                            </a>
                        @endif
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Education & Certifications --}}
    <section id="education" class="scroll-mt-20">
        <div class="mx-auto max-w-5xl px-6 py-20">
            <div class="grid gap-12 md:grid-cols-2">
                <div>
                    <h2 class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Education</h2>
                    <div class="mt-6 rounded-xl border border-slate-200 p-6">
                        <h4 class="font-semibold text-slate-900">{{ config('portfolio.education.institution') }}</h4>
                        <p class="mt-1 text-sm text-slate-600">{{ config('portfolio.education.degree') }}</p>
                        <p class="mt-1 text-sm text-slate-500">{{ config('portfolio.education.period') }}</p>
                        <p class="mt-3 inline-block rounded-full bg-indigo-50 px-3 py-1 text-xs font-medium text-indigo-700">GPA {{ config('portfolio.education.gpa') }}</p>
                    </div>
                </div>
                <div>
                    <h2 class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Certifications</h2>
                    <ul class="mt-6 space-y-3">
                        @foreach ($certifications as $certification)
                            <li class="rounded-xl border border-slate-200 p-4">
                                <div class="flex items-baseline justify-between gap-3">
                                    <p class="text-sm font-semibold text-slate-900">{{ $certification->name }}</p>
                                    @if ($certification->credential_url)
                                        <a href="{{ $certification->credential_url }}" target="_blank" rel="noopener"
                                           class="shrink-0 text-xs font-medium text-indigo-600 hover:underline">View certificate</a>
                                    @endif
                                </div>
                                <p class="mt-0.5 text-xs text-slate-500">{{ $certification->issuer }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact --}}
    <section id="contact" class="scroll-mt-20 border-t border-slate-100 bg-slate-900">
        <div class="mx-auto max-w-5xl px-6 py-20 text-center">
            <h2 class="text-sm font-semibold uppercase tracking-widest text-indigo-400">Let's Connect</h2>
            <h3 class="mt-3 text-3xl font-bold text-white">Interested in working together?</h3>
            <p class="mx-auto mt-4 max-w-xl text-slate-400">
                I'm open to IT opportunities in network administration, network engineering, SOC analysis, cybersecurity, and infrastructure support. Let's connect and discuss how I can contribute to your team.
            </p>
            <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                <a href="mailto:{{ config('portfolio.email') }}"
                   class="rounded-full bg-indigo-600 px-6 py-3 text-sm font-semibold text-white hover:bg-indigo-500">
                    {{ config('portfolio.email') }}
                </a>
                <a href="{{ config('portfolio.github') }}" target="_blank" rel="noopener"
                   class="rounded-full border border-slate-700 px-6 py-3 text-sm font-semibold text-slate-300 hover:border-indigo-400 hover:text-white">
                    GitHub
                </a>
                <a href="{{ config('portfolio.linkedin') }}" target="_blank" rel="noopener"
                   class="rounded-full border border-slate-700 px-6 py-3 text-sm font-semibold text-slate-300 hover:border-indigo-400 hover:text-white">
                    LinkedIn
                </a>
            </div>
            <p class="mt-6 text-sm text-slate-500">{{ config('portfolio.location') }}</p>
        </div>
        <footer class="border-t border-slate-800 py-6 text-center text-xs text-slate-500">
            © {{ date('Y') }} {{ config('portfolio.name') }} — Built with Laravel, PostgreSQL & Tailwind CSS
        </footer>
    </section>

</body>
</html>
