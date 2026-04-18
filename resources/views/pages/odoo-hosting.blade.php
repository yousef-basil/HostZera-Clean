@extends('layouts.app')

@section('title', 'Odoo Hosting - HOSTZERA')
@section('meta_description', 'Run Odoo ERP on dedicated, optimized servers. Pre-configured for Odoo + PostgreSQL with full root access.')

@section('content')
<div class="hosting-page">

    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">{{ $category->name ?? 'Business ERP Hosting' }}</span>
            <h1>{{ $category->name ?? 'Managed Odoo Hosting for Your Business' }}</h1>
            <p>{{ $category->hero_description ?? ($category->description ?? 'Run Odoo ERP on dedicated, optimized servers. Pre-configured for Odoo + PostgreSQL with full root access and 24/7 support.') }}</p>
            <div style="margin-top: 2.5rem; display: flex; gap: 1rem; justify-content: center;">
                <a href="#plans" class="cta-primary">View Plans</a>
                <a href="#" class="cta-secondary">Contact Sales</a>
            </div>
        </div>
        <div class="hosting-stats">
            <div class="stat-item"><span class="stat-value">99.99%</span><span class="stat-label">Uptime</span></div>
            <div class="stat-item"><span class="stat-value">Odoo Ready</span><span class="stat-label">Pre-configured</span></div>
            <div class="stat-item"><span class="stat-value">Full Root</span><span class="stat-label">Access</span></div>
            <div class="stat-item"><span class="stat-value">24/7</span><span class="stat-label">Support</span></div>
        </div>
    </section>

    <section id="plans" class="pricing-section">
        <div class="pricing-header"><h2>{{ $category->name ?? 'Odoo Hosting' }} Plans</h2><p>Choose the right plan for your Odoo deployment.</p></div>
        <div class="pricing-grid">
            @forelse($services as $service)
            <div class="pricing-card {{ ($service->badge_text || $loop->iteration == 2) ? 'featured' : '' }}">
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
                                    'vCPU' => 'cpu',
                                    'CPU' => 'cpu',
                                    'RAM' => 'database',
                                    'Storage' => 'hard-drive',
                                    'SSD' => 'hard-drive',
                                    'NVMe' => 'hard-drive',
                                    'Traffic' => 'activity'
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
                <a href="{{ route('register') }}" class="plan-btn {{ $loop->iteration == 2 ? 'plan-btn-primary' : '' }}">Order Now</a>
            </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; background: white; border-radius: 16px;">
                    <p style="color: #6b7280;">No Odoo plans available.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="hosting-features-section">
        <div class="features-header"><h2>Why Odoo on Hostzera?</h2><p>Production-ready ERP hosting infrastructure</p></div>
        <div class="features-grid">
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="database" style="width:24px;height:24px;"></i></div><h4>Odoo + PostgreSQL</h4><p>Servers optimized for Odoo and PostgreSQL. Ubuntu 22.04/24.04 pre-configured.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="shield" style="width:24px;height:24px;"></i></div><h4>Secure & Reliable</h4><p>DDoS protection, KVM virtualization, and full root access for complete control.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="headphones" style="width:24px;height:24px;"></i></div><h4>24/7 Support</h4><p>Our team supports Odoo deployments. Get expert help with infrastructure when you need it.</p></div>
        </div>
    </section>

    <section class="hosting-cta">
        <h2>Ready to Deploy Odoo?</h2>
        <p>Launch your Odoo instance in minutes. No setup fees, no contracts. Guaranteed performance.</p>
        <div class="cta-buttons">
            <a href="{{ route('register') }}" class="cta-primary">Launch Instance</a>
            <a href="#" class="cta-secondary">Talk to Experts</a>
        </div>
    </section>

</div>
@endsection
