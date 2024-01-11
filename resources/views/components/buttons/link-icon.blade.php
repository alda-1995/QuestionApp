@props(['url' => '', 'label' => '', 'btnClass' => 'btn-primary'])

<a href="{{ $url }}" class="link-text">
    @isset($icon)
    <div class="flex mr-2">
        {{ $icon }}
    </div>
    @endisset
    {{ $label }}
</a>
