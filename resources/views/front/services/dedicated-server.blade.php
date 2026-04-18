@extends('layouts.main')
@section('title', 'Dedicated Servers - HOSTZERA')
@section('meta_description', 'Bare metal performance for demanding workloads. Uncompromised power for your mission-critical applications.')
@section('content')
<div class="hosting-page">
    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">Enterprise Bare Metal</span>
            <h1>Dedicated Servers</h1>
            <p>Bare metal performance for demanding workloads. Uncompromised power for your mission-critical applications.</p>
        </div>
        <div class="hosting-stats">
            <div class="stat-item"><span class="stat-value">99.99%</span><span class="stat-label">Uptime SLA</span></div>
            <div class="stat-item"><span class="stat-value">< 1ms</span><span class="stat-label">Network Latency</span></div>
            <div class="stat-item"><span class="stat-value">Root</span><span class="stat-label">Full Access</span></div>
            <div class="stat-item"><span class="stat-value">24/7</span><span class="stat-label">Priority Support</span></div>
        </div>
    </section>
    <section class="pricing-section">
        <div class="pricing-header"><h2>Dedicated Server Plans</h2><p>Full hardware resources for maximum performance.</p></div>
        <div class="pricing-grid">
            @php $plans = [
                ['name'=>'Core','cpu'=>'Intel Xeon E3-1275v5 CPU','price'=>'88.61','badge'=>null,'features'=>['64 GB DDR4 ECC RAM','2 x 512 GB NVMe/SSD Storage','1 Gbps Network Port','Unlimited Traffic','1 IPv4 Address','FSN1 (Germany) Datacenter','Full Root Access','DDoS Protection','24/7 Technical Support','Hardware Replacement Included','Free Email Support','Free Phone Support']],
                ['name'=>'Power','cpu'=>'AMD Ryzen 5 3600 CPU','price'=>'93.43','badge'=>'Most Popular','features'=>['64 GB DDR4 ECC RAM','2 x 512 GB NVMe/SSD Storage','1 Gbps Network Port','Unlimited Traffic','1 IPv4 Address','FSN1 (Germany) Datacenter','Full Root Access','DDoS Protection','24/7 Technical Support','Hardware Replacement Included','Free Email Support','Free Phone Support']],
                ['name'=>'Prime','cpu'=>'AMD Ryzen 9 3900 CPU','price'=>'163.40','badge'=>null,'features'=>['64 GB DDR4 ECC RAM','2 x 1 TB NVMe/SSD Storage','1 Gbps Network Port','Unlimited Traffic','1 IPv4 Address','FSN1 (Germany) Datacenter','Full Root Access','DDoS Protection','24/7 Technical Support','Hardware Replacement Included','Free Email Support','Free Phone Support']],
            ]; @endphp
            @foreach($plans as $plan)
            <div class="pricing-card {{ $plan['badge'] ? 'featured' : '' }}">
                @if($plan['badge'])<div class="plan-badge">{{ $plan['badge'] }}</div>@endif
                <div style="margin-bottom: 1.5rem;"><h3 class="plan-name" style="margin-bottom: 0.25rem;">{{ $plan['name'] }}</h3><p style="font-size: 0.8rem; color: var(--text-muted); font-weight: 600;">{{ $plan['cpu'] }}</p></div>
                <div class="plan-price"><span class="currency">$</span><span class="amount">{{ $plan['price'] }}</span><span class="period">/mo</span></div>
                <ul class="plan-features">@foreach($plan['features'] as $f)<li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> {{ $f }}</li>@endforeach</ul>
                <a href="{{ route('signup') }}" class="plan-btn {{ $plan['badge'] ? 'plan-btn-primary' : '' }}">Order Now</a>
            </div>
            @endforeach
        </div>
    </section>
    <section class="hosting-features-section">
        <div class="features-header"><h2>Why Choose Dedicated Hosting?</h2><p>Unmatched performance for mission-critical workloads.</p></div>
        <div class="features-grid">
            @php $features = [
                ['icon'=>'cpu','title'=>'Bare Metal Performance','desc'=>'No virtualization overhead. Full access to physical hardware resources.'],
                ['icon'=>'hard-drive','title'=>'NVMe SSD Storage','desc'=>'Ultra-fast NVMe SSDs with up to 7GB/s read speeds for lightning-quick operations.'],
                ['icon'=>'shield','title'=>'Enterprise Security','desc'=>'Advanced DDoS protection, firewalls, and security monitoring included.'],
                ['icon'=>'globe','title'=>'Global Network','desc'=>'Multiple datacenter locations worldwide for optimal latency and redundancy.'],
                ['icon'=>'zap','title'=>'Ready in Hours','desc'=>'Your dedicated server is ready in hours with your choice of operating system.'],
                ['icon'=>'headphones','title'=>'24/7 Priority Support','desc'=>'Direct access to our senior technical experts around the clock.'],
            ]; @endphp
            @foreach($features as $f)
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="{{ $f['icon'] }}" style="width:24px;height:24px;"></i></div><h4>{{ $f['title'] }}</h4><p>{{ $f['desc'] }}</p></div>
            @endforeach
        </div>
    </section>
    <section class="hosting-cta"><h2>Ready for Dedicated Power?</h2><p>Deploy your dedicated server today. Expert support included. No setup fees, no contracts.</p><div class="cta-buttons"><a href="{{ route('signup') }}" class="cta-primary">Get Started</a><a href="#" class="cta-secondary">Contact Sales</a></div></section>
</div>
@endsection
