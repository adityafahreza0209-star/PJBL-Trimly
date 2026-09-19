@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full px-5 py-4 border border-border-medium rounded-sm bg-background text-primary text-base transition-all duration-200 focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary placeholder:text-primary/40 disabled:opacity-50 disabled:cursor-not-allowed']) !!}>
