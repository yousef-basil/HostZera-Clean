@extends('back.layout')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center">
        <div class="p-4 bg-blue-100 text-blue-600 rounded-lg mr-4">
            <i class="fas fa-users fa-2x"></i>
        </div>
        <div>
            <div class="text-gray-500 text-sm">Total Users</div>
            <div class="text-2xl font-bold">{{ \App\Models\User::count() }}</div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center">
        <div class="p-4 bg-green-100 text-green-600 rounded-lg mr-4">
            <i class="fas fa-server fa-2x"></i>
        </div>
        <div>
            <div class="text-gray-500 text-sm">Total Services</div>
            <div class="text-2xl font-bold">{{ \App\Models\Service::count() }}</div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center">
        <div class="p-4 bg-purple-100 text-purple-600 rounded-lg mr-4">
            <i class="fas fa-tags fa-2x"></i>
        </div>
        <div>
            <div class="text-gray-500 text-sm">Active Categories</div>
            <div class="text-2xl font-bold">{{ \App\Models\ServiceCategory::count() }}</div>
        </div>
    </div>
</div>

<div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
    <h3 class="text-lg font-bold mb-4 text-gray-800">Quick Actions</h3>
    <div class="flex gap-4">
        <a href="{{ route('back.services.create') }}" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">
            Add New Service
        </a>
        <a href="{{ route('back.users.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 font-bold rounded-lg hover:bg-gray-200 transition">
            Manage Users
        </a>
    </div>
</div>
@endsection
