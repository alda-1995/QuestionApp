@extends('layouts.dash-side')
@section('content')
    <div class="py-28 xl:py-16">
        <div class="container">
            <h1 class="font-secondary text-neutral mb-6">Bienvenido {{$userName}}</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 mb-8">
                <x-dashboard.card-users userNum="{{$numRegisterUserPlayer}}" />
            </div>
            <h2 class="font-base100 mb-4">Mis test</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 xl:gap-x-6">
                @foreach ($testList as $test)
                    <x-dashboard.card-encuesta url="{{ route('test.edit', $test->test_id) }}" title="{{$test->name}}" status="{{$test->status}}" startDate="{{$test->created_at->format('Y-m-d')}}"
                        endDate="01 Enero 2024" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
