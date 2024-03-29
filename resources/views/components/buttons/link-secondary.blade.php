@props(['url' => '', 'label' => ''])

<a href="{{ $url }}"
{{ $attributes->merge(['class' => 'btn btn-secondary']) }}>
    @isset($icon)
    <div class="flex mr-1">
        {{ $icon }}
    </div>
    @endisset
    {{ $label }}
</a>