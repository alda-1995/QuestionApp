@props(['type' => 'button', 'label' => '', 'id' => '', 'btnClass' => 'btn-secondary'])

<button type="{{ $type }}" id="{{$id}}"
{{ $attributes->merge(['class' => 'btn btn-secondary']) }}>
    @isset($icon)
    <div class="flex mr-1">
        {{ $icon }}
    </div>
    @endisset
    {{ $label }}
</button>
