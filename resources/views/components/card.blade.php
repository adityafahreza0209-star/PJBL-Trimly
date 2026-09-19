@props(['padding' => 'normal', 'highlight' => false, 'bgColor' => 'bg-background', 'border' => null])

@php
    $baseClasses = 'rounded-xl shadow-subtle';
    
    // Padding logic
    if ($padding === 'large') {
        $paddingClasses = 'p-6 sm:p-8'; // 24px - 32px
    } elseif ($padding === 'none') {
        $paddingClasses = 'p-0';
    } else {
        $paddingClasses = 'p-6'; // Standardized to 24px (p-6)
    }
    
    // Border logic
    if ($border) {
        $borderClasses = $border;
    } elseif ($highlight) {
        $borderClasses = 'border-2 border-accent';
    } else {
        $borderClasses = 'border border-border-light';
    }
    
    $bgClass = $highlight ? 'bg-[#FFFDFB]' : $bgColor;
    
    $classes = trim("$baseClasses $paddingClasses $borderClasses $bgClass");
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
