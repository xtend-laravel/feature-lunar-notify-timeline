<span class="relative inline-flex cursor-pointer">
    <button type="button">
        <x-bx-bell class="h-6 w-6 text-black" />
    </button>
    @if($unreadNotificationsCount)
        <span class="absolute top-0 right-0 -mt-2 -mr-1 flex h-3 w-4">
            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-orange-400 opacity-75"></span>
            <span
                class="relative inline-flex h-5 w-5 items-center justify-center rounded-full bg-orange-500 text-xs font-bold text-white">
                {{ $unreadNotificationsCount }}
            </span>
        </span>
    @endif
</span>
