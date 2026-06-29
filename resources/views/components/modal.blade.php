@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl',
])

@php
$widthClasses = [
    'sm'  => 'sm:max-w-sm',
    'md'  => 'sm:max-w-md',
    'lg'  => 'sm:max-w-lg',
    'xl'  => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
];

$modalWidth = $widthClasses[$maxWidth] ?? $widthClasses['2xl'];
@endphp

<div
    x-data="{
        show: @js($show),

        focusables() {
            const selector =
                'a, button, input:not([type=hidden]), textarea, select, details, [tabindex]:not([tabindex=-1])';

            return [...$el.querySelectorAll(selector)]
                .filter(item => !item.disabled);
        },

        firstFocusable() {
            return this.focusables()[0];
        },

        lastFocusable() {
            return this.focusables().at(-1);
        },

        nextFocusable() {
            return this.focusables()[this.nextFocusableIndex()] ?? this.firstFocusable();
        },

        prevFocusable() {
            return this.focusables()[this.prevFocusableIndex()] ?? this.lastFocusable();
        },

        nextFocusableIndex() {
            return (
                this.focusables().indexOf(document.activeElement) + 1
            ) % (this.focusables().length + 1);
        },

        prevFocusableIndex() {
            return Math.max(
                0,
                this.focusables().indexOf(document.activeElement)
            ) - 1;
        }
    }"

    x-init="
        $watch('show', value => {
            document.body.classList.toggle('overflow-y-hidden', value);

            @if($attributes->has('focusable'))
                if (value) {
                    setTimeout(() => firstFocusable()?.focus(), 100);
                }
            @endif
        })
    "

    x-on:open-modal.window="$event.detail === '{{ $name }}' && (show = true)"
    x-on:close-modal.window="$event.detail === '{{ $name }}' && (show = false)"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey ? prevFocusable().focus() : nextFocusable().focus()"

    x-show="show"

    class="fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0"
    style="display: {{ $show ? 'block' : 'none' }}"
>

    <!-- Overlay -->
    <div
        x-show="show"
        x-on:click="show = false"

        class="fixed inset-0 transition-all"

        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"

        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <div class="absolute inset-0 bg-gray-600/70"></div>
    </div>

    <!-- Modal -->
    <div
        x-show="show"

        class="
            mb-6
            sm:mx-auto
            sm:w-full
            {{ $modalWidth }}
            overflow-hidden
            rounded-lg
            bg-white
            shadow-xl
            transform
        "

        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"

        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
    >
        {{ $slot }}
    </div>

</div>