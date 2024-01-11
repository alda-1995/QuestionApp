@props(['url' => '', 'label' => '', 'id' => '', 'btnClass' => 'btn-action'])
<a href="{{$url}}" id="{{$id}}"
{{ $attributes->merge(['class' => 'btn-action']) }}>
    @isset($icon)
    <div class="flex mr-1">
        {{ $icon }}
    </div>
    @endisset
    {{ $label }}
</a>
