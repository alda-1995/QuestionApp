@extends('layouts.dash-side')
@section('content')
    <x-displays.header-new urlNew="test.create" />
    <x-modals.modal-center-w id="modalConfirmTest">
        <h2 class="font-secondary text-neutral">¿Estas seguro de eliminar?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8 mt-8">
            <x-buttons.btn-main label="Confirmar" id="btnDeleteTest" />
            <x-buttons.btn-secondary id="closeConfirmTest" label="Cancelar" />
        </div>
    </x-modals.modal-center-w>
    <div class="py-16">
        <div class="container">
            <h1 class="font-secondary text-neutral mb-6">Mis test</h1>
            <div class="max-w-[260px] mb-6">
                <form action="">
                    <x-controls.search />
                </form>
            </div>
            @if($testList->isEmpty())
            <x-displays.empty-card>
                - Comienza por agregar tu primer test.
            </x-displays.empty-card>
            @else
            <div class="flex flex-col max-w-2xl">
                @foreach ($testList as $test)
                    <x-cards.item-test id="{{$test->test_id}}" name="{{ $test->name }}" status="{{$test->status}}" />
                @endforeach
                {{-- {{ $listTest->links() }} --}}
            </div>
            @endif
        </div>
    </div>
@endsection
