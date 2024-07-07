@extends('layouts.app')

@section('title', 'Support Teleperformance')
<link rel="preconnect" href="https://cdn.fonts.net">
@section('content')
<div class="slide-tp text-white" style="background-image: url('{{ asset('img/banner-site.png') }}');">
    <div class="text-center" style="z-index: 2">
        <h1>Bem-vindo ao Suporte TP Brasil</h1>
        <p class="pt-5 fw-bold"><a class="text-white p-2 px-5 rounded rounded-5 border border-1 fs-5 button-tp" href="{{ route('chat.index') }}">Fale com a gente!</a></p>
    </div>
    <div style="z-index: 1" class="filtro position-absolute top-0 start-0 w-100 h-100"></div>
</div>
<div class="container py-4">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center align-items-center" style="min-height: 300px;">
            <div class="text-center">
                <h2>Suporte técnico TP</h2>
                <p class="fs-1 fw-bold">Confia!</p>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <img width="400" src="{{ asset('img/CONFIA.png') }}" alt="">
        </div>
    </div>
</div>
<footer class="bg-dark text-white pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5 class="text-uppercase mb-4">Useful Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">About TP</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Insights</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Locations</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Investors Homepage</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Alumni Network</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="text-uppercase mb-4">Services</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Digital CX</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Artificial Intelligence</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Trust and Safety</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Back-Office Processing</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Interpretation and Translation</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Work-at-Home</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="text-uppercase mb-4">Industries</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Healthcare</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Banking and Financial Services</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Travel, Hospitality and Cargo</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Video Games</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Retail and E-Commerce</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Automotive</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 class="text-uppercase mb-4">Careers</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Choose TP</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Job Opportunities</a></li>
                    <li class="mb-2"><a href="#" class="text-white text-decoration-none">Work From Home Opportunity</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-4">
            <p class="mb-0">&copy; 2024 Teleperformance. All Rights Reserved.</p>
        </div>
    </div>
</footer>

@endsection


