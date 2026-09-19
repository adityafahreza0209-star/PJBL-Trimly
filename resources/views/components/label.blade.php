@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-[0.85rem] font-semibold text-primary mb-2']) }}>
    {{ $value ?? $slot }}
</label>
