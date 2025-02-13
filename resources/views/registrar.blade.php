@extends('layouts.app')

@section('title', 'Select Window - Registrar')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/window-style.css') }}">
@endsection

@section('content')
    <!-- Registrar Header -->
    <div class="header">REGISTRAR</div>

    <!-- Section Title -->
    <h2 class="title">Which window served you?</h2>

    <!-- Window Selection -->
    <div class="windowContainer">
    @for ($i = 1; $i <= 9; $i++)
        <a href="{{ url('/department/registrar/window/' . $i) }}" class="window">
            <div class="windowText">WINDOW</div> <!-- "WINDOW" Label Above Image -->
            <div class="windowImage">
                <img src="{{ asset('images/self-service.png') }}" alt="Window {{ $i }}">
                <span class="windowNumber">{{ $i }}</span> <!-- Number Inside Image -->
            </div>
        </a>
    @endfor
</div>
@endsection
