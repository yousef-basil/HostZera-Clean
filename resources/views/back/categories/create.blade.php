@extends('back.layout')

@section('title', 'Add New Category')

@section('content')
<div class="max-w-lg mx-auto">
    <div class="mb-6">
        <a href="{{ route('back.categories.index') }}" class="text-blue-500 hover:underline text-sm font-medium">
            <i class="fas fa-arrow-left mr-1"></i> Back to Categories
        </a>
        <h1 class="text-2xl font-bold text-gray-800 mt-2">Create Service Category</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
        <form action="{{ route('back.categories.store') }}" method="POST" class="space-y-5" enctype="multipart/form-data">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Category Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-400 @enderror"
                       placeholder="e.g. Cloud Hosting">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Menu Description</label>
                <textarea name="description" rows="2"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="e.g. Best for small websites and blogs...">{{ old('description') }}</textarea>
                <p class="mt-1 text-xs text-gray-500">This text appears under the title in the dropdown menu.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Hero Section Description (Inner Page)</label>
                <textarea name="hero_description" rows="3"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="e.g. Run Odoo ERP on dedicated, optimized servers...">{{ old('hero_description') }}</textarea>
                <p class="mt-1 text-xs text-gray-500">This text appears in the large header section of the specific category page.</p>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Highlight Features (One per line)</label>
                <textarea name="features" rows="3"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Best for professional use&#10;99.9% Uptime Guarantee&#10;24/7 Expert Support">{{ old('features') }}</textarea>
                <p class="mt-1 text-xs text-gray-500">These will show as bullet points on the home page.</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 sm:col-span-1">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Choose Icon</label>
                    <div class="grid grid-cols-4 gap-2">
                        @php $icons = ['globe', 'layout', 'server', 'mail', 'terminal', 'box', 'cpu', 'hard-drive', 'database', 'zap', 'package']; @endphp
                        @foreach($icons as $iconKey)
                        <label class="relative cursor-pointer">
                            <input type="radio" name="icon" value="{{ $iconKey }}" class="peer sr-only" {{ old('icon', 'globe') == $iconKey ? 'checked' : '' }}>
                            <div class="flex flex-col items-center justify-center p-2 border border-gray-200 rounded-lg hover:bg-gray-50 peer-checked:border-blue-500 peer-checked:bg-blue-50 peer-checked:text-blue-600 transition-all">
                                <i data-lucide="{{ $iconKey }}" style="width: 20px; height: 20px;" class="mb-1 text-gray-600 peer-checked:text-blue-600"></i>
                                <span class="text-[10px] text-center text-gray-500 peer-checked:text-blue-600 font-medium">{{ ucfirst($iconKey) }}</span>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Or Upload Custom Image</label>
                    <input type="file" name="icon_image" accept="image/*"
                           class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Display Order</label>
                <input type="number" name="order" value="{{ old('order', 0) }}" required min="0"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('order') border-red-400 @enderror">
                @error('order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4">
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition-colors shadow-sm">
                    <i class="fas fa-plus mr-2"></i> Create Category
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
