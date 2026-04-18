@extends('back.layout')

@section('title', 'Manage Users')

@section('content')
<div class="mb-6">
    <p class="text-gray-600">List of all registered users and their synchronization status with WHMCS.</p>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 text-gray-700 font-bold border-b border-gray-100">
            <tr>
                <th class="px-6 py-4">ID</th>
                <th class="px-6 py-4">Name</th>
                <th class="px-6 py-4">Email</th>
                <th class="px-6 py-4">WHMCS Client ID</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">Joined At</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @foreach($users as $user)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 text-gray-500">{{ $user->id }}</td>
                <td class="px-6 py-4 font-semibold text-gray-800">{{ $user->name }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $user->email }}</td>
                <td class="px-6 py-4">
                    @if($user->whmcs_client_id)
                        <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-mono tracking-wider">
                            ID: {{ $user->whmcs_client_id }}
                        </span>
                    @else
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm">
                            Pending Sync
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    @if($user->email_verified_at)
                        <span class="text-green-600 font-semibold italic">Verified</span>
                    @else
                        <span class="text-gray-400 font-semibold italic">Unverified</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-sm text-gray-500">
                    {{ $user->created_at->format('M d, Y') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
