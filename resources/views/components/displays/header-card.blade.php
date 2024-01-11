@props(['title' => '', 'id' => ''])
<div class="w-full bg-white border-b border-b-gray-200">
    <div class="px-4 md:px-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between py-4">
            <h3 class="font-base100 font-normal text-neutral">{{$title}}</h3>
            <x-buttons.btn-main label="Guardar" class="btn-form" />
        </div>
    </div>
</div>