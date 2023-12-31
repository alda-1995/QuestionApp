@extends('layouts.dash-side')
@section('content')
    <div class="py-16">
        <div class="container">
            <h1 class="font-secondary text-neutral mb-6">Bienvenido Aldair Reyes Sanchez</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 mb-8">
                <x-dashboard.card-users />
            </div>
            <h2 class="font-base100 mb-4">Mis test</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 xl:gap-x-6">
                <x-dashboard.card-encuesta title="Test de inteligencia" status="completado" startDate="29 Diciembre 2023"
                    endDate="01 Enero 2024" />
                <x-dashboard.card-encuesta title="Test de inteligencia" status="proceso" startDate="29 Diciembre 2023"
                    endDate="01 Enero 2024" />
                <x-dashboard.card-encuesta title="Test de inteligencia" status="proceso" startDate="29 Diciembre 2023"
                    endDate="01 Enero 2024" />
                <x-dashboard.card-encuesta title="Test de inteligencia" status="completado" startDate="29 Diciembre 2023"
                    endDate="01 Enero 2024" />
                <x-dashboard.card-encuesta title="Test de inteligencia" status="completado" startDate="29 Diciembre 2023"
                    endDate="01 Enero 2024" />
                <x-dashboard.card-encuesta title="Test de inteligencia" status="completado" startDate="29 Diciembre 2023"
                    endDate="01 Enero 2024" />
            </div>
        </div>
    </div>
@endsection
