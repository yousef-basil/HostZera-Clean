<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Service;
use App\Models\ServiceCategory;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index(Request $request)
    {
        $query = Service::with('category')->orderBy('order');
        
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }
        
        $services = $query->get();
        $categories = ServiceCategory::orderBy('order')->get();
        
        return view('back.services.index', compact('services', 'categories'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        $categories = ServiceCategory::orderBy('order')->get();
        return view('back.services.create', compact('categories'));
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'whmcs_product_id' => 'nullable|integer',
            'category_id' => 'required|exists:service_categories,id',
            'price' => 'required|numeric',
            'billing_cycle' => 'nullable|string',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'badge_text' => 'nullable|string',
            'is_active' => 'nullable',
            'order' => 'nullable|integer',
        ]);

        $data['is_active'] = $request->has('is_active');

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully');
    }

    /**
     * Display the specified service (Redirects to frontend).
     */
    public function show($id)
    {
        // If it's a numeric ID, find service and redirect to its category
        if (is_numeric($id)) {
            $service = Service::with('category')->find($id);
            if ($service && $service->category) {
                return redirect()->route('services.display', $service->category->slug);
            }
        }

        // If it's a slug (like wordpress-hosting), redirect directly
        return redirect()->route('services.display', $id);
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $categories = ServiceCategory::orderBy('order')->get();
        return view('back.services.edit', compact('service', 'categories'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required|string',
            'whmcs_product_id' => 'nullable|integer',
            'category_id' => 'required|exists:service_categories,id',
            'price' => 'required|numeric',
            'billing_cycle' => 'nullable|string',
            'description' => 'nullable|string',
            'features' => 'nullable|string',
            'badge_text' => 'nullable|string',
            'is_active' => 'nullable',
            'order' => 'nullable|integer',
        ]);

        $data['is_active'] = $request->has('is_active');

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully');
    }
}
