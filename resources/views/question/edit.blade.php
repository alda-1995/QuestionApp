@extends('layouts.dash-side')
@section('content')
    <x-displays.header-card title="{{ $questionEdit->name }}" />
    <div class="py-8 md:pb-12 px-4 md:px-8">
        <x-displays.header-back label="REGRESAR" />
        <div class="flex flex-col md:flex-row md:gap-4">
            <div class="md:w-1/2">
                <form method="POST" id="formParent"
                    action="{{ route('question-update', ['id' => $questionEdit->question_id, 'test_id' => $questionEdit->test_id]) }}" novalidate>
                    @csrf
                    @method('PUT')
                    <x-controls.input type="text" name="nombre_pregunta" placeholder="Escribe una pregunta"
                        value="{{ $questionEdit->name }}" required autofocus />
                    <h3 class="text-neutral font-base200 mb-4">Respuestas</h3>
                    <div class="flex flex-col w-full">
                        <div class="w-full">
                            <x-controls.input type="text" name="respuesta_a" placeholder="Escribe la respuesta A"
                                value="{{ $questionEdit->question_a }}" required autofocus />
                            <x-controls.input type="text" name="respuesta_b" placeholder="Escribe la respuesta B"
                                value="{{ $questionEdit->question_b }}" required autofocus />
                            <x-controls.input type="text" name="respuesta_c" placeholder="Escribe la respuesta C"
                                value="{{ $questionEdit->question_c }}" required autofocus />
                        </div>
                        <p class="parrafo text-neutral mb-4">¿Cuál es la respuesta correcta?</p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                            <x-controls.radio-control default="{{$questionEdit->answer_correct}}" name="respuesta_correcta" id="resp_correct_1" value="a"
                                label="(A)" />
                            <x-controls.radio-control default="{{$questionEdit->answer_correct}}" name="respuesta_correcta" id="resp_correct_2" value="b"
                                label="(B)" />
                            <x-controls.radio-control default="{{$questionEdit->answer_correct}}" name="respuesta_correcta" id="resp_correct_3" value="c"
                                label="(C)" />
                        </div>
                        @error('respuesta_correcta')
                            <x-displays.text-error error="{{ $message }}" />
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
