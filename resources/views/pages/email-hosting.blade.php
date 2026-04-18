@extends('layouts.app')

@section('title', 'Email Hosting - HOSTZERA')
@section('meta_description', 'Secure, reliable professional email hosting for your domain.')

@section('content')
<div class="hosting-page">

    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">Professional Email Hosting</span>
            <h1>Professional Email Hosting</h1>
            <p>Secure, reliable email for your domain.</p>
            <div style="margin-top: 2.5rem; display: flex; gap: 1rem; justify-content: center;">
                <a href="{{ route('register') }}" class="cta-primary">Get Started</a>
                <a href="#features" class="cta-secondary">View Features</a>
            </div>
        </div>
        <div class="hosting-stats">
            <div class="stat-item"><span class="stat-value">99.9%</span><span class="stat-label">Spam Blocked</span></div>
            <div class="stat-item"><span class="stat-value">50GB+</span><span class="stat-label">Storage</span></div>
            <div class="stat-item"><span class="stat-value">256-bit</span><span class="stat-label">Encryption</span></div>
            <div class="stat-item"><span class="stat-value">24/7</span><span class="stat-label">Support</span></div>
        </div>
    </section>

    <section id="plans" class="pricing-section">
        <div class="pricing-header">
            <h2>Simple, Transparent Pricing</h2>
            <p>Choose the plan that fits your business needs.</p>
        </div>
        <div class="pricing-grid">
            @forelse($services as $service)
                <div class="pricing-card {{ $loop->iteration == 2 ? 'featured' : '' }}">
                    @if($loop->iteration == 2)<div class="plan-badge">Most Popular</div>@endif
                    <div style="margin-bottom: 1.5rem;">
                        <h3 class="plan-name" style="margin-bottom: 0.25rem;">{{ $service->name }}</h3>
                        @if($service->description)
                            <ul class="plan-specs" style="margin-top: 1rem; list-style: none; padding: 0; margin-bottom: 1.5rem;">
                                @php
                                    $specs = explode("\n", str_replace("\r", "", $service->description));
                                    $icons = [
                                        'Accounts' => 'users',
                                        'Storage' => 'hard-drive',
                                        'SSD' => 'hard-drive'
                                    ];
                                @endphp
                                @foreach($specs as $spec)
                                    @if(trim($spec))
                                        @php
                                            $icon = 'check-circle';
                                            foreach($icons as $key => $val) {
                                                if(stripos($spec, $key) !== false) {
                                                    $icon = $val;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <li style="display: flex; align-items: center; gap: 0.75rem; color: #9ca3af; font-size: 0.9rem; margin-bottom: 0.5rem;">
                                            <i data-lucide="{{ $icon }}" style="width: 14px; height: 14px; color: #10b981;"></i>
                                            {{ $spec }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="plan-price"><span class="currency">$</span><span class="amount">{{ $service->price }}</span><span class="period">/{{ $service->billing_cycle }}</span></div>
                    <ul class="plan-features">
                        @php
                            $planFeatures = $service->features 
                                ? explode("\n", str_replace("\r", "", $service->features)) 
                                : [];
                        @endphp
                        @foreach($planFeatures as $feature)
                            @if(trim($feature))
                                <li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> {{ trim($feature) }}</li>
                            @endif
                        @endforeach
                    </ul>
                    <a href="{{ route('register') }}" class="plan-btn {{ $loop->iteration == 2 ? 'plan-btn-primary' : '' }}">Get Started</a>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; background: white; border-radius: 16px;">
                    <p style="color: #6b7280;">No Email Hosting plans available.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section id="features" class="hosting-features-section">
        <div class="features-header"><h2>Everything You Need</h2><p>Professional email features for modern businesses</p></div>
        <div class="features-grid">
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="shield" style="width:24px;height:24px;"></i></div><h4>Advanced Spam Protection</h4><p>AI-powered spam filtering blocks 99.9% of unwanted emails.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="lock" style="width:24px;height:24px;"></i></div><h4>Enterprise Security</h4><p>TLS encryption, two-factor authentication, and threat protection.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="smartphone" style="width:24px;height:24px;"></i></div><h4>Mobile Ready</h4><p>Full sync support for iOS, Android, and desktop clients.</p></div>
        </div>
    </section>

    <section class="hosting-cta">
        <h2>Ready to Go Professional?</h2>
        <p>Start with your custom email today. Setup takes just minutes.</p>
        <div class="cta-buttons">
            <a href="{{ route('register') }}" class="cta-primary">Start Free Trial</a>
            <a href="#" class="cta-secondary">Contact Sales</a>
        </div>
    </section>

</div>
@endsection
