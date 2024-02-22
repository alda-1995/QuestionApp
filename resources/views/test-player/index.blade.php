@extends('layouts.app')
<x-general.nav-user />
@section('content')
    <x-tests.bloque-list>
        <div class="flex flex-col items-center text-center">
            <h1 class="text-neutral font-main mb-4">Test de harry potter</h1>
            <p class="text-neutral font-base100 mb-12">¿Cuál es el nombre completo del mejor amigo de Harry Potter?</p>
            <form method="POST" action="{{ route('questions.save') }}" id="formQuestion" novalidate>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                    <x-controls.radio-control name="answer_question" id="resp_correct_1" value="Ron Granger"
                        label="(A) Ron Granger" />
                    <x-controls.radio-control name="answer_question" id="resp_correct_2" value="Hufflepuff"
                        label="(B) Hufflepuff" />
                    <x-controls.radio-control name="answer_question" id="resp_correct_3" value="Gryffindor"
                        label="(C) Gryffindor" />
                </div>
                <div class="mt-8">
                    <x-buttons.btn-main label="Siguiente" type="Submit" />
                </div>
            </form>
        </div>
    </x-tests.bloque-list>
@endsection
