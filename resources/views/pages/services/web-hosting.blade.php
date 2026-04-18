@extends('layouts.main')

@section('title', 'Web Hosting - HOSTZERA')
@section('meta_description', 'Fast & Secure Web Hosting with SSD storage, LiteSpeed servers, and 24/7 expert support.')

@section('content')
<div class="hosting-page">
    {{-- Hero --}}
    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">Shared Web Hosting</span>
            <h1>Fast & Secure Web Hosting</h1>
            <p>Launch your website on reliable, high-performance hosting with SSD storage, LiteSpeed servers, and 24/7 expert support.</p>
        </div>
        <div class="hosting-stats">
            <div class="stat-item"><span class="stat-value">99.9%</span><span class="stat-label">Uptime SLA</span></div>
            <div class="stat-item"><span class="stat-value">1-Click</span><span class="stat-label">App Install</span></div>
            <div class="stat-item"><span class="stat-value">SSD</span><span class="stat-label">Storage</span></div>
            <div class="stat-item"><span class="stat-value">24/7</span><span class="stat-label">Support</span></div>
        </div>
    </section>

    {{-- Pricing --}}
    <section class="pricing-section">
        <div class="pricing-header">
            <h2>Web Hosting Plans</h2>
            <p>Choose a plan that fits your website and grow anytime.</p>
        </div>
        <div class="pricing-grid">
            @php
            $plans = [
                ['name' => 'Bronze', 'price' => '3.99', 'badge' => null, 'features' => ['1 Website','10 GB NVME','Unlimited bandwidth','High-performance NVME storage','5 Email Accounts','WP-Toolkit for WordPress','Sitejet Builder','Weekly backups','100% uptime guarantee','Free CDN','Free automatic SSL installation','LiteSpeed webserver','SSH access','10 FTP users','5 MySQL databases','Free .com domain with Annual billing']],
                ['name' => 'Silver', 'price' => '6.49', 'badge' => 'Best Value', 'features' => ['3 Websites','25 GB NVME','Unlimited bandwidth','High-performance NVME storage','10 Email Accounts','WP-Toolkit for WordPress','Sitejet Builder','Weekly backups','100% uptime guarantee','Free CDN','Free automatic SSL installation','LiteSpeed webserver','SSH access','15 FTP users','10 MySQL databases','Free .com domain with Annual billing']],
                ['name' => 'Diamond', 'price' => '9.99', 'badge' => null, 'features' => ['Unlimited Websites','50 GB NVME','Unlimited bandwidth','High-performance NVME storage','Unlimited Email Accounts','WP-Toolkit for WordPress','Sitejet Builder','Daily Backups','100% uptime guarantee','Free CDN','Free automatic SSL installation','LiteSpeed webserver','SSH access','Unlimited FTP users','Unlimited MySQL databases','Free .com domain with Annual billing']],
            ];
            @endphp
            @foreach($plans as $plan)
            <div class="pricing-card {{ $plan['badge'] ? 'featured' : '' }}">
                @if($plan['badge'])<div class="plan-badge">{{ $plan['badge'] }}</div>@endif
                <h3 class="plan-name">{{ $plan['name'] }}</h3>
                <div class="plan-price"><span class="currency">$</span><span class="amount">{{ $plan['price'] }}</span><span class="period">/mo</span></div>
                <ul class="plan-features">
                    @foreach($plan['features'] as $f)
                    <li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> {{ $f }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('signup') }}" class="plan-btn {{ $plan['badge'] ? 'plan-btn-primary' : '' }}">Get Started</a>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Features --}}
    <section class="hosting-features-section">
        <div class="features-header">
            <h2>Hosting Features</h2>
            <p>Everything you need to build, launch, and grow.</p>
        </div>
        <div class="features-grid">
            @php
            $features = [
                ['icon' => 'zap', 'title' => 'LiteSpeed Servers', 'desc' => 'High-performance LiteSpeed web servers for faster load times and better SEO.'],
                ['icon' => 'server', 'title' => 'Built-in Caching', 'desc' => 'Server-side caching and optimization tools included for blazing performance.'],
                ['icon' => 'shield', 'title' => 'DDoS Protection', 'desc' => 'Always-on DDoS protection and a secure firewall keep your site online.'],
                ['icon' => 'hard-drive', 'title' => 'SSD Storage', 'desc' => 'Fast SSD storage ensures quick file access and smooth page delivery.'],
                ['icon' => 'lock', 'title' => 'Free SSL', 'desc' => 'Automatic SSL certificates to keep your visitors safe and trusted.'],
                ['icon' => 'headphones', 'title' => '24/7 Support', 'desc' => 'Our experts are ready around the clock to help you launch and scale.'],
            ];
            @endphp
            @foreach($features as $f)
            <div class="hosting-feature-card">
                <div class="feature-icon-box"><i data-lucide="{{ $f['icon'] }}" style="width:24px;height:24px;"></i></div>
                <h4>{{ $f['title'] }}</h4>
                <p>{{ $f['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </section>

    {{-- CTA --}}
    <section class="hosting-cta">
        <h2>Ready to Launch Your Website?</h2>
        <p>Get reliable, fast web hosting with free SSL, daily backups, and 24/7 support.</p>
        <div class="cta-buttons">
            <a href="{{ route('signup') }}" class="cta-primary">Start Now</a>
            <a href="#" class="cta-secondary">Talk to Sales</a>
        </div>
    </section>
</div>
@endsection
