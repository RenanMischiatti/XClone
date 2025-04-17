<!-- resources/views/home.blade.php -->
@extends('layouts.base')

@section('title', 'Página Inicial')

@section('content')
<main class="container">
    <div class="row h-100">
        <div class="col-3 border-right-default">
            @include('layouts.home.menu')
        </div>
        <div class="col-6 p-0">
            @include('layouts.home.feed')
        </div>
        <div class="col-3 border-left-default">
            @include('layouts.home.news')
        </div>    
    </div>
</main>
@endsection

@push('styles')
{{-- <link href="caminho-para-estilos-personalizados.css" rel="stylesheet"> --}}
@endpush

@push('scripts')
{{-- <script src="caminho-para-scripts-personalizados.js"></script> --}}
@endpush
