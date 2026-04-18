@extends('layouts.main')
@section('title', 'N8N Servers - HOSTZERA')
@section('meta_description', 'Self-hosted N8N workflows with dedicated resources. Automate your business without limits.')
@section('content')
<div class="hosting-page">
    <section class="hosting-hero">
        <div class="hosting-hero-content">
            <span class="hosting-badge">Workflow Automation</span>
            <h1>Managed N8N Servers for Your Workflows</h1>
            <p>Self-hosted N8N workflows with dedicated resources. Automate your business without limits.</p>
            <div style="margin-top: 2.5rem; display: flex; gap: 1rem; justify-content: center;">
                <a href="{{ route('signup') }}" class="cta-primary">View Plans</a>
                <a href="#features" class="cta-secondary">Learn More</a>
            </div>
        </div>
        <div class="hosting-stats">
            <div class="stat-item"><span class="stat-value">99.99%</span><span class="stat-label">Uptime</span></div>
            <div class="stat-item"><span class="stat-value">1-Click</span><span class="stat-label">N8N Install</span></div>
            <div class="stat-item"><span class="stat-value">√</span><span class="stat-label">Unlimited Workflows</span></div>
            <div class="stat-item"><span class="stat-value">24/7</span><span class="stat-label">Support</span></div>
        </div>
    </section>
    <section id="plans" class="pricing-section">
        <div class="pricing-header">
            <h2 style="color: white;">N8n Plans</h2>
            <p style="color: rgba(255, 255, 255, 0.7);">Choose the right option for your workflow automation needs.</p>
        </div>
        {{-- Cloud Account Plan --}}
        <div style="max-width: 400px; margin: 0 auto 4rem;">
            <div class="pricing-card" style="border: 1px solid rgba(103, 58, 183, 0.1);">
                <span style="font-size: 0.75rem; font-weight: 800; color: var(--primary); text-transform: uppercase; margin-bottom: 1rem; display: block;">No server required</span>
                <h3 class="plan-name">N8n Cloud Account</h3>
                <p style="font-size: 0.82rem; color: #6b7280; margin-bottom: 1.5rem; line-height: 1.4;">Just an account—no server needed. Your personal n8n workspace, ready to use in seconds.</p>
                <div class="plan-price"><span class="currency">$</span><span class="amount">6.00</span><span class="period">/mo</span></div>
                <ul class="plan-features">
                    @foreach(['Up to 10 Workflows','Up to 1,000 Executions / Month','Dedicated Member Workspace','Secure Self-Hosted n8n Access','Private Project Environment','Reliable Automation Hosting','Technical Support Included'] as $f)
                    <li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> {{ $f }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('signup') }}" class="plan-btn">Order Now</a>
            </div>
        </div>
        <div class="pricing-header" style="margin-bottom: 3rem;">
            <h3 style="font-size: 1.5rem; font-weight: 800; color: #111827;">Managed N8n Servers</h3>
            <p style="color: #6b7280;">Dedicated resources for production workflows</p>
        </div>
        <div class="pricing-grid">
            @php $plans = [
                ['name'=>'N8n Starter','price'=>'14.95','badge'=>null,'specs'=>'2 vCPU · 4 GB RAM','features'=>['100 GB NVMe · 4 TB Traffic','n8n Ready (Docker)','PostgreSQL · DDoS Protection','24/7 Support','Unlimited Workflows','Root Access Available']],
                ['name'=>'N8n Pro','price'=>'34.95','badge'=>'Best Value','specs'=>'4 vCPU · 12 GB RAM','features'=>['200 GB NVMe · 12 TB Traffic','Optimized for n8n Automation','PostgreSQL + Redis','DDoS Protection','24/7 Support','Unlimited Workflows']],
                ['name'=>'N8n Business','price'=>'69.95','badge'=>null,'specs'=>'8 vCPU · 24 GB RAM','features'=>['400 GB NVMe · 20 TB Traffic','Heavy Workflows Support','PostgreSQL + Redis','DDoS Protection','24/7 Support','Unlimited Workflows']],
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
        <div class="features-header"><h2>Why N8N on Hostzera?</h2><p>Production-ready workflow automation infrastructure</p></div>
        <div class="features-grid">
            @php $features = [
                ['icon'=>'zap','title'=>'1-Click Deploy','desc'=>'N8N is pre-installed and configured. Start automating in minutes.'],
                ['icon'=>'shield','title'=>'Secure & Reliable','desc'=>'DDoS protection, firewalls, and automatic updates for your n8n instance.'],
                ['icon'=>'headphones','title'=>'Expert Support','desc'=>'Our team knows n8n. Get help with workflows and infrastructure.'],
            ]; @endphp
            @foreach($features as $f)
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="{{ $f['icon'] }}" style="width:24px;height:24px;"></i></div><h4>{{ $f['title'] }}</h4><p>{{ $f['desc'] }}</p></div>
            @endforeach
        </div>
    </section>
    <section class="hosting-cta"><h2>Ready to Automate?</h2><p>Deploy your N8N server in minutes. No setup fees, no contracts.</p><div class="cta-buttons"><a href="{{ route('signup') }}" class="cta-primary">Start Now</a><a href="#" class="cta-secondary">Contact Sales</a></div></section>
</div>
@endsection
