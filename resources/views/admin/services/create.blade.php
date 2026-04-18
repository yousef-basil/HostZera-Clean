@extends('admin.layout')

@section('title', 'Add New Service')

@section('content')
<div class="max-w-2xl bg-white rounded-xl shadow-sm border border-gray-100 p-8">
    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Service Name</label>
                <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Category</label>
                    <select name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">WHMCS Product ID (Optional)</label>
                    <input type="number" name="whmcs_product_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Price ($)</label>
                    <input type="number" step="0.01" name="price" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" value="0.00" required>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Billing Cycle</label>
                    <select name="billing_cycle" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        <option value="monthly">Monthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="semi-annually">Semi-Annually</option>
                        <option value="annually">Annually</option>
                        <option value="biennially">Biennially</option>
                        <option value="triennially">Triennially</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="Short internal note or description..."></textarea>
            </div>

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Badge Text (Optional)</label>
                    <input type="text" name="badge_text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="e.g. Popular, Best Value, Save 50%...">
                    <p class="mt-1 text-xs text-gray-500">Leaving this empty will hide the highlight badge.</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Plan Features (One per line)</label>
                <textarea name="features" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" placeholder="1 Website&#10;10 GB SSD&#10;Free SSL Certificate&#10;Daily Backups"></textarea>
                <p class="mt-1 text-xs text-gray-500">These will show as ✅ bullet points in the pricing table.</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Display Order</label>
                    <input type="number" name="order" value="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center pt-8">
                    <input type="checkbox" name="is_active" id="is_active" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" checked>
                    <label for="is_active" class="ml-2 block text-sm text-gray-900 font-bold">Active and visible</label>
                </div>
            </div>
        </div>

        <div class="mt-8 flex gap-4">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
                Create Service
            </button>
            <a href="{{ route('admin.services.index') }}" class="px-6 py-2 bg-gray-100 text-gray-600 font-bold rounded-lg hover:bg-gray-200 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
