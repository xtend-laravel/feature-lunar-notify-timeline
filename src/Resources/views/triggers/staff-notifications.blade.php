<span class="relative inline-flex cursor-pointer">
    <button type="button">
        <x-bx-envelope class="h-8 w-8 text-white" />
    </button>
    @if($unreadNotificationsCount)
        <span class="absolute top-0 right-0 -mt-1 -mr-1 flex h-5 w-5">
            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-sky-400 opacity-75"></span>
            <span
                class="relative inline-flex h-5 w-5 items-center justify-center rounded-full bg-sky-500 text-xs font-bold text-white">
                {{ $unreadNotificationsCount }}
            </span>
        </span>
    @endif
</span>
