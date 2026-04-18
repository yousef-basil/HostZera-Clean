@extends('layouts.app')

@section('title', 'HOSTZERA - Premium Hosting for Professionals')
@section('meta_description', 'Everything you need to create, manage and scale your website. Fast, secure and reliable hosting solutions.')

@section('content')
<div class="home-page">

    <header class="hero">
        <div class="hero-content">
            <h1>Premium Hosting for Professionals</h1>
            <p>Everything you need to create, manage and scale your website. Fast, secure and reliable hosting solutions.</p>
            <div class="hero-cta">
                <a href="{{ route('register') }}" class="primary-btn" style="text-decoration:none;">Get Started</a>
                <a href="#services" class="secondary-btn" style="text-decoration:none;">View Pricing</a>
            </div>
        </div>
    </header>

    <section class="services-section" id="services">
        <div class="section-title">
            <h2>Our Hosting Services</h2>
            <p>Choose the perfect hosting plan for your project</p>
        </div>

        <div class="services-grid-container">
            <div class="services-grid">
                @foreach($global_categories as $cat)
                <div class="service-card">
                    <div class="service-icon">
                        @if($cat->icon_image)
                            <img src="{{ asset('storage/' . $cat->icon_image) }}" alt="{{ $cat->name }}" style="width:32px;height:32px;object-fit:contain;">
                        @else
                            <i data-lucide="{{ $cat->icon }}" style="width:32px;height:32px;"></i>
                        @endif
                    </div>
                    <h3>{{ $cat->name }}</h3>
                    <p class="service-desc">{{ $cat->description ?? 'Secure and reliable hosting solutions.' }}</p>
                    <ul class="feature-list">
                        @php
                            $features = $cat->features 
                                ? explode("\n", str_replace("\r", "", $cat->features)) 
                                : ['Best for professional use', '99.9% Uptime Guarantee', '24/7 Expert Support'];
                        @endphp
                        @foreach(array_slice($features, 0, 3) as $feature)
                            @if(trim($feature))
                                <li><i data-lucide="check" style="width:14px;height:14px;" class="check-icon"></i> {{ trim($feature) }}</li>
                            @endif
                        @endforeach
                    </ul>
                    @php
                        $minPrice = $cat->services()->where('is_active', true)->min('price');
                    @endphp
                    <div class="price-tag">From <span>${{ $minPrice ?: '0.00' }}</span> /mo</div>
                    <a href="{{ route('services.display', $cat->slug) }}" class="view-plans-btn">View Plans <i data-lucide="arrow-right" style="width:18px;height:18px;"></i></a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection
