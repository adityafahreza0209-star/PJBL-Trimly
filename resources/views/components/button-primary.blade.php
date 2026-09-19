@props(['type' => 'submit', 'size' => 'normal', 'fullWidth' => false, 'href' => null])

@php
    $baseClasses = 'inline-flex items-center justify-center gap-2 font-semibold transition-all duration-200 cursor-pointer rounded-sm border-[1.5px]';
    
    // Size logic
    if ($size === 'large') {
        $sizeClasses = 'px-8 py-4 text-base';
    } else {
        $sizeClasses = 'px-6 py-3 text-sm';
    }
    
    // Width logic
    $widthClasses = $fullWidth ? 'w-full flex' : '';
    
    // Color logic
    $colorClasses = 'bg-primary text-white border-primary hover:bg-primary-hover hover:border-primary-hover hover:-translate-y-px';
    
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
