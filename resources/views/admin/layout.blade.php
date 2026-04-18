<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - HostZera Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold border-b border-gray-800 text-blue-400">
                HostZera Admin
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-blue-400' : '' }}">
                    <i class="fas fa-chart-line mr-2"></i> Dashboard
                </a>
                <a href="{{ route('admin.services.index') }}" class="block px-4 py-2 rounded-lg hover:bg-gray-800 {{ request()->is('admin/services*') ? 'bg-gray-800 text-blue-400' : '' }}">
                    <i class="fas fa-server mr-2"></i> Services
                </a>
                <a href="{{ route('admin.categories.index') }}" class="block px-4 py-2 rounded-lg hover:bg-gray-800 {{ request()->is('admin/categories*') ? 'bg-gray-800 text-yellow-400' : '' }}">
                    <i class="fas fa-tags mr-2"></i> Categories
                </a>
                <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.users.index') ? 'bg-gray-800 text-blue-400' : '' }}">
                    <i class="fas fa-users mr-2"></i> Users
                </a>

                @if(Auth::guard('admin')->user()->is_super_admin)
                <a href="{{ route('admin.admins.index') }}" class="block px-4 py-2 rounded-lg hover:bg-gray-800 {{ request()->is('admin/admins*') ? 'bg-gray-800 text-purple-400' : '' }}">
                    <i class="fas fa-crown mr-2"></i> Manage Admins
                </a>
                @endif
                <form action="{{ route('admin.sync') }}" method="POST" class="pt-4">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 transition">
                        <i class="fas fa-sync mr-2"></i> Manual Sync
                    </button>
                </form>
            </nav>
            <div class="p-4 border-t border-gray-800">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-red-400 hover:text-red-300">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8">
                <h2 class="text-xl font-semibold text-gray-800">@yield('title')</h2>
                <div class="text-sm text-gray-500">
                    Logged in as: {{ Auth::guard('admin')->user()->name }}
                </div>
            </header>

            <div class="p-8">
                @if(session('success'))
                    <div class="mb-6 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
