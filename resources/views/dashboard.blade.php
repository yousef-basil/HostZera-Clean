@extends('layouts.main')

@section('title', 'Client Dashboard - HOSTZERA')

@push('styles')
<style>
    .dashboard-wrapper {
        padding: 120px 0 80px;
        background: #fdfbff;
        min-height: 100vh;
    }
    .db-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    .db-header {
        margin-bottom: 40px;
    }
    .db-header h1 {
        font-size: 2.2rem;
        color: #1e1b4b;
        font-weight: 800;
        letter-spacing: -0.02em;
    }
    .db-header p {
        color: #6366f1;
        margin-top: 4px;
        font-size: 1.1rem;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }
    .stat-card {
        background: white;
        padding: 24px;
        border-radius: 20px;
        box-shadow: 0 10px 15px -3px rgba(139, 92, 246, 0.1);
        border: 1px solid #ede9fe;
        transition: transform 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
    }
    .stat-label {
        font-size: 0.8rem;
        color: #7c3aed;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    .stat-value {
        font-size: 2rem;
        color: #1e1b4b;
        font-weight: 900;
        margin-top: 8px;
    }
    
    .db-content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
    }
    .card-box {
        background: white;
        border-radius: 24px;
        border: 1px solid #ede9fe;
        box-shadow: 0 10px 15px -3px rgba(139, 92, 246, 0.05);
        padding: 30px;
    }
    .card-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        font-size: 1.25rem;
        font-weight: 800;
        color: #1e1b4b;
    }
    
    .service-item {
        display: flex;
        align-items: center;
        padding: 20px;
        border-radius: 16px;
        background: #f5f3ff;
        margin-bottom: 12px;
        border: 1px solid #ddd6fe;
    }
    .service-icon {
        width: 52px;
        height: 52px;
        background: #ede9fe;
        color: #8b5cf6;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 16px;
    }
    .service-info h5 {
        font-weight: 800;
        margin-bottom: 2px;
        color: #1e1b4b;
    }
    .service-info p {
        font-size: 0.85rem;
        color: #6d6e71;
    }
    .status-badge {
        margin-left: auto;
        padding: 6px 14px;
        border-radius: 99px;
        font-size: 0.75rem;
        font-weight: 800;
        background: #8b5cf6;
        color: white;
    }

    .action-btn {
        width: 100%;
        padding: 14px;
        background: #8b5cf6;
        color: white;
        border: none;
        border-radius: 14px;
        font-weight: 800;
        margin-bottom: 12px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s ease;
    }
    .action-btn:hover {
        background: #7c3aed;
        box-shadow: 0 10px 15px -3px rgba(124, 58, 237, 0.3);
    }
    .action-btn-secondary {
        background: #f5f3ff;
        color: #7c3aed;
        border: 1px solid #ddd6fe;
    }
    .action-btn-secondary:hover {
        background: #ede9fe;
    }

    @media (max-width: 960px) {
        .db-content-grid {
            grid-template-columns: 1fr;
        }
    }

</style>
@endpush

@section('content')
<div class="dashboard-wrapper">
    <div class="db-container">
        <div class="db-header">
            <h1>Welcome back, {{ Auth::user()->name }}! 👋</h1>
            <p>Manage your hosting services and domains from one place.</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">ACTIVE SERVICES</div>
                <div class="stat-value">0</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">DOMAINS</div>
                <div class="stat-value">0</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">UNPAID INVOICES</div>
                <div class="stat-value">$0.00</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">TICKETS</div>
                <div class="stat-value">0</div>
            </div>
        </div>

        <div class="db-content-grid">
            <div class="main-column">
                <div class="card-box">
                    <div class="card-title">
                        <span>Your Active Services</span>
                        <a href="{{ route('services.web-hosting') }}" style="font-size: 0.8rem; color: #2563eb; text-decoration: none;">View All</a>
                    </div>

                    <div class="empty-state" style="text-align: center; padding: 40px 0;">
                        <img src="https://img.icons8.com/illustrations/external-fauzidea-flat-fauzidea/64/null/external-empty-box-ecommerce-fauzidea-flat-fauzidea.png" style="width: 80px; opacity: 0.5;">
                        <p style="margin-top: 15px; color: #6b7280;">You don't have any active services yet.</p>
                        <a href="{{ route('home') }}" style="display:inline-block; margin-top: 15px; color: #2563eb; font-weight: 700; text-decoration: none;">Order your first server →</a>
                    </div>

                    {{-- Example of how a service would look --}}
                    {{--
                    <div class="service-item">
                        <div class="service-icon"><i data-lucide="server"></i></div>
                        <div class="service-info">
                            <h5>Premium Web Hosting</h5>
                            <p>hostzera.com • Expires in 30 days</p>
                        </div>
                        <span class="status-badge">Active</span>
                    </div>
                    --}}
                </div>
            </div>

            <div class="sidebar-column">
                <div class="card-box" style="margin-bottom: 20px;">
                    <div class="card-title">Quick Actions</div>
                    <button class="action-btn"><i data-lucide="plus-circle" style="width:18px;"></i> Buy New Service</button>
                    <button class="action-btn action-btn-secondary"><i data-lucide="help-circle" style="width:18px;"></i> Open Support Ticket</button>
                    <button class="action-btn action-btn-secondary"><i data-lucide="settings" style="width:18px;"></i> Billing Settings</button>
                </div>

                <div class="card-box">
                    <div class="card-title">Account Security</div>
                    <p style="font-size: 0.85rem; color: #6b7280; margin-bottom: 15px;">Your account is protected via standard email authentication.</p>
                    <a href="{{ route('profile.edit') }}" style="color: #2563eb; font-size: 0.9rem; font-weight: 700; text-decoration: none;">Secure your account →</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
