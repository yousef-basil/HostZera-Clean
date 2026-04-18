@extends('layouts.app')

@section('title', 'WordPress Hosting - HOSTZERA')
@section('meta_description', 'Optimized WordPress Hosting with one-click install, automatic updates, and LiteSpeed caching.')

@section('content')
<div class="hosting-page">

    {{-- Hero Section --}}
    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">{{ $category->name ?? 'Optimized WordPress Hosting' }}</span>
            <h1>Fast & Secure {{ $category->name ?? 'WordPress Hosting' }}</h1>
            <p>{{ $category->hero_description ?? ($category->description ?? 'One-click install, automatic updates, and LiteSpeed caching for lightning-fast WordPress sites.') }}</p>
            <div style="margin-top: 2.5rem; display: flex; gap: 1rem; justify-content: center;">
                <a href="{{ route('register') }}" class="cta-primary">Get Started</a>
                <a href="#plans" class="cta-secondary">Compare Plans</a>
            </div>
        </div>

        <div class="hosting-stats">
            <div class="stat-item"><span class="stat-value">20x</span><span class="stat-label">Faster Loads</span></div>
            <div class="stat-item"><span class="stat-value">99.9%</span><span class="stat-label">Uptime SLA</span></div>
            <div class="stat-item"><span class="stat-value">1-Click</span><span class="stat-label">WP Install</span></div>
            <div class="stat-item"><span class="stat-value">24/7</span><span class="stat-label">Expert Support</span></div>
        </div>

        <div style="margin-top: 4rem; padding: 0 1rem;">
            <p style="color: rgba(255,255,255,0.5); font-size: 0.8rem; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1.5rem;">Compatible with</p>
            <div style="display: flex; gap: 2rem; justify-content: center; flex-wrap: wrap;">
                <span style="color: white; font-weight: 700; font-size: 1.1rem; opacity: 0.7;">LiteSpeed</span>
                <span style="color: white; font-weight: 700; font-size: 1.1rem; opacity: 0.7;">Jetpack</span>
                <span style="color: white; font-weight: 700; font-size: 1.1rem; opacity: 0.7;">WooCommerce</span>
                <span style="color: white; font-weight: 700; font-size: 1.1rem; opacity: 0.7;">Elementor</span>
                <span style="color: white; font-weight: 700; font-size: 1.1rem; opacity: 0.7;">Yoast SEO</span>
            </div>
        </div>
    </section>

    {{-- Pricing Section --}}
    <section id="plans" class="pricing-section">
        <div class="pricing-header">
            <h2>WordPress Hosting Plans</h2>
            <p>Choose the perfect plan for your WordPress site.</p>
        </div>

        <div class="pricing-grid">
            @forelse($services as $service)
                <div class="pricing-card {{ $service->badge_text ? 'featured' : '' }}">
                    @if($service->badge_text)
                        <div class="plan-badge">{{ $service->badge_text }}</div>
                    @endif
                    <h3 class="plan-name">{{ $service->name }}</h3>
                    @if($service->description)
                        <ul class="plan-specs" style="margin-top: 1rem; list-style: none; padding: 0; margin-bottom: 1.5rem;">
                            @php
                                $specs = explode("\n", str_replace("\r", "", $service->description));
                                $icons = [
                                    'Website' => 'globe',
                                    'SSD' => 'hard-drive',
                                    'NVMe' => 'hard-drive',
                                    'Bandwidth' => 'zap',
                                    'Visits' => 'trending-up',
                                    'SSL' => 'lock',
                                    'Updates' => 'refresh-cw',
                                    'Backups' => 'database',
                                    'Staging' => 'layers',
                                    'CDN' => 'share-2'
                                ];
                            @endphp
                            @foreach($specs as $spec)
                                @if(trim($spec))
                                    @php
                                        $icon = 'check-circle'; // default
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
                    <p style="color: #6b7280;">No WordPress plans found in the database.</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- Features Section --}}
    <section class="hosting-features-section">
        <div class="features-header">
            <h2>WordPress Features</h2>
            <p>Everything you need for a fast WordPress site.</p>
        </div>
        <div class="features-grid">
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="zap" style="width:24px;height:24px;"></i></div>
                <h4>LiteSpeed Optimized</h4>
                <p>WordPress hosting powered by LiteSpeed for up to 20x faster page loads.</p>
            </div>
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="shield" style="width:24px;height:24px;"></i></div>
                <h4>WordPress Security</h4>
                <p>Automatic malware scanning, firewall protection, and security hardening.</p>
            </div>
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="refresh-cw" style="width:24px;height:24px;"></i></div>
                <h4>Auto Updates</h4>
                <p>Automatic WordPress core, theme, and plugin updates to keep your site secure.</p>
            </div>
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="database" style="width:24px;height:24px;"></i></div>
                <h4>Daily Backups</h4>
                <p>Automatic daily backups with one-click restore functionality.</p>
            </div>
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="terminal" style="width:24px;height:24px;"></i></div>
                <h4>Built-in Caching</h4>
                <p>LiteSpeed Cache plugin pre-installed for optimal performance out of the box.</p>
            </div>
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="headphones" style="width:24px;height:24px;"></i></div>
                <h4>WordPress Experts</h4>
                <p>24/7 support from our team of WordPress specialists.</p>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="hosting-cta">
        <h2>Ready for WordPress?</h2>
        <p>Start building your site with optimized hosting.</p>
        <div class="cta-buttons">
            <a href="{{ route('register') }}" class="cta-primary">Start Now</a>
            <a href="#" class="cta-secondary">Contact Sales</a>
        </div>
    </section>

</div>
@endsection
