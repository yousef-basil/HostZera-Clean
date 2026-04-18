@extends('layouts.app')

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
                <a href="{{ route('register') }}" class="cta-primary">View Plans</a>
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
                    <li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> Up to 10 Workflows</li>
                    <li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> Up to 1,000 Executions / Month</li>
                    <li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> Dedicated Member Workspace</li>
                    <li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> Secure Self-Hosted n8n Access</li>
                    <li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> Private Project Environment</li>
                    <li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> Reliable Automation Hosting</li>
                    <li><i data-lucide="check" style="width:14px;height:14px;" class="plan-check"></i> Technical Support Included</li>
                </ul>
                <a href="{{ route('register') }}" class="plan-btn">Order Now</a>
            </div>
        </div>

        <div class="pricing-header" style="margin-bottom: 3rem;">
            <h3 style="font-size: 1.5rem; font-weight: 800; color: white;">Managed N8n Servers</h3>
            <p style="color: rgba(255, 255, 255, 0.7);">Dedicated resources for production workflows</p>
        </div>

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
                            : explode("\n", str_replace("\r", "", $service->description));
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
                    <p style="color: #6b7280;">No Managed N8N plans available.</p>
                </div>
            @endforelse
        </div>
    </section>

    <section class="hosting-features-section">
        <div class="features-header"><h2>Why N8N on Hostzera?</h2><p>Production-ready workflow automation infrastructure</p></div>
        <div class="features-grid">
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="zap" style="width:24px;height:24px;"></i></div><h4>1-Click Deploy</h4><p>N8N is pre-installed and configured. Start automating in minutes.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="shield" style="width:24px;height:24px;"></i></div><h4>Secure & Reliable</h4><p>DDoS protection, firewalls, and automatic updates for your n8n instance.</p></div>
            <div class="hosting-feature-card"><div class="feature-icon-box"><i data-lucide="headphones" style="width:24px;height:24px;"></i></div><h4>Expert Support</h4><p>Our team knows n8n. Get help with workflows and infrastructure.</p></div>
        </div>
    </section>

    <section class="hosting-cta">
        <h2>Ready to Automate?</h2>
        <p>Deploy your N8N server in minutes. No setup fees, no contracts.</p>
        <div class="cta-buttons">
            <a href="{{ route('register') }}" class="cta-primary">Start Now</a>
            <a href="#" class="cta-secondary">Contact Sales</a>
        </div>
    </section>

</div>
@endsection
