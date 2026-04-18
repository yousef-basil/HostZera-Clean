@extends('admin.layout')

@section('title', 'Edit Service: ' . $service->name)

@section('content')
<div class="max-w-2xl bg-white rounded-xl shadow-sm border border-gray-100 p-8">
    <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Service Name</label>
                <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ $service->name }}" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Category</label>
                    <select name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $service->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">WHMCS Product ID (Optional)</label>
                    <input type="number" name="whmcs_product_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ $service->whmcs_product_id }}">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Price ($)</label>
                    <input type="number" step="0.01" name="price" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ $service->price }}" required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Billing Cycle</label>
                    <select name="billing_cycle" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="monthly" {{ $service->billing_cycle == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="quarterly" {{ $service->billing_cycle == 'quarterly' ? 'selected' : '' }}>Quarterly</option>
                        <option value="semi-annually" {{ $service->billing_cycle == 'semi-annually' ? 'selected' : '' }}>Semi-Annually</option>
                        <option value="annually" {{ $service->billing_cycle == 'annually' ? 'selected' : '' }}>Annually</option>
                        <option value="biennially" {{ $service->billing_cycle == 'biennially' ? 'selected' : '' }}>Biennially</option>
                        <option value="triennially" {{ $service->billing_cycle == 'triennially' ? 'selected' : '' }}>Triennially</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $service->description }}</textarea>
            </div>

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Badge Text (Optional)</label>
                    <input type="text" name="badge_text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ $service->badge_text }}" placeholder="e.g. Popular, Best Value, Save 50%...">
                    <p class="mt-1 text-xs text-gray-500">Leaving this empty will hide the highlight badge.</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Plan Features (One per line)</label>
                <textarea name="features" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $service->features }}</textarea>
                <p class="mt-1 text-xs text-gray-500">These will show as ✅ bullet points in the pricing table.</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Display Order</label>
                    <input type="number" name="order" value="{{ $service->order }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center pt-8">
                    <input type="checkbox" name="is_active" id="is_active" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" {{ $service->is_active ? 'checked' : '' }}>
                    <label for="is_active" class="ml-2 block text-sm text-gray-900 font-bold">Active and visible</label>
                </div>
            </div>
        </div>

        <div class="mt-8 flex gap-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
                Update Service
            </button>
            <a href="{{ route('admin.services.index') }}" class="px-6 py-2 bg-gray-100 text-gray-600 font-bold rounded-lg hover:bg-gray-200 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
