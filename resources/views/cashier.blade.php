@extends('layouts.app')

@section('title', 'Select Window - Cashier & Accounting')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/window-style.css') }}">
@endsection

@section('content')
    <!-- Cashier & Accounting Header -->
    <div class="header">CASHIER / ACCOUNTING</div>

    <!-- Section Title -->
    <h2 class="title">Which window served you?</h2>

    <!-- Cashier Section -->
    <h3 class="subTitle">Cashier</h3>
    <div class="windowContainer">
        @for ($i = 1; $i <= 4; $i++)
            <a href="{{ url('/department/cashier/window/' . $i) }}" class="window">
                <div class="windowText">WINDOW</div> 
                <div class="windowImage">
                    <img src="{{ asset('images/self-service.png') }}" alt="Window {{ $i }}">
                    <span class="windowNumber">{{ $i }}</span> 
                </div>
            </a>
        @endfor
    </div>

    <!-- Accounting Section -->
    <h3 class="subTitle">Accounting</h3>
    <div class="windowContainer">
        @for ($i = 1; $i <= 3; $i++)
            <a href="{{ url('/department/accounting/window/' . $i) }}" class="window"> <!-- Accounting Section -->
                <div class="windowText">WINDOW</div> 
                <div class="windowImage">
                    <img src="{{ asset('images/self-service.png') }}" alt="Window {{ $i }}">
                    <span class="windowNumber">{{ $i }}</span> 
                </div>
            </a>
        @endfor
    </div>

@endsection
