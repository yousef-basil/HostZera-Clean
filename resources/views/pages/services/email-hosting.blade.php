@extends('layouts.main')
@section('title', 'Email Hosting - HOSTZERA')
@section('meta_description', 'Professional Email Hosting - Secure, reliable email for your domain.')
@section('content')
<div class="hosting-page">
    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">Professional Email Hosting</span>
            <h1>Professional Email Hosting</h1>
            <p>Secure, reliable email for your domain.</p>
            <div style="margin-top: 2.5rem; display: flex; gap: 1rem; justify-content: center;">
                <a href="{{ route('signup') }}" class="cta-primary">Get Started</a>
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
        <div class="pricing-header"><h2>Simple, Transparent Pricing</h2><p>Choose the plan that fits your business needs.</p></div>
        <div class="pricing-grid">
            @php $plans = [
                ['name'=>'Business Email Starter','price'=>'39.00','period'=>'/yr','badge'=>null,'features'=>['10 Email Accounts','10 GB SSD Storage','Webmail Access','Mobile Sync (IMAP / POP / SMTP)','Advanced Spam Protection','Email Forwarders','Auto Responders','SSL Secure Mail']],
                ['name'=>'Business Email Growth','price'=>'69.00','period'=>'/yr','badge'=>'Most Popular','features'=>['30 Email Accounts','30 GB SSD Storage','Webmail Access','Mobile Sync','Advanced Spam Protection','Email Forwarders','Auto Responders','SSL Secure Mail']],
                ['name'=>'Business Email Corporate','price'=>'119.00','period'=>'/yr','badge'=>null,'features'=>['75 Email Accounts','75 GB SSD Storage','All Starter features','Priority Support','Webmail Access','Mobile Sync','Advanced Spam Protection','SSL Secure Mail']],
            ]; @endphp
            @foreach($plans as $plan)
            <div class="pricing-card {{ $plan['badge'] ? 'featured' : '' }}">
                @if($plan['badge'])<div class="plan-badge">{{ $plan['badge'] }}</div>@endif
                <h3 class="plan-name">{{ $plan['name'] }}</h3>
                <div class="plan-price"><span class="currency">$</span><span class="amount">{{ $plan['price'] }}</span><span class="period">{{ $plan['period'] }}</span></div>
                <ul class="plan-features">@foreach($plan['features'] as $f)<li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> {{ $f }}</li>@endforeach</ul>
                <a href="{{ route('signup') }}" class="plan-btn {{ $plan['badge'] ? 'plan-btn-primary' : '' }}">Get Started</a>
            </div>
            @endforeach
        </div>
    </section>
    <section id="features" class="hosting-features-section">
        <div class="features-header"><h2>Everything You Need</h2><p>Professional email features for modern businesses</p></div>
        <div class="features-grid">
            @php $features = [
                ['icon'=>'shield','title'=>'Advanced Spam Protection','desc'=>'AI-powered spam filtering blocks 99.9% of unwanted emails.'],
                ['icon'=>'lock','title'=>'Enterprise Security','desc'=>'TLS encryption, two-factor authentication, and threat protection.'],
                ['icon'=>'smartphone','title'=>'Mobile Ready','desc'=>'Full sync support for iOS, Android, and desktop clients.'],
            ]; @endphp
            @foreach($features as $f)
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="{{ $f['icon'] }}" style="width:24px;height:24px;"></i></div><h4>{{ $f['title'] }}</h4><p>{{ $f['desc'] }}</p></div>
            @endforeach
        </div>
    </section>
    <section class="hosting-cta"><h2>Ready to Go Professional?</h2><p>Start with your custom email today. Setup takes just minutes.</p><div class="cta-buttons"><a href="{{ route('signup') }}" class="cta-primary">Start Free Trial</a><a href="#" class="cta-secondary">Contact Sales</a></div></section>
</div>
@endsection
