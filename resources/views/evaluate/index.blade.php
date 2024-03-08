@extends('layouts.app')
<x-general.nav-user />
@section('content')
    <x-tests.bloque-list>
        <div class="flex flex-col items-center text-center">
            <h2 class="text-neutral font-base50 font-medium mb-4">Resultados del test</h2>
            <div class="rounded-md bg-secondary px-4">
                <h3 class="font-secondary text-white">{{ $testResultInfoPlayer->test_info->name }}</h3>
            </div>
            @if ($testResultInfoPlayer->status == 'completado')
                <div class="mt-10">
                    @if ($testResultInfoPlayer->is_approved)
                        <p class="text-success font-base50 mb-2">Aprobaste el test</p>
                        <div class="w-full bg-white py-4 px-8 rounded-md">
                            <p class="text-neutral font-medium parrafo">
                                {{ $testResultInfoPlayer->test_info->message_success }}</p>
                        </div>
                    @else
                        <p class="text-error font-base50 mb-2">Fallaste el test</p>
                        <div class="w-full bg-white py-4 px-8 rounded-md">
                            <p class="text-neutral font-medium font-base100">
                                {{ $testResultInfoPlayer->test_info->message_fail }}</p>
                        </div>
                    @endif
                </div>
                <div class="flex flex-col sm:flex-row gap-6 mt-6">
                    <p class="text-neutral font-base200">Número de aciertos:
                        {{ $testResultInfoPlayer->num_answers_correct }}</p>
                    <p class="text-neutral font-base200">Número de fallos:
                        {{ $testResultInfoPlayer->num_answers_incorrect }}</p>
                </div>
            @else
                <p class="text-error font-secondary mt-8">Lo sentimos, aun no tenemos la evaluación</p>
            @endif
        </div>
    </x-tests.bloque-list>
@endsection
