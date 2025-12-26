<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-bg-surface border border-border-default rounded-input font-semibold text-xs text-text-primary uppercase tracking-widest shadow-sm hover:bg-bg-elevated focus:outline-none focus:ring-2 focus:ring-accent-focusRing focus:ring-offset-2 focus:ring-offset-neutral-950 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
