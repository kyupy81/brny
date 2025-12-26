<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-accent-DEFAULT border border-transparent rounded-input font-semibold text-xs text-text-onStrong uppercase tracking-widest hover:bg-accent-hover focus:bg-accent-hover active:bg-accent-hover focus:outline-none focus:ring-2 focus:ring-accent-focusRing focus:ring-offset-2 focus:ring-offset-neutral-950 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
