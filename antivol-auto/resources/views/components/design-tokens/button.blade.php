@props([
    'variant' => 'primary', // primary, secondary, ghost, danger
    'size' => 'md', // sm, md, lg
    'disabled' => false,
    'class' => '',
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-semibold transition-colors duration-200 rounded-pill focus-visible:ring-2 focus-visible:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';
    
    $sizeClasses = match($size) {
        'sm' => 'px-3 py-1 text-sm',
        'lg' => 'px-5 py-3 text-lg',
        default => 'px-4 py-2 text-base',
    };
    
    $variantClasses = match($variant) {
        'primary' => 'bg-accent hover:bg-accent-hover text-bg-background focus-visible:ring-accent',
        'secondary' => 'bg-bg-elevated border border-border-card text-text-primary hover:bg-bg-surface focus-visible:ring-accent',
        'ghost' => 'text-text-secondary hover:text-text-primary hover:bg-bg-elevated focus-visible:ring-accent',
        'danger' => 'bg-danger hover:opacity-90 text-bg-background focus-visible:ring-danger',
        default => 'bg-accent hover:bg-accent-hover text-bg-background',
    };
@endphp

<button
    {{ $attributes->merge(['class' => "$baseClasses $sizeClasses $variantClasses $class"]) }}
    {{ $disabled ? 'disabled' : '' }}
>
    {{ $slot }}
</button>
