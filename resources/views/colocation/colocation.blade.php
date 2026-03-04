@extends("layouts.sideBar")

@section('main')
    @if ($colocations->isEmpty())
        <div class="min-h-[60vh] flex items-center justify-center">
            <div
                class="w-full max-w-md text-center p-8 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div
                    class="flex items-center justify-center w-16 h-16 mx-auto rounded-full bg-slate-100 dark:bg-slate-800 mb-5">
                    <span class="material-symbols-outlined text-3xl text-slate-400">
                        apartment
                    </span>
                </div>
                <h3 class="text-lg font-semibold text-slate-800 dark:text-slate-100">
                    No Colocation Available
                </h3>
                <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                    There are currently no colocations listed.
                    Start by creating a new one to get started.
                </p>
                <a href="{{ route('colocations.create') }}"
                    class="inline-block mt-6 px-5 py-2.5 bg-indigo-600 text-white text-sm font-medium rounded-xl shadow-md hover:bg-indigo-700 hover:scale-105 transition-all duration-200">
                    + Add Colocation
                </a>
            </div>
        </div>
    @else
        <div class="flex justify-between w-50 ">
            <a href="{{ route('expence.create', ['id' => $colocations[0]->id]) }}"
                class="px-4 py-2 bg-primary text-white w-40 text-xs font-bold rounded-lg hover:bg-primary/90 transition-colors">add
                Expenses</a>
            <a href="{{ route('categories.create', ['id' => $colocations[0]->id]) }}"
                class="px-4 py-2 border-green-900 text-primary w-40 text-xs font-bold rounded-lg hover:bg-primary/90 hover:text-white/90 transition-colors">add
                categories</a>
        </div>
        <div class="flex border-b border-slate-200 dark:border-slate-800 mb-6">
            <p class="px-6 py-3 text-sm font-medium text-slate-500 hover:text-slate-700 dark:hover:text-slate-300">Title:
                {{ $colocations[0]->title }}
            </p>
            <p class="px-6 py-3 text-sm font-medium text-slate-500 hover:text-slate-700 dark:hover:text-slate-300">Price:
                {{ $colocations[0]->price }}
            </p>
        </div>
        <!-- Expenses Table -->
        <div
            class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-800/50 text-slate-500 text-xs font-bold uppercase tracking-wider">
                        <th class="px-6 py-4">Name/User</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Payer</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                    @if ($apay->isEmpty())
                        <tr>
                            <td colspan="3">
                                <div class="flex flex-col items-center justify-center py-12 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-300 mb-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 17v-2a4 4 0 014-4h4" />
                                    </svg>
                                    <h3 class="text-lg font-semibold text-gray-700">No Depenses Found</h3>
                                    <p class="text-gray-500 mt-2">You haven't added any depense yet.</p>
                                </div>
                            </td>
                        </tr>
                    @endif
                    @foreach ($apay as $pay)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="font-semibold text-sm">{{ $pay->title }}</span>
                                    <span class="text-xs text-slate-400">{{ $pay->created_at }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">
                                    {{ $pay->categories }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-semibold text-sm">{{ $pay->price }} Dh</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-slate-200 overflow-hidden">
                                        <img alt="Alex" class="w-full h-full object-cover" data-alt="Avatar for Alex"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxTu9MUK2GELkA5y3uT374t_UOEWhpEqCS2hNv-ue-7eAK0ZVD5FPZQJudofPi-M-mKbgrbtjMCTQnhmEll0KlNvlWxBLEAHIdcC4uLCJIkFj3qOy1r-084tJcTMzYbc_U3Uwzyoz7orC0xqDqmwfknRlVtAbFk73E1x7szWtrHxWeSdOv3bHs479R6qoPedtaabeuEuQGiVlVvA3pLQbci8kmXtV9R2tgMq_b-ggTQ27uxpHWm2NQ6NRFfQq_tnUxGPXvU9_JJ9Y" />
                                    </div>
                                    <span class="text-sm">{{ $pay->user->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button class="p-1 text-slate-400 hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-lg">edit</span>
                                    </button>
                                    <button class="p-1 text-slate-400 hover:text-red-500 transition-colors">
                                        <span class="material-symbols-outlined text-lg">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection