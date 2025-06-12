<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Client Management - Tres Lente Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet" />
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
<body class="bg-[#FFFFFF] min-h-screen">
    <div class="flex">        <!-- Sidebar -->
        <aside class="w-64 bg-[#2D2D2D] text-white min-h-screen">
            <div class="p-6">
                <h1 class="text-2xl font-logo mb-2">{{ $user->name ?? 'Tres Lente Studio' }}</h1>
                <p class="text-sm text-gray-400 font-light">Administrator</p>
            </div>
            
            <nav class="mt-6">
                <a href="{{ route('dashboard') }}" class="block px-6 py-3 text-[#E0E0E0] hover:bg-[#A8B2C1]/10 hover:text-white transition-all duration-200">
                    <i class="ri-dashboard-line mr-3"></i>Dashboard
                </a>
                <a href="{{ route('service-management') }}" class="block px-6 py-3 text-[#E0E0E0] hover:bg-[#A8B2C1]/10 hover:text-white transition-all duration-200">
                    <i class="ri-service-line mr-3"></i>Service Management
                </a>
                <a href="{{ route('client-management') }}" class="block px-6 py-3 bg-[#A8B2C1]/20 text-white hover:bg-[#A8B2C1]/30 transition-all duration-200">
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
                <h2 class="text-3xl font-logo text-[#2D2D2D]">Client Management</h2>
                <a href="{{ route('clients.create') }}" class="bg-[#A8B2C1] hover:bg-[#8c98a9] text-white px-6 py-2.5 rounded shadow-md hover:shadow-lg transition duration-300">
                    <i class="ri-add-line mr-2"></i>Add New Client
                </a>
            </header>

            <div class="p-8">
                @if(session('success'))
                    <div class="bg-emerald-50 border-l-4 border-emerald-400 p-4 mb-4 rounded shadow-sm">
                        <div class="flex items-center">
                            <i class="ri-checkbox-circle-line text-emerald-400 mr-2"></i>
                            <p class="text-emerald-700">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-4 rounded shadow-sm">
                        <div class="flex items-center">
                            <i class="ri-error-warning-line text-red-400 mr-2"></i>
                            <p class="text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif                <!-- Clients Table -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-[#2D2D2D]/5 border-b border-[#2D2D2D]/10">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Name</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Phone</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Inquiries</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Joined</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-[#2D2D2D]/10">
                            @forelse($clients as $client)
                                <tr class="hover:bg-[#F5F5F5] transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-[#2D2D2D]">
                                            {{ $client->first_name }} {{ $client->last_name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-[#5A5A5A]">{{ $client->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-[#5A5A5A]">{{ $client->phone ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-medium rounded-full bg-[#A8B2C1]/10 text-[#2D2D2D]">
                                            {{ $client->inquiries_count ?? 0 }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#5A5A5A]">
                                        {{ $client->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                                        <a href="{{ route('clients.edit', $client->id) }}" class="text-[#A8B2C1] hover:text-[#8c98a9] transition duration-150 inline-flex items-center">
                                            <i class="ri-edit-line mr-1"></i> Edit
                                        </a>
                                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline-flex items-center" onsubmit="return confirm('Are you sure? This will also delete all inquiries from this client.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-400 hover:text-red-600 transition duration-150">
                                                <i class="ri-delete-bin-line mr-1"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-[#5A5A5A]">
                                        No clients found.
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