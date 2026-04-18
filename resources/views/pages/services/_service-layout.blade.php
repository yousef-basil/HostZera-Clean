{{-- Service page partial: Hero + Stats + Pricing + Features + CTA --}}
@extends('layouts.main')

@section('title', ($badgeText ?? 'Service') . ' - HOSTZERA')
@section('meta_description', $heroDescription ?? 'Premium hosting solutions from HOSTZERA.')

@section('content')
<div class="hosting-page">
    {{-- Hero Section --}}
    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">{{ $badgeText }}</span>
            <h1>{{ $heroTitle }}</h1>
            <p>{{ $heroDescription }}</p>
            @if(isset($heroButtons) && $heroButtons)
            <div class="hosting-hero-btns" style="margin-top: 2.5rem; display: flex; gap: 1rem; justify-content: center;">
                @foreach($heroButtons as $btn)
                <a href="{{ $btn['url'] }}" class="{{ $btn['class'] }}">{{ $btn['text'] }}</a>
                @endforeach
            </div>
            @endif
        </div>

        <div class="hosting-stats">
            @foreach($stats as $stat)
            <div class="stat-item">
                <span class="stat-value">{{ $stat['value'] }}</span>
                <span class="stat-label">{{ $stat['label'] }}</span>
            </div>
            @endforeach
        </div>

        @yield('hero-extra')
    </section>

    {{-- Pricing Section --}}
    <section id="plans" class="pricing-section">
        <div class="pricing-header">
            <h2>{{ $pricingTitle }}</h2>
            <p>{{ $pricingDescription }}</p>
        </div>

        @yield('pricing-extra-before')

        <div class="pricing-grid">
            @foreach($plans as $plan)
            <div class="pricing-card {{ isset($extraCardClass) ? $extraCardClass : '' }} {{ isset($plan['badge']) && $plan['badge'] ? 'featured' : '' }}">
                @if(isset($plan['badge']) && $plan['badge'])
                <div class="plan-badge">{{ $plan['badge'] }}</div>
                @endif

                @if(isset($plan['cpu']))
                <div style="margin-bottom: 1.5rem;">
                    <h3 class="plan-name" style="margin-bottom: 0.25rem;">{{ $plan['name'] }}</h3>
                    <p style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">{{ $plan['cpu'] }}</p>
                </div>
                @elseif(isset($plan['specs']))
                <h3 class="plan-name">{{ $plan['name'] }}</h3>
                <p style="font-size: 0.85rem; color: var(--primary); font-weight: 700; margin-bottom: 1.5rem;">{{ $plan['specs'] }}</p>
                @elseif(isset($plan['setupFee']))
                <div style="margin-bottom: 1.5rem;">
                    <h3 class="plan-name" style="margin-bottom: 0.25rem;">{{ $plan['name'] }}</h3>
                    <p style="font-size: 0.75rem; color: var(--primary); font-weight: 700;">{{ $plan['setupFee'] }}</p>
                </div>
                @else
                <h3 class="plan-name">{{ $plan['name'] }}</h3>
                @endif

                <div class="plan-price">
                    <span class="currency">$</span>
                    <span class="amount">{{ $plan['price'] }}</span>
                    <span class="period">{{ $plan['period'] ?? '/mo' }}</span>
                </div>

                <ul class="plan-features">
                    @foreach($plan['features'] as $feature)
                    <li>
                        <i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>

                <a href="{{ route('signup') }}" class="plan-btn {{ isset($plan['badge']) && $plan['badge'] ? 'plan-btn-primary' : '' }}">
                    {{ $plan['btnText'] ?? 'Get Started' }}
                </a>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Features Section --}}
    <section id="features" class="hosting-features-section">
        <div class="features-header">
            <h2>{{ $featuresTitle }}</h2>
            <p>{{ $featuresDescription }}</p>
        </div>

        <div class="features-grid">
            @foreach($features as $feature)
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="{{ $feature['icon'] }}" style="width:24px;height:24px;"></i></div>
                <h4>{{ $feature['title'] }}</h4>
                <p>{{ $feature['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="hosting-cta">
        <h2>{{ $ctaTitle }}</h2>
        <p>{{ $ctaDescription }}</p>
        <div class="cta-buttons">
            <a href="{{ route('signup') }}" class="cta-primary">{{ $ctaPrimaryText ?? 'Start Now' }}</a>
            <a href="#" class="cta-secondary">{{ $ctaSecondaryText ?? 'Contact Sales' }}</a>
        </div>
    </section>
</div>
@endsection
