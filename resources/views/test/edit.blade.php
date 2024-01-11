@extends('layouts.dash-side')
@section('content')
    <x-modals.modal-center-w id="modalConfirmTest">
        <h2 class="font-secondary text-neutral">¿Estas seguro de eliminar?</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8 mt-8">
            <x-buttons.btn-main label="Confirmar" id="btnDeleteTest" />
            <x-buttons.btn-secondary id="closeConfirmTest" label="Cancelar" />
        </div>
    </x-modals.modal-center-w>
    <x-displays.header-card title="{{ $testEdit->name }}" />
    <div class="py-8 md:pb-12 px-4 md:px-8">
        <x-displays.header-back label="REGRESAR" url="{{route('test')}}" />
        <div class="flex flex-col md:flex-row md:gap-4">
            <div class="md:w-1/2">
                <form method="POST" id="formParent" action="{{ route('test') }}" novalidate>
                    @csrf
                    @method('PUT')
                    <x-controls.input type="text" id="nombre" name="nombre"
                        placeholder="Escribe el nombre de tu test" value="{{ $testEdit->name }}" required autofocus />
                    <x-controls.textarea id="descripcion" name="descripcion"
                        placeholder="Escribe una breve descripción del test" value="{{ $testEdit->description }}" required
                        autofocus />
                    <x-controls.textarea id="mensaje_exitoso" name="mensaje_exitoso"
                        placeholder="Escribe una mensaje para cuando el test sea exitoso"
                        value="{{ $testEdit->message_success }}" required autofocus />
                    <x-controls.textarea id="mensaje_fallo" name="mensaje_fallo"
                        placeholder="Escribe una mensaje para cuando el test falle" value="{{ $testEdit->message_fail }}"
                        required autofocus />
                </form>
            </div>
            <div class="md:w-1/2 md:pl-12">
                @if ($testEdit->questions->isEmpty())
                    <x-displays.empty-card>
                        - Comienza por agregar tu primer pregunta.
                    </x-displays.empty-card>
                @else
                    @foreach ($testEdit->questions as $question)
                        <x-cards.question-card id="{{ $question->question_id }}" name="{{ $question->name }}"
                            answerA="{{ $question->question_a }}" answerB="{{ $question->question_b }}"
                            answerC="{{ $question->question_c }}" answerCorrect="{{ $question->answer_correct }}" />
                    @endforeach
                @endif
                <x-buttons.btn-secondary label="Agregar Pregunta" id="openModalQuestion" class="fill-white-svg mt-4">
                    <x-slot name="icon">
                        <x-icons.add />
                    </x-slot>
                </x-buttons.btn-secondary>
            </div>
        </div>
    </div>
    @php
    $isErrorModal = Session::get('errorQuestions');
    @endphp
    <x-modals.modal-center-w id="modalQuestion" openModal="{{$isErrorModal}}">
        <form method="POST" action="{{ route('questions.save') }}" id="formQuestion" novalidate>
            @csrf
            <h3 class="text-neutral font-base200 mb-4">Agregar respuesta</h3>
            <x-controls.input type="text" name="nombre_pregunta" placeholder="Escribe una pregunta"
                value="{{ old('nombre_pregunta') }}" required autofocus />
            <h3 class="text-neutral font-base200 mb-4">Respuestas</h3>
            <div class="flex flex-col w-full">
                <div class="w-full">
                    <x-controls.input class="hidden" type="text" name="test_id" value="{{ $testEdit->test_id }}"
                        required autofocus />
                    <x-controls.input type="text" name="respuesta_a" placeholder="Escribe la respuesta A"
                        value="{{ old('respuesta_a') }}" required autofocus />
                    <x-controls.input type="text" name="respuesta_b" placeholder="Escribe la respuesta B"
                        value="{{ old('respuesta_b') }}" required autofocus />
                    <x-controls.input type="text" name="respuesta_c" placeholder="Escribe la respuesta C"
                        value="{{ old('respuesta_c') }}" required autofocus />
                </div>
                <p class="parrafo text-neutral mb-4">¿Cuál es la respuesta correcta?</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                    <x-controls.radio-control name="respuesta_correcta" id="resp_correct_1" value="a" label="(A)" />
                    <x-controls.radio-control name="respuesta_correcta" id="resp_correct_2" value="b" label="(B)" />
                    <x-controls.radio-control name="respuesta_correcta" id="resp_correct_3" value="c" label="(C)" />
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8 mt-8">
                    <x-buttons.btn-main label="Guardar" type="Submit" />
                    <x-buttons.btn-secondary id="closeModalPreguntas" label="Cancelar" />
                </div>
            </div>
        </form>
    </x-modals.modal-center-w>
@endsection
