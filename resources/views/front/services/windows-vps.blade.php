@extends('layouts.main')
@section('title', 'Windows VPS - HOSTZERA')
@section('meta_description', 'Windows Server VPS with RDP access. High performance for desktop applications and hosting.')
@section('content')
<div class="hosting-page">
    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">Enterprise Windows VPS</span>
            <h1>Windows VPS</h1>
            <p>Windows Server VPS with RDP access. High performance for desktop applications and hosting.</p>
        </div>
        <div class="hosting-stats">
            <div class="stat-item"><span class="stat-value">99.99%</span><span class="stat-label">Uptime SLA</span></div>
            <div class="stat-item"><span class="stat-value">< 1ms</span><span class="stat-label">NVMe Storage</span></div>
            <div class="stat-item"><span class="stat-value">RDP</span><span class="stat-label">Full Access</span></div>
            <div class="stat-item"><span class="stat-value">24/7</span><span class="stat-label">Expert Support</span></div>
        </div>
    </section>
    <section class="pricing-section">
        <div class="pricing-header"><h2>Windows VPS Plans</h2><p>Choose the right plan for your business needs.</p></div>
        <div class="pricing-grid">
            @php $plans = [
                ['name'=>'W-KVM 1','setupFee'=>'$4.99 Setup Fee','price'=>'9.95','badge'=>null,'features'=>['2 vCPU Cores','4 GB RAM','60 GB NVMe Storage','3 TB Monthly Traffic','200 Mbps Dedicated Port','1 IPv4 Address','KVM Virtualization','Windows OS Support','Full Admin Access','DDoS Protection']],
                ['name'=>'W-KVM 2','setupFee'=>'$4.99 Setup Fee','price'=>'14.75','badge'=>null,'features'=>['3 vCPU Cores','6 GB RAM','90 GB NVMe Storage','5 TB Monthly Traffic','200 Mbps Dedicated Port','1 IPv4 Address','KVM Virtualization','Windows OS Support','Full Admin Access','DDoS Protection']],
                ['name'=>'W-KVM 3','setupFee'=>'$4.99 Setup Fee','price'=>'24.50','badge'=>'Most Popular','features'=>['4 vCPU Cores','8 GB RAM','150 GB NVMe Storage','8 TB Monthly Traffic','200 Mbps Dedicated Port','1 IPv4 Address','KVM Virtualization','Windows OS Support','Full Admin Access','DDoS Protection']],
                ['name'=>'W-KVM 4','setupFee'=>'$4.99 Setup Fee','price'=>'34.25','badge'=>null,'features'=>['6 vCPU Cores','12 GB RAM','220 GB NVMe Storage','12 TB Monthly Traffic','200 Mbps Dedicated Port','1 IPv4 Address','KVM Virtualization','Windows OS Support','Full Admin Access','DDoS Protection']],
                ['name'=>'W-KVM 5','setupFee'=>'$4.99 Setup Fee','price'=>'49.40','badge'=>null,'features'=>['8 vCPU Cores','16 GB RAM','320 GB NVMe Storage','16 TB Monthly Traffic','200 Mbps Dedicated Port','1 IPv4 Address','KVM Virtualization','Windows OS Support','Full Admin Access','DDoS Protection']],
                ['name'=>'W-KVM 6','setupFee'=>'$4.99 Setup Fee','price'=>'69.60','badge'=>null,'features'=>['8 vCPU Cores','16 GB RAM','320 GB NVMe Storage','16 TB Monthly Traffic','200 Mbps Dedicated Port','1 IPv4 Address','KVM Virtualization','Windows OS Support','Full Admin Access','DDoS Protection']],
            ]; @endphp
            @foreach($plans as $plan)
            <div class="pricing-card vps-card {{ $plan['badge'] ? 'featured' : '' }}">
                @if($plan['badge'])<div class="plan-badge">{{ $plan['badge'] }}</div>@endif
                <div style="margin-bottom: 1.5rem;"><h3 class="plan-name" style="margin-bottom: 0.25rem;">{{ $plan['name'] }}</h3><p style="font-size: 0.75rem; color: var(--primary); font-weight: 700;">{{ $plan['setupFee'] }}</p></div>
                <div class="plan-price"><span class="currency">$</span><span class="amount">{{ $plan['price'] }}</span><span class="period">/mo</span></div>
                <ul class="plan-features">@foreach($plan['features'] as $f)<li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> {{ $f }}</li>@endforeach</ul>
                <a href="{{ route('signup') }}" class="plan-btn {{ $plan['badge'] ? 'plan-btn-primary' : '' }}">Order Now</a>
            </div>
            @endforeach
        </div>
    </section>
    <section class="hosting-features-section">
        <div class="features-header"><h2>Why Choose Our Windows VPS?</h2><p>Enterprise Windows hosting at competitive prices.</p></div>
        <div class="features-grid">
            @php $features = [
                ['icon'=>'cpu','title'=>'High-Performance CPUs','desc'=>'Latest generation AMD EPYC and Intel Xeon processors for maximum performance.'],
                ['icon'=>'hard-drive','title'=>'NVMe SSD Storage','desc'=>'Ultra-fast NVMe SSDs with up to 7GB/s read speeds for lightning-quick operations.'],
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
    <section class="hosting-cta"><h2>Ready to Get Started?</h2><p>Deploy your Windows VPS in minutes. No setup fees, no contracts.</p><div class="cta-buttons"><a href="{{ route('signup') }}" class="cta-primary">Get Started</a><a href="#" class="cta-secondary">Contact Sales</a></div></section>
</div>
@endsection
