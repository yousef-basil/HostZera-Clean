@extends('layouts.main')
@section('title', 'Linux VPS - HOSTZERA')
@section('meta_description', 'Deploy your high-performance Linux VPS instance with full root access in seconds.')
@section('content')
<div class="hosting-page">
    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">Enterprise Cloud VPS</span>
            <h1>Linux VPS</h1>
            <p>Deploy your high-performance instance with full root access in seconds.</p>
        </div>
        <div class="hosting-stats">
            <div class="stat-item"><span class="stat-value">99.99%</span><span class="stat-label">Uptime SLA</span></div>
            <div class="stat-item"><span class="stat-value">< 1ms</span><span class="stat-label">NVMe Storage</span></div>
            <div class="stat-item"><span class="stat-value">Root</span><span class="stat-label">Full Access</span></div>
            <div class="stat-item"><span class="stat-value">24/7</span><span class="stat-label">Expert Support</span></div>
        </div>
    </section>
    <section class="pricing-section">
        <div class="pricing-header"><h2>Linux VPS Plans</h2><p>Choose the right plan for your application needs.</p></div>
        <div class="pricing-grid">
            @php $plans = [
                ['name'=>'H-KVM 1','cpu'=>'Enterprise AMD EPYC™ CPU','price'=>'5.99','badge'=>null,'features'=>['1 vCPU Core','2 GB RAM','30 GB NVMe Storage','2 TB Monthly Traffic','200 Mbps Dedicated Port','1 IPv4 Address','KVM Virtualization','Full Root Access','DDoS Protection']],
                ['name'=>'H-KVM 2','cpu'=>'Enterprise AMD EPYC™ CPU','price'=>'9.99','badge'=>null,'features'=>['2 vCPU Cores','4 GB RAM','100 GB NVMe Storage','4 TB Monthly Traffic','200 Mbps Dedicated Port','1 IPv4 Address','KVM Virtualization','Full Root Access','DDoS Protection']],
                ['name'=>'H-KVM 3','cpu'=>'Enterprise AMD EPYC™ CPU','price'=>'17.99','badge'=>'Most Popular','features'=>['3 vCPU Cores','8 GB RAM','150 GB NVMe Storage','8 TB Monthly Traffic','400-500 Mbps Dedicated Port','1 IPv4 Address','NVMe Optimized Storage','Full Root Access','DDoS Protection']],
                ['name'=>'H-KVM 4','cpu'=>'Enterprise AMD EPYC™ CPU','price'=>'24.99','badge'=>null,'features'=>['4 vCPU Cores','12 GB RAM','200 GB NVMe Storage','12 TB Monthly Traffic','500 Mbps Dedicated Port','1 IPv4 Address','High Performance Node','Full Root Access','DDoS Protection']],
                ['name'=>'H-KVM 5','cpu'=>'Enterprise AMD EPYC™ CPU','price'=>'34.99','badge'=>null,'features'=>['6 vCPU Cores','16 GB RAM','300 GB NVMe Storage','16 TB Monthly Traffic','800 Mbps Dedicated Port','1 IPv4 Address','Optimized for Traffic','Full Root Access','DDoS Protection']],
                ['name'=>'H-KVM 6','cpu'=>'AMD EPYC™ High-Performance Node','price'=>'49.99','badge'=>null,'features'=>['8 vCPU Cores','24 GB RAM','400 GB NVMe Storage','24 TB Monthly Traffic','Up to 1 Gbps Port','1 IPv4 Address','Enterprise Node','Full Root Access','DDoS Protection']],
            ]; @endphp
            @foreach($plans as $plan)
            <div class="pricing-card vps-card {{ $plan['badge'] ? 'featured' : '' }}">
                @if($plan['badge'])<div class="plan-badge">{{ $plan['badge'] }}</div>@endif
                <div style="margin-bottom: 1.5rem;"><h3 class="plan-name" style="margin-bottom: 0.25rem;">{{ $plan['name'] }}</h3><p style="font-size: 0.75rem; color: var(--text-muted); font-weight: 600;">{{ $plan['cpu'] }}</p></div>
                <div class="plan-price"><span class="currency">$</span><span class="amount">{{ $plan['price'] }}</span><span class="period">/mo</span></div>
                <ul class="plan-features">@foreach($plan['features'] as $f)<li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> {{ $f }}</li>@endforeach</ul>
                <a href="{{ route('signup') }}" class="plan-btn {{ $plan['badge'] ? 'plan-btn-primary' : '' }}">Get Started</a>
            </div>
            @endforeach
        </div>
    </section>
    <section class="hosting-features-section">
        <div class="features-header"><h2>Why Choose Our Linux VPS?</h2><p>Enterprise-grade infrastructure at affordable prices.</p></div>
        <div class="features-grid">
            @php $features = [
                ['icon'=>'cpu','title'=>'High-Performance CPUs','desc'=>'AMD EPYC™ High-Performance Compute Node processors for enterprise-grade performance.'],
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
    <section class="hosting-cta"><h2>Ready to Get Started?</h2><p>Deploy your Linux VPS in minutes. No setup fees, no contracts.</p><div class="cta-buttons"><a href="{{ route('signup') }}" class="cta-primary">Get Started</a><a href="#" class="cta-secondary">Contact Sales</a></div></section>
</div>
@endsection
