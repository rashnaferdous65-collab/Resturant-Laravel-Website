@props([
    'align' => 'right',
    'width' => '48',
    'contentClasses' => 'py-1 bg-white'
])

@php
$alignmentClasses = [
    'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
    'top' => 'origin-top',
    'right' => 'ltr:origin-top-right rtl:origin-top-left end-0',
][$align] ?? 'ltr:origin-top-right rtl:origin-top-left end-0';

$dropdownWidth = [
    '48' => 'w-48',
][$width] ?? $width;
@endphp

<div
    x-data="{ open: false }"
    @click.outside="open = false"
    @close.stop="open = false"
    class="relative"
>
    <div @click="open = !open">
        {{ $trigger }}
    </div>

    <div
        x-show="open"
        x-transition
        class="absolute z-50 mt-2 {{ $dropdownWidth }} rounded-md shadow-lg {{ $alignmentClasses }}"
        style="display: none"
        @click="open = false"
    >
        <div class="rounded-md ring-1 ring-black/5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>