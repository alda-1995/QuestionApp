@extends('layouts.app')
<x-general.nav-user />
@section('content')
    <x-tests.bloque-list>
        <div class="flex flex-col items-center text-center">
            <h2 class="text-neutral font-main mb-4">Resultados del test</h2>
            <div class="rounded-md bg-secondary px-4">
                <h3 class="font-secondary text-white">{{ $testResultInfoPlayer->test_info->name }}</h3>
            </div>
            @if ($testResultInfoPlayer->status == 'completado')
                <div class="mt-12">
                    @if ($testResultInfoPlayer->is_approved)
                        <p class="text-success font-bold font-base100 mb-2">Aprobaste el test</p>
                        <p class="text-neutral font-base100">{{ $testResultInfoPlayer->test_info->message_success }}</p>
                    @else
                        <p class="text-error font-bold font-base100 mb-2">Fallaste el test</p>
                        <p class="text-neutral font-base200">{{ $testResultInfoPlayer->test_info->message_fail }}</p>
                    @endif
                </div>
            @else
                <p class="text-error font-secondary mt-8">Lo sentimos, aun no tenemos la evaluación</p>
            @endif
        </div>
    </x-tests.bloque-list>
@endsection
