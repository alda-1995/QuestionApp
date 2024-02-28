@props(['urlNew' => '', 'label' => ''])
<div class="w-full bg-white border-b border-b-gray-200 mt-[80px] xl:mt-0">
    <div class="px-4 md:px-8">
        <div class="flex justify-end py-4">
            <x-buttons.link-secondary label="Agregar" url="{{$urlNew}}" class="fill-white-svg">
                <x-slot name="icon">
                    <x-icons.add />
                </x-slot>
            </x-buttons.link-secondary>
        </div>
    </div>
</div>