<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#2ecc70",
                        "background-light": "#f6f8f7",
                        "background-dark": "#131f18",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <title>EasyColoc</title>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100">
    <div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <!-- Navigation Bar -->
            <header
                class="flex items-center justify-between whitespace-nowrap border-b border-solid border-primary/10 px-6 py-4 lg:px-40 bg-white dark:bg-background-dark">
                <div class="flex items-center gap-4 text-slate-900 dark:text-slate-100">
                    <div class="size-8 bg-primary rounded-lg flex items-center justify-center text-white">
                        <span class="material-symbols-outlined">handshake</span>
                    </div>
                    <h2 class="text-lg font-bold leading-tight tracking-[-0.015em]">EasyColoc</h2>
                </div>
                <div class="flex gap-2">
                    <button
                        class="flex size-10 cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-primary/10 text-primary hover:bg-primary/20 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <button
                        class="flex size-10 cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-primary/10 text-primary hover:bg-primary/20 transition-colors">
                        <span class="material-symbols-outlined">settings</span>
                    </button>
                </div>
            </header>
            <main class="flex flex-1 justify-center py-8">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1 px-4 lg:px-0">
                    <!-- Sidebar + Main Content Layout -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                        <!-- Left Sidebar Navigation -->
                        <aside class="lg:col-span-3 flex flex-col gap-4">
                            <div class="flex items-center gap-3 px-3 py-2">
                                <div class="bg-primary/20 rounded-full p-2 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary text-sm">home</span>
                                </div>
                                <h1 class="text-base font-semibold">EasyColoc</h1>
                            </div>
                            <nav class="flex flex-col gap-1">
                                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                        <span class="material-symbols-outlined text-slate-500 group-hover:text-primary">
                                            dashboard
                                        </span>
                                        {{ __('Dashboard') }}
                                    </x-nav-link>
                                <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-primary/5 transition-colors group"
                                    href="{{ route('colocations.index') }}">
                                    <span class="material-symbols-outlined text-slate-500 group-hover:text-primary">
                                    apartment
                                    </span>
                                    <p class="text-sm font-medium">Colocation</p>
                                </a>
                                @if (Auth::user()->role_id == 1)
                                <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-primary/5 transition-colors group"
                                href="#">
                                <span class="material-symbols-outlined text-slate-500 group-hover:text-primary">
                                    admin_panel_settings
                                </span>
                                <p class="text-sm font-medium">Admin</p>
                            </a>
                            @endif
                                <!-- <div class="hidden sm:flex sm:items-center sm:ms-6"> -->
                            <div class="lex items-center gap-3 px-4 py-3 rounded-xl hover:bg-primary/5 transition-colors group">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition ease-in-out duration-150">
                                            <div>{{ Auth::user()->name }}</div>
                                            <div class="ms-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                            </nav>
                        </aside>
                        <!-- Main Column -->
                        <section class="lg:col-span-9 flex flex-col gap-6">
                            <!-- Who Owes Who Section -->
                            <div class="flex flex-col gap-4">
                                <h3 class="text-lg font-bold tracking-tight">Who owes who</h3>
                                <div class="flex flex-col gap-3">

                                     @yield('main')

                                </div>
                            </div>
                            <!-- Payment Reminder -->
                            <div
                                class="mt-4 p-4 rounded-xl bg-primary/5 border border-dashed border-primary/30 flex items-center gap-4">
                                <span class="material-symbols-outlined text-primary">info</span>
                                <p class="text-xs text-slate-600 dark:text-slate-400">
                                    Clicking 'Settle Up' will notify the roommate and allow you to select a payment
                                    method like PayPal, Revolut, or marking as paid in cash.
                                </p>
                            </div>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html> 