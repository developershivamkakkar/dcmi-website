@extends('layouts.app')

@section('content')
    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6284058009" class="whatsapp-button" target="_blank">
        <i class="fab fa-whatsapp"></i>
        Contact Us
    </a>

    {{-- Page Hero Banner --}}
    <div class="page-hero">
        <div class="page-hero-blob page-hero-blob-1"></div>
        <div class="page-hero-blob page-hero-blob-2"></div>
        <div class="page-hero-content">
            <h1 class="page-hero-title" data-aos="fade-up">{{ $title }}</h1>
            <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="120">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home.get') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                    @foreach ($breadcrumbs as $crumb)
                        @if ($crumb['href'])
                            <li class="breadcrumb-item"><a href="{{ $crumb['href'] }}">{{ $crumb['label'] }}</a></li>
                        @else
                            <li class="breadcrumb-item active" aria-current="page">{{ $crumb['label'] }}</li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
        <div class="page-hero-wave">
            <svg viewBox="0 0 1440 56" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"><path d="M0,28 C360,56 1080,0 1440,28 L1440,56 L0,56 Z" fill="#f4f6f9"/></svg>
        </div>
    </div>

    {{-- Page Content --}}
    <div class="page-editor-wrap">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="page-content-card" data-aos="fade-up">
                        <div class="page-content-accent-bar"></div>
                        <div class="page-content-body">
                            {!! $content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages/show.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/pages/show.js') }}"></script>
@endsection
