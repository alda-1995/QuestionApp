@extends('layouts.dash-side')
@section('content')
    <form method="POST" action="{{ route('test.store') }}" novalidate>
        @csrf
        <x-displays.header-card />
        <div class="py-8 md:pb-12 px-4 md:px-8">
            <div class="flex flex-col md:flex-row md:gap-4">
                <div class="md:w-1/2">
                    <x-controls.input type="text" id="nombre" name="nombre" placeholder="Escribe el nombre de tu test"
                        value="{{ old('nombre') }}" required autofocus />
                    <x-controls.textarea id="descripcion" name="descripcion" placeholder="Escribe una breve descripción del test"
                        value="{{ old('descripcion') }}" required autofocus />
                    <x-controls.textarea id="mensaje_exitoso" name="mensaje_exitoso"
                        placeholder="Escribe una mensaje para cuando el test sea exitoso"
                        value="{{ old('mensaje_exitoso') }}" required autofocus />
                    <x-controls.textarea id="mensaje_fallido" name="mensaje_fallido"
                        placeholder="Escribe una mensaje para cuando el test falle"
                        value="{{ old('mensaje_fallido') }}" required autofocus />
                    {{-- <div class="mt-6">
                    <h3 class="text-neutral font-base100 mb-4">Preguntas</h3>
                    <x-displays.list-errors name="preguntas.*" />
                    <x-displays.empty-question />
                    <x-buttons.btn-secondary label="Agregar Pregunta" id="openModalQuestion" class="primary mt-4">
                        <x-slot name="icon">
                            <svg height="20px" width="20px" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <title>plus</title>
                                <path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z" />
                            </svg>
                        </x-slot>
                    </x-buttons.btn-secondary>
                </div> --}}
                </div>
                {{-- <div class="md:w-1/2">
                <div class="rounded-2xl bg-white p-6">
                    <p class="text-gray-500 small mb-2">Configuración</p>
                </div>
            </div> --}}
            </div>
        </div>
    </form>
    <x-modals.modal-question />
@endsection
