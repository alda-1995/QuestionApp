@props(['id' => '', 'name' => '', 'description' => '', 'status' => false, 'idResult' => '' ])
<div class="flex flex-col border border-neutral px-4 py-6 rounded-lg">
    <h3 class="text-neutral font-secondary mb-2">{{ $name }}</h3>
    <p class="text-neutral parrafo">{{ $description }}</p>
    <div class="mt-4">
        @role('admin')
            <x-buttons.btn-secondary url="home" label="Ver respuestas" />
        @else
            @switch($status)
                @case('comenzar')
                    <form method="POST" action="{{ route('player.test.create', ['id' => $id]) }}">
                        @csrf
                        <x-buttons.btn-secondary type="submit" url="home" label="Comenzar" />
                    </form>
                @break
                @case('proceso')
                    <x-buttons.link-secondary url="{{ route('player.test.show', $idResult) }}" label="Continuar" />
                @break
                @case('completado')
                    <x-buttons.link-secondary url="{{ route('evaluate.test.show', $idResult) }}" label="Revisar" />
                @break
                @default
                    <p class="parrafo text-secondary">No disponible</p>
                @break
            @endswitch
        @endrole
    </div>
</div>
