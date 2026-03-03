<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>EasyColoc - Add Expense</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
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
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #2ecc7033;
            border-radius: 10px;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 min-h-screen flex items-center justify-center p-4">
    <div
        class="relative w-full max-w-2xl bg-white dark:bg-slate-900 rounded-xl shadow-2xl overflow-hidden border border-slate-200 dark:border-slate-800">
        <!-- Header -->
        <header class="flex items-center justify-between border-b border-slate-100 dark:border-slate-800 px-6 py-4">
            <div class="flex items-center gap-3">
                <div class="bg-primary/10 p-2 rounded-lg">
                    <span class="material-symbols-outlined text-primary">receipt_long</span>
                </div>
                <h2 class="text-xl font-bold tracking-tight">Add New Expense</h2>
            </div>
            <button
                class="flex items-center justify-center rounded-full h-10 w-10 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </header>
        <form method="post" action="{{ route('expence.store', ['colocation_id' => $colocations[0]->id]) }}" class="p-6 space-y-6">
        @csrf
            <!-- Basic Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Expense Name</label>
                    <div class="relative">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">shopping_cart</span>
                        <input name="title"
                            class="w-full pl-10 pr-4 py-3 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"
                            placeholder="e.g. Weekly Groceries" type="text" />
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Amount &amp;
                        Currency</label>
                    <div class="flex">

                        <input name="price"
                            class="flex-1 rounded-r-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition-all"
                            placeholder="0.00" step="0.01" type="number" />
                    </div>
                </div>
            </div>
            <!-- Date and Category -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Category</label>
                    <div class="relative">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">category</span>
                        <select name="category_id"
                            class="w-full pl-10 pr-4 py-3 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-primary focus:border-primary outline-none appearance-none">
                            <option value="1">Select Category</option>
                            <option value="2" >Groceries</option>
                            <option value="3">Rent</option>
                            <option value="4">Utilities</option>
                            <option value="5">Entertainment</option>
                            <option value="6">Others</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Paid By -->
            <div class="space-y-2">
                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Paid By</label>
                <div class="relative">
                    <span
                        class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xl">person</span>
                    <select name="user_id"
                        class="w-full pl-10 pr-4 py-3 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 focus:ring-2 focus:ring-primary focus:border-primary outline-none appearance-none">
                        @foreach ($colocations[0]->user as $user )
                        <option value="{{ $user->id }}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col md:flex-row gap-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                <a
                    class="flex-1 px-6 py-3 rounded-lg border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-semibold hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors"
                    href="{{ route('colocations.index') }}">
                    Cancel
               </a>
                <button
                    class="flex-1 px-6 py-3 rounded-lg bg-primary text-white font-bold hover:bg-primary/90 shadow-lg shadow-primary/20 transition-all"
                    type="submit">
                    Save Expense
                </button>
            </div>
        </form>
        <!-- Decorative background elements -->
        <div class="absolute -top-24 -right-24 w-48 h-48 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -left-24 w-48 h-48 bg-primary/5 rounded-full blur-3xl pointer-events-none">
        </div>
    </div>
</body>

</html>