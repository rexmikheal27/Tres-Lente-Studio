@php
use Illuminate\Support\Str;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Client Inquiry Management - Tres Lente Studio</title>
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
        }        .status-new {
            background-color: rgb(168, 178, 193);
            color: white;
        }
        
        .status-contacted {
            background-color: rgb(255, 184, 0);
            color: white;
        }
        
        .status-quoted {
            background-color: rgb(109, 40, 217);
            color: white;
        }
        
        .status-booked {
            background-color: rgb(52, 211, 153);
            color: white;
        }
        
        .status-closed {
            background-color: rgb(203, 213, 225);
            color: rgb(71, 85, 105);
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
                <a href="{{ route('client-management') }}" class="block px-6 py-3 text-[#E0E0E0] hover:bg-[#A8B2C1]/10 hover:text-white transition-all duration-200">
                    <i class="ri-user-line mr-3"></i>Client Management
                </a>
                <a href="{{ route('inquiry-management') }}" class="block px-6 py-3 bg-[#A8B2C1]/20 text-white hover:bg-[#A8B2C1]/30 transition-all duration-200">
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
            <header class="bg-white shadow-sm px-8 py-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-3xl font-logo text-[#2D2D2D]">Client Inquiry Management</h2>
                    <div class="flex items-center space-x-4">
                        <!-- Status Filter -->
                        <form method="GET" action="{{ route('inquiry-management') }}" class="flex items-center space-x-2">
                            <select name="status" onchange="this.form.submit()" 
                                class="px-4 py-2 bg-white/50 border border-[#2D2D2D]/20 rounded-lg text-[#2D2D2D] focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
                                <option value="">All Status</option>
                                <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                                <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>Contacted</option>
                                <option value="quoted" {{ request('status') == 'quoted' ? 'selected' : '' }}>Quoted</option>
                                <option value="booked" {{ request('status') == 'booked' ? 'selected' : '' }}>Booked</option>
                                <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </form>
                    </div>
                </div>
            </header>

            <div class="p-8">
                @if(session('success'))
                    <div class="bg-emerald-50 border-l-4 border-emerald-400 p-4 mb-4 rounded shadow-sm">
                        <div class="flex items-center">
                            <i class="ri-checkbox-circle-line text-emerald-400 mr-2"></i>
                            <p class="text-emerald-700">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif                <!-- Inquiries Table -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-[#2D2D2D]/5 border-b border-[#2D2D2D]/10">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Client</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Service</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Message</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Date</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-[#2D2D2D] uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-[#2D2D2D]/10">
                            @forelse($inquiries as $inquiry)
                                <tr class="hover:bg-[#F5F5F5] transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-[#2D2D2D]">
                                            {{ $inquiry->client->first_name }} {{ $inquiry->client->last_name }}
                                        </div>
                                        <div class="text-sm text-[#5A5A5A]">{{ $inquiry->client->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-[#2D2D2D]">
                                            {{ $inquiry->serviceCategory->name ?? 'Not specified' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-[#2D2D2D] max-w-xs truncate" title="{{ $inquiry->message }}">
                                            {{ Str::limit($inquiry->message, 50) }}
                                        </div>
                                    </td>                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-medium rounded-full shadow-sm
                                            @if($inquiry->status == 'new') status-new
                                            @elseif($inquiry->status == 'contacted') status-contacted
                                            @elseif($inquiry->status == 'quoted') status-quoted
                                            @elseif($inquiry->status == 'booked') status-booked
                                            @else status-closed
                                            @endif">
                                            {{ ucfirst($inquiry->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $inquiry->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">                                        <a href="{{ route('inquiries.view', $inquiry->id) }}" 
                                            class="text-[#A8B2C1] hover:text-[#8C98A9] transition-colors duration-200 mr-3">
                                            <i class="ri-eye-line"></i> View
                                        </a>
                                        <form action="{{ route('inquiries.destroy', $inquiry->id) }}" method="POST" class="inline" 
                                            onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-[#EF4444] hover:text-[#DC2626] transition-colors duration-200">
                                                <i class="ri-delete-bin-line"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                        No inquiries found.
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