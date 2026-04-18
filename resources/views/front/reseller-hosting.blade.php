@extends('layouts.app')

@section('title', 'Reseller Hosting - HOSTZERA')
@section('meta_description', 'Start your own hosting business with white-label reseller plans.')

@section('content')
<div class="hosting-page">

    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">{{ $category->name ?? 'White-Label Reseller' }}</span>
            <h1>{{ $category->name ?? 'Reseller Hosting' }}</h1>
            <p>{{ $category->hero_description ?? ($category->description ?? 'Start your own hosting business with white-label reseller plans.') }}</p>
            <div style="margin-top: 2.5rem; display: flex; gap: 1rem; justify-content: center;">
                <a href="#plans" class="cta-primary">View Plans</a>
                <a href="#features" class="cta-secondary">Compare Features</a>
            </div>
        </div>
        <div class="hosting-stats">
            <div class="stat-item"><span class="stat-value">99.99%</span><span class="stat-label">Uptime SLA</span></div>
            <div class="stat-item"><span class="stat-value">< 1ms</span><span class="stat-label">Network Latency</span></div>
            <div class="stat-item"><span class="stat-value">24/7</span><span class="stat-label">Expert Support</span></div>
            <div class="stat-item"><span class="stat-value">10+</span><span class="stat-label">Global Locations</span></div>
        </div>
    </section>

    <section id="plans" class="pricing-section">
        <div class="pricing-header">
            <h2>{{ $category->name ?? 'Reseller Hosting' }} Plans</h2>
            <p>Start selling hosting with cPanel/WHM. All plans include white-label branding.</p>
        </div>
        <div class="pricing-grid">
            @forelse($services as $service)
                <div class="pricing-card {{ $service->badge_text ? 'featured' : '' }}">
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
                                        'Storage' => 'hard-drive',
                                        'NVMe' => 'hard-drive',
                                        'Bandwidth' => 'zap',
                                        'WHM' => 'users',
                                        'Accounts' => 'users',
                                        'SSL' => 'lock',
                                        'White-Label' => 'briefcase'
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
                    <a href="{{ route('register') }}" class="plan-btn {{ $loop->iteration == 2 ? 'plan-btn-primary' : '' }}">Get Started</a>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; background: white; border-radius: 16px;">
                    <p style="color: #6b7280;">No Reseller plans available in the database.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section id="features" class="hosting-features-section">
        <div class="features-header">
            <h2>Why Choose Our Reseller Hosting?</h2>
            <p>White-label hosting infrastructure at affordable prices</p>
        </div>
        <div class="features-grid">
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="settings" style="width:24px;height:24px;"></i></div><h4>cPanel & WHM</h4><p>Industry-standard control panels for full management of your hosting accounts.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="hard-drive" style="width:24px;height:24px;"></i></div><h4>SSD Storage</h4><p>Fast SSD storage for your reseller accounts with excellent read/write performance.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="shield" style="width:24px;height:24px;"></i></div><h4>Enterprise Security</h4><p>Advanced DDoS protection, firewalls, and security monitoring included.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="globe" style="width:24px;height:24px;"></i></div><h4>Global Network</h4><p>Multiple datacenter locations worldwide for optimal latency and redundancy.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="zap" style="width:24px;height:24px;"></i></div><h4>Instant Deployment</h4><p>Your VPS is ready in seconds with your choice of operating system.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="headphones" style="width:24px;height:24px;"></i></div><h4>24/7 Expert Support</h4><p>Our technical experts are available around the clock to assist you.</p></div>
        </div>
    </section>

    <section class="hosting-cta">
        <h2>Ready to Get Started?</h2>
        <p>Start your hosting business today. No setup fees, no contracts.</p>
        <div class="cta-buttons">
            <a href="{{ route('register') }}" class="cta-primary">Start Now</a>
            <a href="#" class="cta-secondary">Contact Sales</a>
        </div>
    </section>

</div>
@endsection
