@extends('layouts.main')
@section('title', 'Odoo Hosting - HOSTZERA')
@section('meta_description', 'Run Odoo ERP on dedicated, optimized servers. Pre-configured for Odoo + PostgreSQL with full root access.')
@section('content')
<div class="hosting-page">
    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">Business ERP Hosting</span>
            <h1>Managed Odoo Hosting for Your Business</h1>
            <p>Run Odoo ERP on dedicated, optimized servers. Pre-configured for Odoo + PostgreSQL with full root access.</p>
            <div style="margin-top: 2.5rem; display: flex; gap: 1rem; justify-content: center;">
                <a href="#plans" class="cta-primary">View Plans</a>
                <a href="#" class="cta-secondary">Contact Sales</a>
            </div>
        </div>
        <div class="hosting-stats">
            <div class="stat-item"><span class="stat-value">99.99%</span><span class="stat-label">Uptime</span></div>
            <div class="stat-item"><span class="stat-value">Odoo</span><span class="stat-label">Pre-configured</span></div>
            <div class="stat-item"><span class="stat-value">Root</span><span class="stat-label">Full Access</span></div>
            <div class="stat-item"><span class="stat-value">24/7</span><span class="stat-label">Expert Support</span></div>
        </div>
    </section>
    <section id="plans" class="pricing-section">
        <div class="pricing-header"><h2>Odoo Hosting Plans</h2><p>Choose the right plan for your Odoo deployment.</p></div>
        <div class="pricing-grid">
            @php $plans = [
                ['name'=>'Odoo Starter','price'=>'14.50','badge'=>null,'specs'=>'2 vCPU · 4 GB RAM','features'=>['100 GB NVMe · 4 TB Traffic','Odoo + PostgreSQL Ready','KVM · Ubuntu 22.04/24.04','DDoS Protection','24/7 Support','Full Root Access']],
                ['name'=>'Odoo Business','price'=>'29.50','badge'=>'Best Value','specs'=>'4 vCPU · 12 GB RAM','features'=>['200 GB NVMe · 12 TB Traffic','Ideal for Production Odoo','KVM · Ubuntu 22.04/24.04','DDoS Protection','24/7 Support','Full Root Access']],
                ['name'=>'Odoo Enterprise','price'=>'59.50','badge'=>null,'specs'=>'8 vCPU · 24 GB RAM','features'=>['400 GB NVMe · 20 TB Traffic','Large Odoo Databases','KVM · Ubuntu 22.04/24.04','DDoS Protection','24/7 Support','Full Root Access']],
            ]; @endphp
            @foreach($plans as $plan)
            <div class="pricing-card {{ $plan['badge'] ? 'featured' : '' }}">
                @if($plan['badge'])<div class="plan-badge">{{ $plan['badge'] }}</div>@endif
                <h3 class="plan-name">{{ $plan['name'] }}</h3>
                <p style="font-size: 0.85rem; color: var(--primary); font-weight: 700; margin-bottom: 1.5rem;">{{ $plan['specs'] }}</p>
                <div class="plan-price"><span class="currency">$</span><span class="amount">{{ $plan['price'] }}</span><span class="period">/mo</span></div>
                <ul class="plan-features">@foreach($plan['features'] as $f)<li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> {{ $f }}</li>@endforeach</ul>
                <a href="{{ route('signup') }}" class="plan-btn {{ $plan['badge'] ? 'plan-btn-primary' : '' }}">Order Now</a>
            </div>
            @endforeach
        </div>
    </section>
    <section class="hosting-features-section">
        <div class="features-header"><h2>Why Odoo on Hostzera?</h2><p>Production-ready ERP hosting infrastructure</p></div>
        <div class="features-grid">
            @php $features = [
                ['icon'=>'database','title'=>'Odoo + PostgreSQL','desc'=>'Servers optimized for Odoo and PostgreSQL. Ubuntu 22.04/24.04 pre-configured.'],
                ['icon'=>'shield','title'=>'Secure & Reliable','desc'=>'DDoS protection, KVM virtualization, and full root access for complete control.'],
                ['icon'=>'headphones','title'=>'24/7 Support','desc'=>'Our team supports Odoo deployments. Get expert help with infrastructure when you need it.'],
            ]; @endphp
            @foreach($features as $f)
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="{{ $f['icon'] }}" style="width:24px;height:24px;"></i></div><h4>{{ $f['title'] }}</h4><p>{{ $f['desc'] }}</p></div>
            @endforeach
        </div>
    </section>
    <section class="hosting-cta"><h2>Ready to Deploy Odoo?</h2><p>Launch your Odoo instance in minutes. No setup fees, no contracts. Guaranteed performance.</p><div class="cta-buttons"><a href="{{ route('signup') }}" class="cta-primary">Launch Instance</a><a href="#" class="cta-secondary">Talk to Experts</a></div></section>
</div>
@endsection
