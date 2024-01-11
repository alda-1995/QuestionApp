@props(['name' => '', 'status' => '', 'id' => ''])
<div class="flex bg-white">
    <div class="w-1 bg-secondary flex-shrink-0"></div>
    <div class="flex-grow flex p-4">
        <div class="flex-grow grid grid-cols-2 gap-2 items-center">
            <h3 class="text-neutral parrafo">{{ $name }}</h3>
            <div class="flex justify-center">
                <x-displays.label-status status="{{ $status }}" />
            </div>
        </div>
        <div class="flex-shrink-0 flex gap-2 md:gap-4 ml-4">
            <x-buttons.link-action label="Editar" url="{{ route('test.edit', $id) }}" class="edit">
                <x-slot name="icon">
                    <x-icons.edit />
                </x-slot>
            </x-buttons.link-action>
            <form method="POST" class="inline-flex formsDelete" action="{{ route('test.destroy', $id) }}">
                @csrf
                @method('DELETE')
                <x-buttons.btn-action type="submit" label="Eliminar" class="delete">
                    <x-slot name="icon">
                        <x-icons.delete />
                    </x-slot>
                </x-buttons.btn-action>
            </form>
        </div>
    </div>
</div>
