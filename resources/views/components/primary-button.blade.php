```php
@props(['type' => 'submit'])

<button
    type="{{ $type }}"
    {{ $attributes->class([
        'inline-flex',
        'items-center',
        'px-5',
        'py-2',
        'rounded-lg',
        'border',
        'border-transparent',
        'bg-gray-800',
        'text-white',
        'text-xs',
        'font-semibold',
        'uppercase',
        'tracking-wide',
        'transition-all',
        'duration-150',
        'ease-in-out',
        'hover:bg-gray-700',
        'focus:bg-gray-700',
        'active:bg-gray-900',
        'focus:outline-none',
        'focus:ring-2',
        'focus:ring-indigo-500',
        'focus:ring-offset-2'
    ]) }}
>
    {{ $slot }}
</button>
```

