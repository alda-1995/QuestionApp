@extends('layouts.app')

@section('content')
<div class="w-full">
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="flex flex-col px-8 lg:px-32 py-14 md:py-16 md:min-h-screen">
            <h1 class="text-neutral font-main font-medium mb-8">Hola, Bienvenido de nuevo</h1>
            <x-auth.bloque-login />
        </div>
        <div class="hidden md:flex justify-center items-center px-20 bg-base-200">
            <h2 class="font-secondary text-white">Comienza el test y descubre más de ti mismo.</h2>
        </div>
    </div>
</div>
@endsection
