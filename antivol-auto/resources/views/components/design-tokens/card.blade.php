@props([
    'title' => null,
    'class' => '',
])

<div {{ $attributes->merge(['class' => "bg-bg-elevated border border-border-card rounded-card shadow-md p-4 $class"]) }}>
    @if($title)
        <h3 class="text-h3 text-text-primary mb-3 font-bold">{{ $title }}</h3>
    @endif
    {{ $slot }}
</div>
