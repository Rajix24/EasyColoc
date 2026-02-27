@extends("layouts.sideBar")

@section('main')
    @if ($colocations->isEmpty())
        <div class="flex flex-col items-center justify-center p-6 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm">
            <span class="material-symbols-outlined text-4xl text-slate-400 mb-3">
                apartment
            </span>
            <p class="text-sm font-semibold text-slate-700 dark:text-slate-200">
                No Colocation Available
            </p>
            <p class="text-xs text-slate-500 mt-1 text-center">
                There are currently no colocations listed.
                Start by adding a new one.
            </p>
            <button
                class="mt-4 px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg hover:bg-primary/90 transition-colors">
                Add Colocation
            </button>

        </div>
    @endif
    @foreach ($colocations as $colocation )
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
            <button
            class="px-4 py-2 bg-primary text-white text-xs font-bold rounded-lg hover:bg-primary/90 transition-colors">
            Join
        </button>
    </div>
</div>
@endforeach
@endsection