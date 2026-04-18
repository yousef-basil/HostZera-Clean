<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceDisplayController extends Controller
{
    /**
     * Generic method to show services by category slug
     */
    private function getServicesBySlug($slug)
    {
        $category = ServiceCategory::where('slug', $slug)->first();
        return $category ? $category->services()->where('is_active', true)->get() : collect();
    }

    public function webHosting()
    {
        $category = ServiceCategory::where('slug', 'web-hosting')->first();
        return view('pages.web-hosting', [
            'services' => $this->getServicesBySlug('web-hosting'),
            'category' => $category
        ]);
    }

    public function wordpressHosting()
    {
        $category = ServiceCategory::where('slug', 'wordpress-hosting')->first();
        return view('pages.wordpress-hosting', [
            'services' => $this->getServicesBySlug('wordpress-hosting'),
            'category' => $category
        ]);
    }

    public function resellerHosting()
    {
        $category = ServiceCategory::where('slug', 'reseller-hosting')->first();
        return view('pages.reseller-hosting', [
            'services' => $this->getServicesBySlug('reseller-hosting'),
            'category' => $category
        ]);
    }

    public function emailHosting()
    {
        $category = ServiceCategory::where('slug', 'email-hosting')->first();
        return view('pages.email-hosting', [
            'services' => $this->getServicesBySlug('email-hosting'),
            'category' => $category
        ]);
    }

    public function linuxVps()
    {
        $category = ServiceCategory::where('slug', 'linux-vps')->first();
        return view('pages.linux-vps', [
            'services' => $this->getServicesBySlug('linux-vps'),
            'category' => $category
        ]);
    }

    public function windowsVps()
    {
        $category = ServiceCategory::where('slug', 'windows-vps')->first();
        return view('pages.windows-vps', [
            'services' => $this->getServicesBySlug('windows-vps'),
            'category' => $category
        ]);
    }

    public function dedicatedServer()
    {
        $category = ServiceCategory::where('slug', 'dedicated-server')->first();
        return view('pages.dedicated-servers', [
            'services' => $this->getServicesBySlug('dedicated-server'),
            'category' => $category
        ]);
    }

    public function n8nServers()
    {
        $category = ServiceCategory::where('slug', 'n8n-servers')->first();
        return view('pages.n8n-servers', [
            'services' => $this->getServicesBySlug('n8n-servers'),
            'category' => $category
        ]);
    }

    public function odooHosting()
    {
        $category = ServiceCategory::where('slug', 'odoo-hosting')->first();
        return view('pages.odoo-hosting', [
            'services' => $this->getServicesBySlug('odoo-hosting'),
            'category' => $category
        ]);
    }

    /**
     * Dynamic show method for categories (including NEWLY added ones)
     */
    public function show($category_slug)
    {
        $category = ServiceCategory::where('slug', $category_slug)->firstOrFail();
        $services = $category->services()->where('is_active', true)->orderBy('order')->get();

        // Try to find a custom view for this slug
        $viewName = 'pages.' . $category_slug;

        if (!view()->exists($viewName)) {
            // Special mappings for specific seeded categories
            if ($category_slug == 'dedicated-server') $viewName = 'pages.dedicated-servers';
            else $viewName = 'pages.web-hosting'; // Fallback to a standard hosting layout
        }

        return view($viewName, [
            'services' => $services,
            'category' => $category
        ]);
    }
}
