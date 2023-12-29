@extends('layouts.app')
<x-general.nav-auth />
@section('content')
<div class="py-16 lg:min-h-screen lg:flex lg:items-center relative">
    <div class="absolute top-0 left-0 h-[0.5rem] w-0 bg-primary" id="lineProgress"></div>
    <div class="container">
        <x-auth.bloque-register />    
    </div>
</div>
@endsection
