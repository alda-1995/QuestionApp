@props(['type' => 'button', 'label' => '', 'id' => '', 'btnClass' => 'btn-secondary'])

<button type="{{ $type }}" id="{{$id}}" {{ $attributes->merge(['class' => $btnClass]) }}>
    <div class="flex mr-1">
        {{ $icon }}
    </div>
    {{ $label }}
</button>
