@extends('layouts.main')
@section('title', 'Reseller Hosting - HOSTZERA')
@section('meta_description', 'Start your own hosting business with white-label reseller plans.')
@section('content')
<div class="hosting-page">
    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">White-Label Reseller</span>
            <h1>Reseller Hosting</h1>
            <p>Start your own hosting business with white-label reseller plans.</p>
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
        <div class="pricing-header"><h2>Reseller Hosting Plans</h2><p>Start selling hosting with cPanel/WHM. All plans include white-label branding.</p></div>
        <div class="pricing-grid">
            @php $plans = [
                ['name'=>'Starter Reseller','price'=>'10.99','badge'=>null,'features'=>['50 GB NVME Disk Space','Unmetered Bandwidth','10 cPanel Accounts','Free SSL Certificates','WHM Access','LiteSpeed Web Server','Daily Security Monitoring','24/7 Technical Support','Free .com domain with Annual billing']],
                ['name'=>'Pro Reseller','price'=>'18.99','badge'=>'Most Popular','features'=>['100 GB NVME Storage','Unmetered Bandwidth','Up to 30 cPanel Accounts','Free SSL Certificates','WHM Access','LiteSpeed + Advanced Cache','Priority Support','Free Migration Assistance','Free .com domain with Annual billing']],
                ['name'=>'Elite Reseller','price'=>'29.99','badge'=>null,'features'=>['200 GB NVME Storage','Unmetered Bandwidth','Up to 50 cPanel Accounts','Free SSL Certificates','WHM Access','LiteSpeed + Advanced Cache','High Priority Support','High Performance Limits','Free .com domain with Annual billing']],
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
    <section id="features" class="hosting-features-section">
        <div class="features-header"><h2>Why Choose Our Reseller Hosting?</h2><p>White-label hosting infrastructure at affordable prices</p></div>
        <div class="features-grid">
            @php $features = [
                ['icon'=>'settings','title'=>'cPanel & WHM','desc'=>'Industry-standard control panels for full management of your hosting accounts.'],
                ['icon'=>'hard-drive','title'=>'SSD Storage','desc'=>'Fast SSD storage for your reseller accounts with excellent read/write performance.'],
                ['icon'=>'shield','title'=>'Enterprise Security','desc'=>'Advanced DDoS protection, firewalls, and security monitoring included.'],
                ['icon'=>'globe','title'=>'Global Network','desc'=>'Multiple datacenter locations worldwide for optimal latency and redundancy.'],
                ['icon'=>'zap','title'=>'Instant Deployment','desc'=>'Your VPS is ready in seconds with your choice of operating system.'],
                ['icon'=>'headphones','title'=>'24/7 Expert Support','desc'=>'Our technical experts are available around the clock to assist you.'],
            ]; @endphp
            @foreach($features as $f)
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="{{ $f['icon'] }}" style="width:24px;height:24px;"></i></div><h4>{{ $f['title'] }}</h4><p>{{ $f['desc'] }}</p></div>
            @endforeach
        </div>
    </section>
    <section class="hosting-cta"><h2>Ready to Get Started?</h2><p>Start your hosting business today. No setup fees, no contracts.</p><div class="cta-buttons"><a href="{{ route('signup') }}" class="cta-primary">Start Now</a><a href="#" class="cta-secondary">Contact Sales</a></div></section>
</div>
@endsection
