@props(['type' => 'button', 'id' => '', 'label' => '', 'btnClass' => 'btn-primary'])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn ' . $btnClass]) }}>
    {{ $label }}
</button>
