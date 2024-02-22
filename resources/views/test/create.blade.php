@extends('layouts.dash-side')
@section('content')
    <x-displays.header-card title="Crear Test" />
    <form method="POST" id="formParent" action="{{ route('test') }}" novalidate>
        @csrf
        <div class="py-8 md:pb-12 px-4 md:px-8">
            <x-displays.header-back label="REGRESAR" url="{{route('test')}}" />
            <div class="flex flex-col md:flex-row md:gap-4">
                <div class="md:w-1/2">
                    <x-controls.input type="text" id="nombre" name="nombre" placeholder="Escribe el nombre de tu test"
                        value="{{ old('nombre') }}" required autofocus />
                    <x-controls.textarea id="descripcion" name="descripcion"
                        placeholder="Escribe una breve descripción del test" value="{{ old('descripcion') }}" required
                        autofocus />
                    <x-controls.textarea id="mensaje_exitoso" name="mensaje_exitoso"
                        placeholder="Escribe una mensaje para cuando el test sea exitoso"
                        value="{{ old('mensaje_exitoso') }}" required autofocus />
                    <x-controls.textarea id="mensaje_fallo" name="mensaje_fallo"
                        placeholder="Escribe una mensaje para cuando el test falle" value="{{ old('mensaje_fallo') }}"
                        required autofocus />
                </div>
                <div class="md:w-1/2 md:pl-12">
                    <x-displays.empty-card class="opacity-70">
                        - Aqui podrás agregar las preguntas del test
                    </x-displays.empty-card>
                </div>
            </div>
        </div>
    </form>
@endsection
