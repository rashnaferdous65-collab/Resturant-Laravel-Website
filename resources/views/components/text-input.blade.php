@props([
    'disabled' => false,
])

@php
    $inputClasses = 'rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500';
@endphp

<input
    {{ $attributes->class($inputClasses) }}
    @disabled($disabled)
>