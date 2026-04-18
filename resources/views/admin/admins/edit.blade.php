@extends('admin.layout')

@section('title', 'Edit Admin: ' . $admin->name)

@section('content')
<div class="max-w-lg mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.admins.index') }}" class="text-blue-500 hover:underline text-sm">
            <i class="fas fa-arrow-left mr-1"></i> Back to Admins
        </a>
        <h1 class="text-2xl font-bold text-gray-800 mt-2">Edit Admin Details</h1>
        <p class="text-sm text-gray-500">Update account information for {{ $admin->email }}</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-8">
        <form action="{{ route('admin.admins.update', $admin) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Full Name</label>
                <input type="text" name="name" value="{{ old('name', $admin->name) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-400 @enderror"
                       placeholder="e.g. John Doe">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $admin->email) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') border-red-400 @enderror"
                       placeholder="admin@hostzera.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 border-t border-gray-100">
                <label class="block text-sm font-semibold text-gray-700 mb-1">New Password (Optional)</label>
                <p class="text-xs text-gray-500 mb-2">Leave blank if you don't want to change the password.</p>
                <input type="password" name="password"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-400 @enderror"
                       placeholder="Minimum 8 characters">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Confirm New Password</label>
                <input type="password" name="password_confirmation"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Repeat new password">
            </div>

            <div class="pt-4">
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition">
                    <i class="fas fa-save mr-2"></i> Update Admin Account
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
