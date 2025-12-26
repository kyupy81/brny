@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-border-default bg-bg-surface text-text-primary focus:border-accent-DEFAULT focus:ring-accent-focusRing rounded-input shadow-sm']) }}>
