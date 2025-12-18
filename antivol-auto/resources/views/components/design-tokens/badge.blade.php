@props([
    'status' => 'default', // active, pending, stolen, default
    'class' => '',
])

@php
    $statusClasses = match($status) {
        'active' => 'bg-success text-bg-background',
        'pending' => 'bg-warning text-bg-background',
        'stolen' => 'bg-danger text-bg-background',
        default => 'bg-bg-surface text-text-primary border border-border-card',
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center rounded-pill px-2 py-1 text-sm font-semibold $statusClasses $class"]) }}>
    {{ $slot }}
</span>
