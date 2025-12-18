@props([
    'type' => 'info', // info, success, warning, danger
    'dismissible' => false,
    'class' => '',
])

@php
    $typeClasses = match($type) {
        'success' => 'bg-success/10 border border-success text-success',
        'warning' => 'bg-warning/10 border border-warning text-warning',
        'danger' => 'bg-danger/10 border border-danger text-danger',
        default => 'bg-accent/10 border border-accent text-accent',
    };
@endphp

<div {{ $attributes->merge(['class' => "rounded-card p-3 text-sm $typeClasses $class", 'role' => 'alert']) }}>
    <div class="flex items-start justify-between">
        <div>{{ $slot }}</div>
        @if($dismissible)
            <button class="ml-2 text-current opacity-60 hover:opacity-100" onclick="this.parentElement.parentElement.remove()">
                
            </button>
        @endif
    </div>
</div>
