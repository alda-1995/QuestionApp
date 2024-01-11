@props(['status' => ''])
@switch($status)
    @case('completado')
        <span class="inline-block py-2 px-4 rounded-2xl small bg-completed">Completado</span>
    @break

    @case('proceso')
        <span class="inline-block py-2 px-4 rounded-2xl small bg-accent">En proceso</span>
    @break

    @case('finalizada')
        <span class="inline-block py-2 px-4 rounded-2xl small bg-process text-white">Finalizada</span>
    @break

    @default
@endswitch
