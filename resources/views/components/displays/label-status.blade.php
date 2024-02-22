@props(['status' => ''])
@switch($status)
    @case('finalizar')
        <span class="inline-block py-2 px-4 rounded-2xl small bg-completed">Finalizada</span>
    @break
    @case('proceso')
        <span class="inline-block py-2 px-4 rounded-2xl small bg-accent">En proceso</span>
    @break
    @default
    @break;
@endswitch
