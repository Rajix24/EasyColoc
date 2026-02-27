<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>EasyColoc - Set Up Your Home</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
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
                        "display": ["Inter"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 min-h-screen">
    <div class="relative flex h-auto min-screen w-full flex-col group/design-root overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <!-- Top Navigation Bar -->
            <header
                class="flex items-center justify-between whitespace-nowrap border-b border-solid border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 px-6 py-4 lg:px-40">
                <div class="flex items-center gap-3 text-primary">
                    <div class="size-8 flex items-center justify-center bg-primary/10 rounded-lg">
                        <span class="material-symbols-outlined text-primary">home_work</span>
                    </div>
                    <h2 class="text-slate-900 dark:text-slate-100 text-xl font-bold leading-tight tracking-tight">
                        EasyColoc</h2>
                </div>
                <div class="flex items-center gap-2">
                    <button
                        class="flex items-center justify-center rounded-lg h-10 w-10 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 hover:bg-slate-200 transition-colors">
                        <span class="material-symbols-outlined text-[20px]">help</span>
                    </button>
                    <button
                        class="flex items-center justify-center rounded-lg h-10 w-10 bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 hover:bg-slate-200 transition-colors lg:hidden">
                        <span class="material-symbols-outlined text-[20px]">menu</span>
                    </button>
                </div>
            </header>
            <main class="flex flex-1 justify-center py-8 lg:py-12 px-4 lg:px-0">
                <div class="layout-content-container flex flex-col max-w-[640px] flex-1 gap-8">
                    <!-- Header Section -->
                    <div class="flex flex-col gap-2">
                        <h1 class="text-slate-900 dark:text-white text-4xl font-black leading-tight tracking-tight">Set
                            up your shared home</h1>
                        <p class="text-slate-500 dark:text-slate-400 text-lg font-normal">Start by adding your household
                            details and inviting your roommates to manage expenses together.</p>
                    </div>
                    <!-- Main Form Card -->
                    <form action="{{ route('colocations.store') }}" method="post">
                        @csrf
                        <div
                            class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-6 lg:p-8 shadow-sm flex flex-col gap-6">
                            <!-- Basic Info Section -->
                            <div class="flex flex-col gap-5">
                                <label class="flex flex-col gap-2">
                                    <p
                                        class="text-slate-700 dark:text-slate-300 text-sm font-semibold uppercase tracking-wider">
                                        Title of Colocation</p>
                                    <input name="title"
                                        class="form-input flex w-full rounded-lg text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 focus:border-primary focus:ring-1 focus:ring-primary h-14 px-4 text-base transition-all"
                                        placeholder="Title" type="text" />
                                </label>
                                <label class="flex flex-col gap-2">
                                    <p
                                        class="text-slate-700 dark:text-slate-300 text-sm font-semibold uppercase tracking-wider">
                                        Description</p>
                                    <textarea name="discription"
                                        class="form-textarea flex w-full rounded-lg text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 focus:border-primary focus:ring-1 focus:ring-primary min-h-[100px] px-4 py-3 text-base transition-all"
                                        placeholder="description" rows="3"></textarea>
                                </label>
                                <label class="flex flex-col gap-2">
                                    <p
                                        class="text-slate-700 dark:text-slate-300 text-sm font-semibold uppercase tracking-wider">
                                        Address or Location</p>
                                    <div class="relative group">
                                        <input name="location"
                                            class="form-input flex w-full rounded-lg text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 focus:border-primary focus:ring-1 focus:ring-primary h-14 pl-4 pr-12 text-base transition-all"
                                            placeholder="Morocco - Rabat" type="text" />
                                        <div
                                            class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 dark:text-slate-500">
                                            <span class="material-symbols-outlined">map</span>
                                        </div>
                                    </div>
                                </label>
                                <label class="flex flex-col gap-2">
                                    <p
                                        class="text-slate-700 dark:text-slate-300 text-sm font-semibold uppercase tracking-wider">
                                        Monthly Price</p>
                                    <div class="relative">
                                        <div
                                            class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                            <span class="text-lg font-medium">DHS</span>
                                        </div>
                                        <input name="price"
                                            class="form-input flex w-full rounded-lg text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 focus:border-primary focus:ring-1 focus:ring-primary h-14 pl-10 pr-4 text-base transition-all"
                                            placeholder="" type="number" />
                                    </div>
                                </label>
                            </div>
                            <hr class="border-slate-100 dark:border-slate-800" />
                            <div class="pt-4">
                                <button type="submit"
                                    class="w-full bg-primary hover:bg-primary/90 text-white font-bold h-14 rounded-xl text-lg flex items-center justify-center gap-2 transition-all shadow-lg shadow-primary/20">
                                    <span>Create Colocation</span>
                                    <span class="material-symbols-outlined">chevron_right</span>
                                </button>
                                <p class="text-center text-slate-400 dark:text-slate-500 text-xs mt-4">
                                    By creating a home, you agree to our Terms of Service and Privacy Policy.
                                </p>
                            </div>
                        </div>
                    </form>
                    <!-- Visual Help Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div
                            class="bg-primary/5 dark:bg-primary/10 border border-primary/20 rounded-xl p-5 flex items-start gap-4">
                            <div class="text-primary mt-1">
                                <span class="material-symbols-outlined">receipt_long</span>
                            </div>
                            <div>
                                <h4 class="text-slate-900 dark:text-white font-bold text-sm">Shared Expenses</h4>
                                <p class="text-slate-500 dark:text-slate-400 text-xs mt-1">Easily split rent, groceries,
                                    and utility bills between everyone.</p>
                            </div>
                        </div>
                        <div
                            class="bg-primary/5 dark:bg-primary/10 border border-primary/20 rounded-xl p-5 flex items-start gap-4">
                            <div class="text-primary mt-1">
                                <span class="material-symbols-outlined">calendar_month</span>
                            </div>
                            <div>
                                <h4 class="text-slate-900 dark:text-white font-bold text-sm">Chores &amp; Tasks</h4>
                                <p class="text-slate-500 dark:text-slate-400 text-xs mt-1">Organize cleaning schedules
                                    and household maintenance.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Footer -->
            <footer class="py-10 border-t border-slate-200 dark:border-slate-800 flex flex-col items-center gap-4">
                <div class="flex gap-6 text-slate-400 dark:text-slate-600">
                    <a class="hover:text-primary transition-colors" href="#">Help</a>
                    <a class="hover:text-primary transition-colors" href="#">Safety</a>
                    <a class="hover:text-primary transition-colors" href="#">Cookies</a>
                </div>
                <p class="text-slate-400 dark:text-slate-600 text-sm">© 2024 EasyColoc. All rights reserved.</p>
            </footer>
        </div>
    </div>
</body>

</html>