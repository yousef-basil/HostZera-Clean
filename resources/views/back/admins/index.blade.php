@extends('back.layout')

@section('title', 'Manage Admins')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Manage Admins</h1>
        <p class="text-sm text-gray-500 mt-1">Super Admin only — create and manage admin accounts.</p>
    </div>
    <a href="{{ route('back.admins.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition font-medium">
        <i class="fas fa-plus mr-2"></i> Add New Admin
    </a>
</div>

@if(session('error'))
    <div class="mb-4 px-4 py-3 bg-red-100 border border-red-400 text-red-700 rounded-lg">
        {{ session('error') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="text-left px-6 py-4 text-gray-600 font-semibold">ID</th>
                <th class="text-left px-6 py-4 text-gray-600 font-semibold">Name</th>
                <th class="text-left px-6 py-4 text-gray-600 font-semibold">Email</th>
                <th class="text-left px-6 py-4 text-gray-600 font-semibold">Role</th>
                <th class="text-left px-6 py-4 text-gray-600 font-semibold">Created At</th>
                <th class="text-left px-6 py-4 text-gray-600 font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($admins as $admin)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-gray-500 font-mono">{{ $admin->id }}</td>
                <td class="px-6 py-4 font-semibold text-gray-800">{{ $admin->name }}</td>
                <td class="px-6 py-4 text-blue-600">{{ $admin->email }}</td>
                <td class="px-6 py-4">
                    @if($admin->is_super_admin)
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-700">
                            <i class="fas fa-crown mr-1"></i> Super Admin
                        </span>
                    @else
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                            Admin
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4 text-gray-500">{{ $admin->created_at->format('M d, Y') }}</td>
                <td class="px-6 py-4 flex items-center space-x-3">
                    @if($admin->id !== auth()->guard('admin')->id() || $admin->is_super_admin)
                        <a href="{{ route('back.admins.edit', $admin) }}"
                           class="text-blue-500 hover:text-blue-700 transition font-medium text-xs">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                    @endif

                    @if(!$admin->is_super_admin && $admin->id !== auth()->guard('admin')->id())
                        <form action="{{ route('back.admins.destroy', $admin) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this admin?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-500 hover:text-red-700 transition font-medium text-xs">
                                <i class="fas fa-trash mr-1"></i> Delete
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
