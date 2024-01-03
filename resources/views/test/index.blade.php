@extends('layouts.dash-side')
@section('content')
<div class="py-16">
    <div class="container">
        <h1 class="font-secondary text-neutral mb-6">Mis test</h1>
        <div class="max-w-[260px] mb-6">
            <form action="">
                <x-controls.search />
            </form>
        </div>
        <div class="flex flex-col max-w-2xl">
            <x-cards.item-test name="Test de personalidad" status="completado" />
            <x-cards.item-test name="Test de personalidad" status="completado" />
            <x-cards.item-test name="Test de personalidad" status="completado" />
            <x-cards.item-test name="Test de personalidad" status="completado" />
        </div>
    </div>
</div>
@endsection
