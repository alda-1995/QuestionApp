@props(['url' => '', 'label' => '', 'id' => ''])
<a class="link-submenu group/link" href="{{ route($url) }}" id="{{$id}}">
    <div class="flex mr-1">
        {{ $icon }}
    </div>
    {{ $label }}
    {{ $slot }}
</a>