@extends('layouts.sideBar')
@section('main')

    <!-- Main Column -->
    <section class="lg:col-span-9 flex flex-col gap-6">
        <!-- Tabs -->

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex flex-col gap-2 rounded-xl p-6 bg-primary/5 border border-primary/10">
                <div class="flex items-center gap-2 text-primary">
                    <span class="material-symbols-outlined">trending_up</span>
                    <p class="text-sm font-semibold uppercase tracking-wider">Total to receive</p>
                </div>
                <p class="text-3xl font-bold">$2.00</p>
            </div>
            <div
                class="flex flex-col gap-2 rounded-xl p-6 bg-red-50 dark:bg-red-900/10 border border-red-100 dark:border-red-900/20">
                <div class="flex items-center gap-2 text-red-500">
                    <span class="material-symbols-outlined">trending_down</span>
                    <p class="text-sm font-semibold uppercase tracking-wider">Total to pay</p>
                </div>
                <p class="text-3xl font-bold text-red-600 dark:text-red-400">€20.00</p>
            </div>
        </div>
        <!-- Who Owes Who Section -->
        <div class="flex flex-col gap-4">
            <div class="flex justify-between">
                <h3 class="text-lg font-bold tracking-tight">Who owes who</h3>
                <a href="{{ route('colocations.create') }}"
                    class="px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg hover:bg-primary/90 transition-colors">
                    new Colocation
                </a>
            </div>
            <div class="flex flex-col gap-3">
                <!-- Transaction Item 1 -->
                @foreach ($colocations as $colocation)
                    <div
                        class="flex items-center justify-between p-4 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm opacity-80">
                        <div class="flex items-center gap-4">
                            <div class="flex -space-x-3">
                                <div class="size-10 rounded-full border-2 border-white dark:border-slate-900 overflow-hidden bg-slate-200"
                                    data-alt="Profile photo of Marc">
                                    <img alt="Marc" class="w-full h-full object-cover"
                                        src="{{ asset('storage/images/home.jpg') }}" width="10px" />
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-medium">
                                    <span class="font-bold">{{ $colocation->title }}</span>
                                </p>
                                <p class="text-xs text-slate-500">{{ $colocation->location }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6">
                            <p class="text-lg font-bold text-primary">{{ $colocation->price }} DHS</p>
                            <a href="{{ route('colocations.show', $colocation->id) }}"
                                class="px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg hover:bg-primary/90 transition-colors">
                                Join
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
<!-- </div>
</div>
</main>
</div>
</div>
</body>

</html> -->