@props(['label' => ''])
<div class="pb-6">
    <x-buttons.link-icon url="{{URL::previous()}}" label="{{$label}}">
        <x-slot name="icon">
            <x-icons.back />
        </x-slot>
    </x-buttons.link-icon>
</div>