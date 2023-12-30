@props(['url' => '', 'label' => ''])
<a class="link-menu group/link" href="{{ route($url) }}">
    <div class="flex mr-2">
        {{ $icon }}
    </div>
    {{ $label }}
</a>