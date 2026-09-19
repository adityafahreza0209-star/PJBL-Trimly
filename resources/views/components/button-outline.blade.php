@props(['type' => 'button', 'size' => 'normal', 'fullWidth' => false, 'href' => null, 'variant' => 'secondary'])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 font-semibold transition-all duration-200 cursor-pointer rounded-sm border-[1.5px] bg-transparent';
    
    // Size logic
    if ($size === 'large') {
        $sizeClasses = 'px-8 py-4 text-base';
    } else {
        $sizeClasses = 'px-6 py-3 text-sm';
    }
    
    // Width logic
    $widthClasses = $fullWidth ? 'w-full flex' : '';
    
    // Variant logic
    if ($variant === 'accent') {
        $colorClasses = 'text-accent border-accent hover:bg-accent hover:text-white hover:-translate-y-px';
    } else {
        // default uses forest-green (primary)
        $colorClasses = 'text-primary border-primary hover:bg-primary hover:text-white hover:-translate-y-px';
    }
    
    $classes = trim("$baseClasses $sizeClasses $widthClasses $colorClasses");
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
