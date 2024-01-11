@props(['type' => 'button', 'id' => '', 'label' => '', 'btnClass' => 'btn-primary'])

<button id="{{$id}}" type="{{ $type }}" {{ $attributes->merge(['class' => 'btn ' . $btnClass]) }}>
    {{ $label }}
</button>
