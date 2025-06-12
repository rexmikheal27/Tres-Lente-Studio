<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Service Management - Tres Lente Studio</title>    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            font-weight: 300;
        }

        .font-logo {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 700;
        }
    </style>
</head>
<body class="bg-[#F5F5F5] min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#2D2D2D] text-white min-h-screen">            <div class="p-6">
                <h1 class="text-2xl font-logo mb-2">{{ $user->name ?? 'Tres Lente Studio' }}</h1>
                <p class="text-sm text-gray-400 font-light">Administrator</p>
            </div>
            
            <nav class="mt-6">
                <a href="{{ route('dashboard') }}" class="block px-6 py-3 text-[#E0E0E0] hover:bg-[#A8B2C1]/10 hover:text-white transition-all duration-200">
                    <i class="ri-dashboard-line mr-3"></i>Dashboard
                </a>
                <a href="{{ route('service-management') }}" class="block px-6 py-3 bg-[#A8B2C1]/20 text-white hover:bg-[#A8B2C1]/30 transition-all duration-200">
                    <i class="ri-service-line mr-3"></i>Service Management
                </a>
                <a href="{{ route('client-management') }}" class="block px-6 py-3 text-[#E0E0E0] hover:bg-[#A8B2C1]/10 hover:text-white transition-all duration-200">
                    <i class="ri-user-line mr-3"></i>Client Management
                </a>
                <a href="{{ route('inquiry-management') }}" class="block px-6 py-3 text-[#E0E0E0] hover:bg-[#A8B2C1]/10 hover:text-white transition-all duration-200">
                    <i class="ri-message-3-line mr-3"></i>Client Inquiry Management
                </a>
                <form method="POST" action="{{ route('logout.user') }}" class="mt-auto">
                    @csrf
                    <button type="submit" class="block w-full text-left px-6 py-3 text-[#E0E0E0] hover:bg-[#A8B2C1]/10 hover:text-white transition-all duration-200">
                        <i class="ri-logout-box-line mr-3"></i>Logout
                    </button>
                </form>
            </nav>
        </aside>        <!-- Main Content -->
        <main class="flex-1 bg-[#F5F5F5]">
            <header class="bg-white shadow-sm px-8 py-6 flex justify-between items-center">
                <h2 class="text-3xl font-logo text-[#2D2D2D]">Service Categories Management</h2>
                <a href="{{ route('service-categories.create') }}" 
                   class="bg-[#A8B2C1] hover:bg-[#8C98A9] text-white px-6 py-2 rounded-lg font-medium transition-colors duration-200 flex items-center">
                    <i class="ri-add-line mr-2"></i>Add New Service
                </a>
            </header>

            <div class="p-8">
                @if(session('success'))
                    <div class="bg-emerald-50 border-l-4 border-emerald-400 p-4 mb-6 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <i class="ri-checkbox-circle-line text-emerald-400 mr-2"></i>
                            <p class="text-emerald-700">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif                <!-- Services Table -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-[#2D2D2D]/5 border-b border-[#2D2D2D]/10">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Name</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Type</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-[#2D2D2D]/10">
                            @forelse($services as $service)
                                <tr class="hover:bg-[#F5F5F5] transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-[#2D2D2D]">{{ $service->name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-medium rounded-full shadow-sm
                                            {{ $service->type == 'photo' ? 'bg-[#A8B2C1] text-white' : 'bg-[#8C98A9] text-white' }}">
                                            {{ ucfirst($service->type) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-medium rounded-full shadow-sm
                                            {{ $service->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
                                            {{ $service->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('service-categories.edit', $service->id) }}" 
                                           class="text-[#A8B2C1] hover:text-[#8C98A9] transition-colors duration-200 mr-3">
                                            <i class="ri-edit-line"></i> Edit
                                        </a>
                                        <form action="{{ route('service-categories.destroy', $service->id) }}" method="POST" class="inline" 
                                              onsubmit="return confirm('Are you sure you want to delete this service?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-700 transition-colors duration-200">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-[#5A5A5A]">
                                        No service categories found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>