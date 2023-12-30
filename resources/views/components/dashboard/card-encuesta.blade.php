@props(['title' => '', 'startDate' => '', 'endDate' => '', "status" => ''])
<div class="flex flex-col rounded-2xl p-6 bg-white">
    <div class="flex mb-4">
        <div class="h-8 w-1 bg-secondary mr-2 flex-shrink-0"></div>
        <h3 class="font-base100">{{$title}}</h3>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
        <div class="flex flex-col">
            <p class="text-gray-400">Fecha de inicio</p>
            <p class="parrafo">{{$startDate}}</p>
        </div>
        <div class="flex flex-col">
            <p class="text-gray-400">Fecha fin</p>
            <p class="parrafo">{{$endDate}}</p>
        </div>
    </div>
    <div class="mt-4 flex justify-end">
        <x-displays.label-status status="{{$status}}" />
    </div>
</div>