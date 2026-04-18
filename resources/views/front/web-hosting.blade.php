@extends('layouts.app')

@section('title', 'Web Hosting - HOSTZERA')
@section('meta_description', 'Fast & Secure Web Hosting with SSD storage, LiteSpeed servers, and 24/7 expert support.')

@section('content')
<div class="hosting-page">

    {{-- Hero Section --}}
    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">{{ $category->name ?? 'Shared Web Hosting' }}</span>
            <h1>Fast & Secure {{ $category->name ?? 'Web Hosting' }}</h1>
            <p>{{ $category->hero_description ?? ($category->description ?? 'Launch your website on reliable, high-performance hosting with SSD storage, LiteSpeed servers, and 24/7 expert support.') }}</p>
            <div style="margin-top: 2.5rem; display: flex; gap: 1rem; justify-content: center;">
                <a href="#plans" class="cta-primary">View Plans</a>
                <a href="#" class="cta-secondary">Contact Sales</a>
            </div>
        </div>

        <div class="hosting-stats">
            <div class="stat-item">
                <span class="stat-value">99.9%</span>
                <span class="stat-label">Uptime SLA</span>
            </div>
            <div class="stat-item">
                <span class="stat-value">1-Click</span>
                <span class="stat-label">App Install</span>
            </div>
            <div class="stat-item">
                <span class="stat-value">SSD</span>
                <span class="stat-label">Storage</span>
            </div>
            <div class="stat-item">
                <span class="stat-value">24/7</span>
                <span class="stat-label">Support</span>
            </div>
        </div>
    </section>

    {{-- Pricing Section --}}
    <section class="pricing-section" id="plans">
        <div class="pricing-header">
            <h2>{{ $category->name ?? 'Web Hosting' }} Plans</h2>
            <p>Choose a plan that fits your website and grow anytime.</p>
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
                                    'Support' => 'headphones',
                                    'Emails' => 'mail'
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
                                        <i data-lucide="{{ $icon }}" style="width: 14px; height: 14px; color: #8b5cf6;"></i>
                                        {{ $spec }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                    <div class="plan-price">
                        <span class="currency">$</span>
                        <span class="amount">{{ $service->price }}</span>
                        <span class="period">/{{ $service->billing_cycle }}</span>
                    </div>
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
                    <p style="color: #6b7280;">No hosting plans available at the moment. Please check back later.</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- Features Section --}}
    <section class="hosting-features-section">
        <div class="features-header">
            <h2>Hosting Features</h2>
            <p>Everything you need to build, launch, and grow.</p>
        </div>

        <div class="features-grid">
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="zap" style="width:24px;height:24px;"></i></div>
                <h4>LiteSpeed Servers</h4>
                <p>High-performance LiteSpeed web servers for faster load times and better SEO.</p>
            </div>
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="server" style="width:24px;height:24px;"></i></div>
                <h4>Built-in Caching</h4>
                <p>Server-side caching and optimization tools included for blazing performance.</p>
            </div>
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="shield" style="width:24px;height:24px;"></i></div>
                <h4>DDoS Protection</h4>
                <p>Always-on DDoS protection and a secure firewall keep your site online.</p>
            </div>
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="hard-drive" style="width:24px;height:24px;"></i></div>
                <h4>SSD Storage</h4>
                <p>Fast SSD storage ensures quick file access and smooth page delivery.</p>
            </div>
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="lock" style="width:24px;height:24px;"></i></div>
                <h4>Free SSL</h4>
                <p>Automatic SSL certificates to keep your visitors safe and trusted.</p>
            </div>
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="headphones" style="width:24px;height:24px;"></i></div>
                <h4>24/7 Support</h4>
                <p>Our experts are ready around the clock to help you launch and scale.</p>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="hosting-cta">
        <h2>Ready to Launch Your Website?</h2>
        <p>Get reliable, fast web hosting with free SSL, daily backups, and 24/7 support.</p>
        <div class="cta-buttons">
            <a href="{{ route('register') }}" class="cta-primary">Start Now</a>
            <a href="#" class="cta-secondary">Talk to Sales</a>
        </div>
    </section>

</div>
@endsection
