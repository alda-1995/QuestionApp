@props(['type' => 'button', 'label' => '', 'id' => '', 'btnClass' => 'btn-action'])

<button type="{{ $type }}" id="{{$id}}"
{{ $attributes->merge(['class' => 'btn-action']) }}>
    @isset($icon)
    <div class="flex mr-1">
        {{ $icon }}
    </div>
    @endisset
    {{$slot}}
    {{ $label }}
</button>
