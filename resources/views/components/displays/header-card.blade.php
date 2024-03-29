@props(['title' => '', 'id' => ''])
<div class="w-full bg-white border-b border-b-gray-200 mt-[80px] xl:mt-0">
    <div class="px-4 md:px-8">
        <div class="flex flex-row items-center justify-between py-4">
            <h3 class="font-base100 font-normal text-neutral max-w-[60%] md:max-w-[80%]">{{$title}}</h3>
            <x-buttons.btn-main label="Guardar" class="btn-form" />
        </div>
    </div>
</div>