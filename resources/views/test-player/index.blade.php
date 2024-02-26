@extends('layouts.app')
<x-general.nav-user />
@section('content')
    <x-tests.bloque-list>
        <div class="flex flex-col items-center text-center">
            <h1 class="text-neutral font-main mb-4">{{ $testResultPlayer->test_info->name }}</h1>
            <p class="text-neutral font-base100 mb-12">{{ $preguntaNotAnswer->name }}</p>
            <form method="POST"
                action="{{ route('answer.test.save', [
                    'idQuestion' => $preguntaNotAnswer->question_id,
                    'idTestResult' => $testResultPlayer->test_result_id,
                ]) }}"
                novalidate>
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                    <x-controls.radio-control name="answer_question" id="resp_correct_1" value="a"
                        label="(A) {{ $preguntaNotAnswer->question_a }}" />
                    <x-controls.radio-control name="answer_question" id="resp_correct_2" value="b"
                        label="(B) {{ $preguntaNotAnswer->question_b }}" />
                    <x-controls.radio-control name="answer_question" id="resp_correct_3" value="c"
                        label="(C) {{ $preguntaNotAnswer->question_c }}" />
                </div>
                @error('answer_question')
                    <x-displays.text-error sizeFont="font-base200" error="{{ $message }}" />
                @enderror
                <div class="mt-8">
                    <x-buttons.btn-main label="Siguiente" type="Submit" />
                </div>
            </form>
        </div>
    </x-tests.bloque-list>
@endsection
