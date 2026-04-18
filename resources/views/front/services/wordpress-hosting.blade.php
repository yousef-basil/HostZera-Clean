@extends('layouts.main')
@section('title', 'WordPress Hosting - HOSTZERA')
@section('meta_description', 'One-click install, automatic updates, and LiteSpeed caching for lightning-fast WordPress sites.')
@section('content')
<div class="hosting-page">
    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">Optimized WordPress Hosting</span>
            <h1>Optimized WordPress Hosting</h1>
            <p>One-click install, automatic updates, and LiteSpeed caching for lightning-fast WordPress sites.</p>
            <div style="margin-top: 2.5rem; display: flex; gap: 1rem; justify-content: center;">
                <a href="{{ route('signup') }}" class="cta-primary">Get Started</a>
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
                @foreach(['LiteSpeed', 'Jetpack', 'WooCommerce', 'Elementor', 'Yoast SEO'] as $tech)
                <span style="color: white; font-weight: 700; font-size: 1.1rem; opacity: 0.7;">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
    </section>
    <section id="plans" class="pricing-section">
        <div class="pricing-header"><h2>WordPress Hosting Plans</h2><p>Choose the perfect plan for your WordPress site.</p></div>
        <div class="pricing-grid">
            @php $plans = [
                ['name'=>'WP Starter','price'=>'4.99','badge'=>null,'features'=>['1 Website','10 GB SSD','25,000 Visits/mo','Free SSL Certificate','Auto WordPress Updates','Daily Backups','24/7 Support']],
                ['name'=>'WP Business','price'=>'9.99','badge'=>'Popular','features'=>['3 Websites','30 GB SSD','100,000 Visits/mo','Free SSL Certificate','Auto WordPress Updates','Daily Backups','24/7 Support','Staging Environment','Free CDN']],
                ['name'=>'WP Pro','price'=>'19.99','badge'=>null,'features'=>['10 Websites','100 GB SSD','500,000 Visits/mo','Free SSL Certificate','Auto WordPress Updates','Hourly Backups','Priority Support','Staging Environment','Free CDN','Malware Removal','Performance Optimization']],
            ]; @endphp
            @foreach($plans as $plan)
            <div class="pricing-card {{ $plan['badge'] ? 'featured' : '' }}">
                @if($plan['badge'])<div class="plan-badge">{{ $plan['badge'] }}</div>@endif
                <h3 class="plan-name">{{ $plan['name'] }}</h3>
                <div class="plan-price"><span class="currency">$</span><span class="amount">{{ $plan['price'] }}</span><span class="period">/mo</span></div>
                <ul class="plan-features">@foreach($plan['features'] as $f)<li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> {{ $f }}</li>@endforeach</ul>
                <a href="{{ route('signup') }}" class="plan-btn {{ $plan['badge'] ? 'plan-btn-primary' : '' }}">Get Started</a>
            </div>
            @endforeach
        </div>
    </section>
    <section class="hosting-features-section">
        <div class="features-header"><h2>WordPress Features</h2><p>Everything you need for a fast WordPress site.</p></div>
        <div class="features-grid">
            @php $features = [
                ['icon'=>'zap','title'=>'LiteSpeed Optimized','desc'=>'WordPress hosting powered by LiteSpeed for up to 20x faster page loads.'],
                ['icon'=>'shield','title'=>'WordPress Security','desc'=>'Automatic malware scanning, firewall protection, and security hardening.'],
                ['icon'=>'refresh-cw','title'=>'Auto Updates','desc'=>'Automatic WordPress core, theme, and plugin updates to keep your site secure.'],
                ['icon'=>'database','title'=>'Daily Backups','desc'=>'Automatic daily backups with one-click restore functionality.'],
                ['icon'=>'terminal','title'=>'Built-in Caching','desc'=>'LiteSpeed Cache plugin pre-installed for optimal performance out of the box.'],
                ['icon'=>'headphones','title'=>'WordPress Experts','desc'=>'24/7 support from our team of WordPress specialists.'],
            ]; @endphp
            @foreach($features as $f)
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="{{ $f['icon'] }}" style="width:24px;height:24px;"></i></div><h4>{{ $f['title'] }}</h4><p>{{ $f['desc'] }}</p></div>
            @endforeach
        </div>
    </section>
    <section class="hosting-cta"><h2>Ready for WordPress?</h2><p>Start building your site with optimized hosting.</p><div class="cta-buttons"><a href="{{ route('signup') }}" class="cta-primary">Start Now</a><a href="#" class="cta-secondary">Contact Sales</a></div></section>
</div>
@endsection
