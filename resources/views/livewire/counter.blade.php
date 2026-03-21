<div
    aria-label="counter"
    class="inline-flex overflow-hidden border rounded-lg border-slate-200 m-2">
    <button wire:click="decrement" class="flex items-center justify-center w-10 text-white h-10 cursor-pointer bg-slate-500 hover:bg-slate-600">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-6 h-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth="2"
                d="M20 12H4" />
        </svg>
    </button>
    <span class="flex items-center justify-center w-20 h-10 text-2xl font-bold">
        {{$count}}
    </span>
    <button wire:click="increment" class="flex items-center justify-center w-10 text-white h-10 cursor-pointer bg-slate-500 hover:bg-slate-600">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-6 h-6"
            fill="white"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth="2"
                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
    </button>
</div>