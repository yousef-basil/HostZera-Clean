<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryManagementController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = ServiceCategory::withCount('services')->orderBy('order')->get();
        return view('back.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('back.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255', 'unique:service_categories,name'],
            'icon'        => ['nullable', 'string', 'max:50'],
            'order'       => ['required', 'integer', 'min:0'],
            'description'      => ['nullable', 'string'],
            'hero_description' => ['nullable', 'string'],
            'features'         => ['nullable', 'string'],
            'icon_image'       => ['nullable', 'image', 'max:2048'], // Max 2MB
        ]);

        $iconImagePath = null;
        if ($request->hasFile('icon_image')) {
            $iconImagePath = $request->file('icon_image')->store('categories', 'public');
        }

        ServiceCategory::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'icon'        => $request->icon ?? 'package',
            'order'       => $request->order,
            'description'      => $request->description,
            'hero_description' => $request->hero_description,
            'features'         => $request->features,
            'icon_image'       => $iconImagePath,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(ServiceCategory $category)
    {
        return view('back.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, ServiceCategory $category)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255', 'unique:service_categories,name,' . $category->id],
            'icon'        => ['nullable', 'string', 'max:50'],
            'order'       => ['required', 'integer', 'min:0'],
            'description'      => ['nullable', 'string'],
            'hero_description' => ['nullable', 'string'],
            'features'         => ['nullable', 'string'],
            'icon_image'       => ['nullable', 'image', 'max:2048'],
        ]);

        $iconImagePath = $category->icon_image;
        if ($request->hasFile('icon_image')) {
            $iconImagePath = $request->file('icon_image')->store('categories', 'public');
        }

        $category->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'icon'        => $request->icon ?? 'package',
            'order'       => $request->order,
            'description'      => $request->description,
            'hero_description' => $request->hero_description,
            'features'         => $request->features,
            'icon_image'       => $iconImagePath,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(ServiceCategory $category)
    {
        if ($category->services()->count() > 0) {
            return redirect()->back()
                ->with('error', 'Cannot delete category that has services assigned to it.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
