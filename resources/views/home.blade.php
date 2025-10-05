{{-- resources/views/home.blade.php --}}

@extends('layout') {{-- O como se llame tu layout principal --}}

@section('content')

    {{-- 1. Sección del Hero con video de fondo --}}
    @include('pages.home._hero')

    {{-- 2. Sección de Introducción "Alimentos que Activan" --}}
    @include('pages.home._intro')

    {{-- 3. Sección de Features (Viandas y Pastelería) --}}
    @include('pages.home._features')

    {{-- 4. SECCIÓN INTERACTIVA DE PASOS --}}
    @include('pages.home._steps-interactive')


    {{-- 4 b. NUEVA SECCIÓN DE PASOS --}}
    @include('pages.home._steps')

    {{-- 5. Sección "Quiénes Somos" --}}
    @include('pages.home._nosotros')

    {{-- 6. Sección de Llamado a la Acción (WhatsApp) --}}
    @include('pages.home._contacto_cta')

@endsection