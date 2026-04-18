@extends('layouts.app')

@section('title', 'Windows VPS - HOSTZERA')
@section('meta_description', 'Windows Server VPS with RDP access. High performance for desktop applications and hosting.')

@section('content')
<div class="hosting-page">

    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">{{ $category->name ?? 'Enterprise Windows VPS' }}</span>
            <h1>Fast & Secure {{ $category->name ?? 'Windows VPS' }}</h1>
            <p>{{ $category->hero_description ?? ($category->description ?? 'Windows Server VPS with RDP access. High performance for desktop applications and hosting.') }}</p>
            <div style="margin-top: 2.5rem; display: flex; gap: 1rem; justify-content: center;">
                <a href="#plans" class="cta-primary">View Plans</a>
                <a href="#" class="cta-secondary">Contact Sales</a>
            </div>
        </div>
        <div class="hosting-stats">
            <div class="stat-item"><span class="stat-value">99.99%</span><span class="stat-label">Uptime SLA</span></div>
            <div class="stat-item"><span class="stat-value">< 1ms</span><span class="stat-label">NVMe Storage</span></div>
            <div class="stat-item"><span class="stat-value">RDP</span><span class="stat-label">Full Access</span></div>
            <div class="stat-item"><span class="stat-value">24/7</span><span class="stat-label">Expert Support</span></div>
        </div>
    </section>

    <section class="pricing-section" id="plans">
        <div class="pricing-header"><h2>{{ $category->name ?? 'Windows VPS' }} Plans</h2><p>Choose the right plan for your business needs.</p></div>
        <div class="pricing-grid">
            @forelse($services as $service)
            <div class="pricing-card vps-card {{ $service->badge_text ? 'featured' : '' }}">
                @if($service->badge_text)
                    <div class="plan-badge">{{ $service->badge_text }}</div>
                @endif
                <div style="margin-bottom: 1.5rem;">
                    <h3 class="plan-name" style="margin-bottom: 0.25rem;">{{ $service->name }}</h3>
                    @if($service->description)
                        <ul class="plan-specs" style="margin-top: 1rem; list-style: none; padding: 0; margin-bottom: 1.5rem;">
                            @php
                                $specs = explode("\n", str_replace("\r", "", $service->description));
                                $icons = [
                                    'CPU' => 'cpu',
                                    'RAM' => 'database',
                                    'SSD' => 'hard-drive',
                                    'NVMe' => 'hard-drive',
                                    'Bandwidth' => 'zap',
                                    'Port' => 'activity',
                                    'IPv4' => 'hash',
                                    'IP' => 'hash'
                                ];
                            @endphp
                            @foreach($specs as $spec)
                                @if(trim($spec))
                                    @php
                                        $icon = 'info';
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
                <a href="{{ route('register') }}" class="plan-btn {{ $loop->iteration == 3 ? 'plan-btn-primary' : '' }}">Order Now</a>
            </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; background: white; border-radius: 16px;">
                    <p style="color: #6b7280;">No Windows VPS plans available.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="hosting-features-section">
        <div class="features-header"><h2>Why Choose Our Windows VPS?</h2><p>Enterprise Windows hosting at competitive prices.</p></div>
        <div class="features-grid">
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="cpu" style="width:24px;height:24px;"></i></div><h4>High-Performance CPUs</h4><p>Latest generation AMD EPYC and Intel Xeon processors for maximum performance.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="hard-drive" style="width:24px;height:24px;"></i></div><h4>NVMe SSD Storage</h4><p>Ultra-fast NVMe SSDs with up to 7GB/s read speeds for lightning-quick operations.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="shield" style="width:24px;height:24px;"></i></div><h4>Enterprise Security</h4><p>Advanced DDoS protection, firewalls, and security monitoring included.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="globe" style="width:24px;height:24px;"></i></div><h4>Global Network</h4><p>Multiple datacenter locations worldwide for optimal latency and redundancy.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="zap" style="width:24px;height:24px;"></i></div><h4>Instant Deployment</h4><p>Your VPS is ready in seconds with your choice of operating system.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="headphones" style="width:24px;height:24px;"></i></div><h4>24/7 Expert Support</h4><p>Our technical experts are available around the clock to assist you.</p></div>
        </div>
    </section>

    <section class="hosting-cta">
        <h2>Ready to Get Started?</h2>
        <p>Deploy your Windows VPS in minutes. No setup fees, no contracts.</p>
        <div class="cta-buttons">
            <a href="{{ route('register') }}" class="cta-primary">Get Started</a>
            <a href="#" class="cta-secondary">Contact Sales</a>
        </div>
    </section>

</div>
@endsection
