@extends('back.layout')

@section('title', 'Manage Categories')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Service Categories</h1>
        <p class="text-sm text-gray-500">Group your services into categories for better organization.</p>
    </div>
    <a href="{{ route('back.categories.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors flex items-center">
        <i class="fas fa-plus mr-2"></i> Add New Category
    </a>
</div>

@if(session('error'))
    <div class="mb-6 px-4 py-3 bg-red-100 border border-red-400 text-red-700 rounded-lg">
        {{ session('error') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 text-gray-700 font-bold border-b border-gray-100">
            <tr>
                <th class="px-6 py-4">Order</th>
                <th class="px-6 py-4">Icon</th>
                <th class="px-6 py-4">Name</th>
                <th class="px-6 py-4">Slug</th>
                <th class="px-6 py-4">Services Count</th>
                <th class="px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($categories as $category)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-gray-500">#{{ $category->order }}</td>
                <td class="px-6 py-4">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-{{ $category->icon }}"></i>
                    </div>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-800">{{ $category->name }}</td>
                <td class="px-6 py-4 text-sm text-gray-500 font-mono">{{ $category->slug }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs font-bold">
                        {{ $category->services_count }} Services
                    </span>
                </td>
                <td class="px-6 py-4 flex items-center space-x-3">
                    <a href="{{ route('back.categories.edit', $category) }}" class="text-blue-500 hover:text-blue-700 transition font-medium text-xs">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                    
                    <form action="{{ route('back.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 transition font-medium text-xs">
                            <i class="fas fa-trash mr-1"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
