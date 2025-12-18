@props([
    'type' => 'text',
    'placeholder' => '',
    'required' => false,
    'class' => '',
    'label' => null,
    'error' => null,
])

@php
    $inputClasses = 'w-full bg-bg-elevated text-text-primary border border-border-card rounded-input px-3 py-2 placeholder-text-muted focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent transition-colors duration-200';
    if ($error) {
        $inputClasses .= ' border-danger focus:ring-danger';
    }
@endphp

@if($label)
    <label class="block mb-2 text-sm font-semibold text-text-primary">
        {{ $label }}
        @if($required)
            <span class="text-danger">*</span>
        @endif
    </label>
@endif

<input
    type="{{ $type }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => "$inputClasses $class"]) }}
    {{ $required ? 'required' : '' }}
/>

@if($error)
    <p class="mt-1 text-sm text-danger">{{ $error }}</p>
@endif
