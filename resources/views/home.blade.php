@extends('layouts.app')
<x-general.nav-user />
@section('content')
<x-tests.bloque-list>
    <div class="flex flex-col items-center text-center">
        <h1 class="text-neutral font-main mb-4">Tests</h1>
        <p class="text-neutral font-base100 mb-12">¿Cuál te gustaria responder?</p>
    </div>
    <div class="grid grid-cols-1 gap-4">
        @if ((empty($testList) || $testList->isEmpty()))
        <h3 class="font-secondary text-center text-secondary">No hay tests disponibles.</h3>
        @else
            @foreach ($testList as $test)
                <x-cards.test-card-player id="{{$test->test_id}}" name="{{$test->name}}"
                    description="{{$test->description}}"
                    status="{{$test->result->status}}" />
            @endforeach
        @endif
    </div>
</x-tests.bloque-list>
@endsection
