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
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
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
                                    href="{{ route('colocation') }}">
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
                            <!-- Tabs -->
                            <div class="flex border-b border-primary/10 gap-8">
                                <a class="flex flex-col items-center justify-center border-b-2 border-primary text-primary pb-3"
                                    href="#">
                                    <p class="text-sm font-bold">Pending</p>
                                </a>
                                <a class="flex flex-col items-center justify-center border-b-2 border-transparent text-slate-500 pb-3 hover:text-slate-800"
                                    href="#">
                                    <p class="text-sm font-bold">History</p>
                                </a>
                            </div>

                            <!-- Who Owes Who Section -->
                            <div class="flex flex-col gap-4">
                                <h3 class="text-lg font-bold tracking-tight">Who owes who</h3>
                                <div class="flex flex-col gap-3">
                                    <!-- Transaction Item 1 -->
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm">
                                        <div class="flex items-center gap-4">
                                            <div class="flex -space-x-3">
                                                <div class="size-10 rounded-full border-2 border-white dark:border-slate-900 overflow-hidden bg-slate-200"
                                                    data-alt="Profile photo of Alex">
                                                    <img alt="Alex" class="w-full h-full object-cover"
                                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvG01zkOsV_iH27velJvS2XI6PGuZ3JnzC7zAlxen3w7E-wmjqdvd_kPWTIdEkjpUIyYU5XYD1OrTU5pL--MFfGbMyhYosEfRTWSwkPwENAGArx6kzZyOdFsiQDTBVWm6TCwjDMtpLXkBDvE9Rpeh-HPkl_hO6zd9vvJujSN55pUc_NsMHPHEWq65IVm1yKMhsCBwLu2Fpy_uIQcXovWd9shCY3AOWw08aMAhLfQULHqEwnt6G4O-hdyc3noxWAnUdr7Y82Gv6g18" />
                                                </div>
                                                <div class="size-10 rounded-full border-2 border-white dark:border-slate-900 overflow-hidden bg-slate-200"
                                                    data-alt="Profile photo of Marc">
                                                    <img alt="Marc" class="w-full h-full object-cover"
                                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBGjvWuvJOFCoQqHNqDzuBFwCGzJDfjE7339UnfDq-tAbLQkf_21RV2CstFb3CU2U9JP3t0t-QhpY5wA_vjSq2cCA-rEBF7mHBKCHgwWVT1rW2XRguN_r0AeI2EBllzTUr_RfWrzs-H-DRyp5W-8hOMmdhxcB6hCaromXV5rtYpXLViMSN_jMjK15LAE38bxGC_EhZZujix0j59RnycrHP4qASX_8MdX1A361XUVm_EULLptJem7vyyc2GLz7vDq_lS_Zln-SOnTRs" />
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium">
                                                    <span class="font-bold">Alex</span> owes <span
                                                        class="font-bold">Marc</span>
                                                </p>
                                                <p class="text-xs text-slate-500">For Fiber Internet (May)</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-6">
                                            <p class="text-lg font-bold text-primary">€20.00</p>
                                            <button
                                                class="px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg hover:bg-primary/90 transition-colors">
                                                Settle Up
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Transaction Item 2 -->
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm">
                                        <div class="flex items-center gap-4">
                                            <div class="flex -space-x-3">
                                                <div class="size-10 rounded-full border-2 border-white dark:border-slate-900 overflow-hidden bg-slate-200"
                                                    data-alt="Profile photo of Chloe">
                                                    <img alt="Chloe" class="w-full h-full object-cover"
                                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDkO8ML_yrQY6uXJe2PXHVQFFSjysKUGPPv0ujOvS6WRPR9yhLbeD8LEDsddVlKvAcwYMdBONMpIfq7h-fHD-Zag5A8BT9UfdsAWs40mOWPj8zm6pH3lDCkKl_x_LlMz8-o-yWff9lsT8y0qM9cxa6moDVI_k1kwuunQwFBXmtVjq75GVkd0FzkiWUJ0IxKpig4k3sCN_06QmNuLa-BIFvYOWYluqr1aokrdWrbOYbBruxtZ1pP0HjlOiek9irCjG5BVaO2EiHlo0k" />
                                                </div>
                                                <div class="size-10 rounded-full border-2 border-white dark:border-slate-900 overflow-hidden bg-slate-200"
                                                    data-alt="Profile photo of Alex">
                                                    <img alt="Alex" class="w-full h-full object-cover"
                                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuD1JQqVkKciq32_MTz_DqNlybDpOV1zd4BBgIzHH30HHngbxKmcz_TbDv_j02d6Yc7MYvkwNuy2fnbaNSpmu3eIDyviR_RWG2wmeMGbtOlwQEbxLdUyEY5e1j393rlPMh7msVPHn7HJ6Vs23GeGEWy2S5KRpyqU_oIzBuk7sZogmJhLc16D3P4eOThLaA3Fjn5WuG7ZLzStEDxyFYBFN4xkbhT-SQ6kaoHgD1XsFnUOm0wKRbzgnToWi5NlN_FdBj9ANsCNXabKjPc" />
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium">
                                                    <span class="font-bold">Chloe</span> owes <span
                                                        class="font-bold">Alex</span>
                                                </p>
                                                <p class="text-xs text-slate-500">For Grocery Shopping (Friday)</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-6">
                                            <p class="text-lg font-bold text-primary">€45.00</p>
                                            <button
                                                class="px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg hover:bg-primary/90 transition-colors">
                                                Settle Up
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Transaction Item 3 (Small Debt) -->
                                    <div
                                        class="flex items-center justify-between p-4 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm opacity-80">
                                        <div class="flex items-center gap-4">
                                            <div class="flex -space-x-3">
                                                <div class="size-10 rounded-full border-2 border-white dark:border-slate-900 overflow-hidden bg-slate-200"
                                                    data-alt="Profile photo of Marc">
                                                    <img alt="Marc" class="w-full h-full object-cover"
                                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAswTLLoFgjyTol5-9pST_Adp5bOq8CKeLtcj-tdF9JchTsTJ_KA3WVV1gwnexq4zBnYdz4wOyuN0pbz9wP81eBL9mUHuIludH5zhI_GGZQjZg5EW6Ps0EpNmZMl7JPEMt_NIC1mY2iV5RgDT4ITYIHBsrCks9jLHH5LjKmAreg0IkCeHdv12ISm85eVeeh1TYL58QWz0pB6UPkRDQa__ilskXiabpbbIDu_abibvR-WxmnkGOkJhyd3_qgLLw58J3vowjzTzbP7tc" />
                                                </div>
                                                <div class="size-10 rounded-full border-2 border-white dark:border-slate-900 overflow-hidden bg-slate-200"
                                                    data-alt="Profile photo of Chloe">
                                                    <img alt="Chloe" class="w-full h-full object-cover"
                                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZQ5ypPoWsH6-5CW72oABDmI2661DJlhkAxVo6AZuZwQG-9Eke1JiRLEtuG5pRltzfsRYDcGK2muVH-cDEj83NDRECDQ6LQQaZBrwCwMJCL_QsRqoHaxhub4LAq8JINUE6TUgl52YS149QlhUa2WjwzOaUSw_SYKmR5gGhBZggSw0_5DyP8nZF0-xY3N6Q3YPFQ0ytUp1hPd-otTAXiYTIR6NW6mQSYgQ1EkiM5UCWEM8Xv9vPw2c9ld61T5cCBqw1AbctTDd-j2o" />
                                                </div>
                                            </div>
                                            <div>
                                                <p class="text-sm font-medium">
                                                    <span class="font-bold">Marc</span> owes <span
                                                        class="font-bold">Chloe</span>
                                                </p>
                                                <p class="text-xs text-slate-500">Pizza Night</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-6">
                                            <p class="text-lg font-bold text-primary">€12.50</p>
                                            <button
                                                class="px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg hover:bg-primary/90 transition-colors">
                                                Settle Up
                                            </button>
                                        </div>
                                    </div>
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