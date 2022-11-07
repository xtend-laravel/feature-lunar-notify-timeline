@props([
    'modalKey',
])
<div
    x-data="{}"
    x-on:click="$dispatch('open-modal', { id: '{{ $modalKey }}' })"
    {{ $attributes->class(['inline-block']) }}
>
    {{ $slot }}
</div>
