<!-- resources/views/home.blade.php -->
@extends('app')

@section('sectionMid')
    <div class="d-flex p-3 align-items-center">
        <a href="{{ route('index') }}" class="btn-action btn-back me-4">    
            <svg xmlns="http://www.w3.org/2000/svg"  width="28" height="28" fill="white" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
            </svg>
            <div class="bg-hover"></div>
        </a>
        <strong class="post-label">
            Post
        </strong>

    </div>
    

@endsection

@push('styles')
    <link href="{{ asset('css/feed.css') }}" rel="stylesheet">
@endpush

@push('scripts')
{{-- <script src="caminho-para-scripts-personalizados.js"></script> --}}
@endpush
