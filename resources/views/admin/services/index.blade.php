@extends('admin.layout')

@section('title', 'Manage Services')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Manage Services</h1>
        <p class="text-gray-600 mt-1">List of all available services synchronized from WHMCS.</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="px-5 py-2.5 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 shadow-sm transition">
        <i class="fas fa-plus mr-1"></i> Add Manual Service
    </a>
</div>

{{-- Category Filters --}}
<div class="mb-8">
    <div class="flex flex-wrap gap-2 items-center">
        <span class="text-sm font-semibold text-gray-500 mr-2 uppercase tracking-wider">Filter by Category:</span>
        <a href="{{ route('admin.services.index') }}" 
           class="px-4 py-2 rounded-full text-sm font-medium transition {{ !request('category_id') ? 'bg-blue-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200' }}">
            All Services
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('admin.services.index', ['category_id' => $cat->id]) }}" 
               class="px-4 py-2 rounded-full text-sm font-medium transition {{ request('category_id') == $cat->id ? 'bg-blue-600 text-white shadow-md' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-200' }}">
                {{ $cat->name }}
            </a>
        @endforeach
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 text-gray-700 font-bold border-b border-gray-100">
            <tr>
                <th class="px-6 py-4">ID</th>
                <th class="px-6 py-4">WHMCS PID</th>
                <th class="px-6 py-4">Name</th>
                <th class="px-6 py-4">Category</th>
                <th class="px-6 py-4">Price</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($services as $service)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">{{ $service->id }}</td>
                <td class="px-6 py-4 text-gray-500 font-mono">{{ $service->whmcs_product_id ?? 'N/A' }}</td>
                <td class="px-6 py-4 font-semibold">{{ $service->name }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">
                        {{ $service->category->name }}
                    </span>
                </td>
                <td class="px-6 py-4">${{ number_format($service->price, 2) }}</td>
                <td class="px-6 py-4">
                    @if($service->is_active)
                        <span class="text-green-600 flex items-center">
                            <i class="fas fa-check-circle mr-1"></i> Active
                        </span>
                    @else
                        <span class="text-red-500 flex items-center">
                            <i class="fas fa-times-circle mr-1"></i> Inactive
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4 space-x-2">
                    <a href="{{ route('admin.services.edit', $service->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this service?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
