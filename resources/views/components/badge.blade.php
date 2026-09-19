@props(['variant' => 'primary', 'type' => 'pill'])

@php
    $baseClasses = 'inline-flex items-center font-bold tracking-wide';
    
    // Type logic
    if ($type === 'pill') {
        $typeClasses = 'text-[0.65rem] px-1.5 py-0.5 rounded-sm'; // 2px 6px, radius-sm
    } else { // default status badge
        $typeClasses = 'text-[0.66rem] px-[7px] py-[2px] rounded-[3px]';
    }
    
    // Variant logic
    if ($variant === 'accent') {
        $colorClasses = 'bg-accent text-white';
    } elseif ($variant === 'primary') {
        $colorClasses = 'bg-primary text-white';
    } elseif ($variant === 'secondary') {
        $colorClasses = 'bg-primary text-white';
    } elseif ($variant === 'success') {
        $colorClasses = 'bg-[#10B981] text-white';
    } elseif ($variant === 'subtle') {
        $colorClasses = 'bg-primary/10 text-primary';
    } elseif ($variant === 'neutral') {
        $colorClasses = 'bg-slate-100 text-slate-700 border border-slate-200';
    } elseif ($variant === 'outline') {
        $colorClasses = 'bg-transparent text-[#059669] border border-dashed border-border-medium'; // avail-badge
    } else {
        $colorClasses = 'bg-surface text-primary border border-border-light';
    }
    
    $classes = trim("$baseClasses $typeClasses $colorClasses");
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
