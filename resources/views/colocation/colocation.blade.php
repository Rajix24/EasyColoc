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
        <a href="{{ route('categories.create', $colocations[0]->id) }}"
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
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="font-semibold text-sm">Weekly Grocery Run</span>
                                <span class="text-xs text-slate-400">Added by Alex • Oct 12, 2023</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400">
                                Food
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold text-sm">$85.50</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-slate-200 overflow-hidden">
                                    <img alt="Alex" class="w-full h-full object-cover" data-alt="Avatar for Alex"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBxTu9MUK2GELkA5y3uT374t_UOEWhpEqCS2hNv-ue-7eAK0ZVD5FPZQJudofPi-M-mKbgrbtjMCTQnhmEll0KlNvlWxBLEAHIdcC4uLCJIkFj3qOy1r-084tJcTMzYbc_U3Uwzyoz7orC0xqDqmwfknRlVtAbFk73E1x7szWtrHxWeSdOv3bHs479R6qoPedtaabeuEuQGiVlVvA3pLQbci8kmXtV9R2tgMq_b-ggTQ27uxpHWm2NQ6NRFfQq_tnUxGPXvU9_JJ9Y" />
                                </div>
                                <span class="text-sm">Alex</span>
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
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="font-semibold text-sm">Monthly Rent Payment</span>
                                <span class="text-xs text-slate-400">Added by Sam • Oct 01, 2023</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-400">
                                Rent
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold text-sm">$1,200.00</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-slate-200 overflow-hidden">
                                    <img alt="Sam" class="w-full h-full object-cover" data-alt="Avatar for Sam"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDB_KWedlfFgImVn-vJWbimxVI2I8_31xFeD2C06HuR09VgEQnr6Vt5rzR9YEIA91oUw30PoyjLoRhNRjFT0vHnjqg8SXpKWLYeiIPSk8usGzVDAPpMaGerqMjXmKnchLzu571TjLZbSEOR9PqjYdCo7sWM-B63SOimaOPVzyPUWeSaP2p_pqXGIuW__bbKjSgJC0-rdX-viYCQVT5JK58_CSaeT2pxbj8UsKBYnEJGdgUbdmgAczTHWzaUXWX6vwGOeDJCcnZajmc" />
                                </div>
                                <span class="text-sm">Sam</span>
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
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="font-semibold text-sm">Electricity &amp; Gas Bill</span>
                                <span class="text-xs text-slate-400">Added by Jordan • Oct 05, 2023</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800 dark:bg-amber-900/30 dark:text-amber-400">
                                Utilities
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold text-sm">$65.20</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-slate-200 overflow-hidden">
                                    <img alt="Jordan" class="w-full h-full object-cover" data-alt="Avatar for Jordan"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDRX2cn0jQk3xd20SaUwFwpgdbjwKwi9Q4jG5YztvFwK7ceTUimDf-ZXD7QeOLCs7bjbce6i5-UYvNNKw-Zcu1SlRqPS73M5wSBX3qytZ1z8YCRVI61DDZH-nlqPKYi6DwWHvnjx5pA4SyjiTnmYPv1G_cT0GiTxE7EeaJOzJcOIXVTgBxL51_8Uq2EzUHG5A4hBurctCIGyCzuJdSsyUinsRQ7V3Ul2IGOjqcBn6Ns_82io_Eg2LiRfk1m_j5zozbiwwR9c93R5qQ" />
                                </div>
                                <span class="text-sm">Jordan</span>
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
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="font-semibold text-sm">New Cleaning Supplies</span>
                                <span class="text-xs text-slate-400">Added by Alex • Oct 08, 2023</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-400">
                                Household
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold text-sm">$12.99</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-slate-200 overflow-hidden">
                                    <img alt="Alex" class="w-full h-full object-cover" data-alt="Avatar for Alex"
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuC5uhtIyX6rt27yphyKocJDFrvAIcxrS5vOe_1JQ8KIppmGRrII0Tj6QOaSdEW1pHNOImDLIi4ZnyRo4M11RgaxmYp084PmQPgjBsKWQhC7ASB2whyuO8PQOsTR_F_z2pyJbA6dmhFf6lsgbXTfFQH39-r1A-a7qEEqJ4nyA_sP1vEQPcDSIbjcBm545dUUNoDVjOeqdEGJDwIgAOCJn_Tm9k1iG0unAKupOmNALKA58Bv2cNNX7BiZ3V_sc5vAN4znYSb8MAwz-6s" />
                                </div>
                                <span class="text-sm">Alex</span>
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
                </tbody>
            </table>
        </div>
    @endif
@endsection