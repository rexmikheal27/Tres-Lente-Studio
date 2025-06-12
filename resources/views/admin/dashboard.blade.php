<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard - Tres Lente Studio</title>
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
                <a href="{{ route('dashboard') }}" class="block px-6 py-3 bg-[#A8B2C1]/20 text-white hover:bg-[#A8B2C1]/30 transition-all duration-200">
                    <i class="ri-dashboard-line mr-3"></i>Dashboard
                </a>
                <a href="{{ route('service-management') }}" class="block px-6 py-3 text-[#E0E0E0] hover:bg-[#A8B2C1]/10 hover:text-white transition-all duration-200">
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
            <header class="bg-white shadow-sm px-8 py-6">
                <h2 class="text-3xl font-logo text-[#2D2D2D]">Admin Dashboard</h2>
            </header>

            <div class="p-8">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Total Services Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                        <h3 class="text-lg font-medium text-[#2D2D2D] mb-2">Total Services</h3>
                        <p class="text-4xl font-logo font-bold text-[#2D2D2D] mb-2">{{ $totalServices ?? 0 }}</p>
                        <a href="{{ route('service-management') }}" class="text-[#A8B2C1] hover:text-[#8c98a9] text-sm font-medium transition duration-200">View All</a>
                    </div>

                    <!-- Pending Inquiries Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                        <h3 class="text-lg font-medium text-[#2D2D2D] mb-2">Pending Inquiries</h3>
                        <p class="text-4xl font-logo font-bold text-[#2D2D2D] mb-2">{{ $pendingInquiries ?? 0 }}</p>
                        <a href="{{ route('inquiry-management', ['status' => 'new']) }}" class="text-[#A8B2C1] hover:text-[#8c98a9] text-sm font-medium transition duration-200">Review</a>
                    </div>

                    <!-- Total Clients Card -->
                    <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                        <h3 class="text-lg font-medium text-[#2D2D2D] mb-2">Total Clients</h3>
                        <p class="text-4xl font-logo font-bold text-[#2D2D2D] mb-2">{{ $totalClients ?? 0 }}</p>
                        <a href="{{ route('client-management') }}" class="text-[#A8B2C1] hover:text-[#8c98a9] text-sm font-medium transition duration-200">Manage Clients</a>
                    </div>
                </div>                <!-- Recent Inquiries Section -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="px-6 py-4 border-b border-[#2D2D2D]/10">
                        <h3 class="text-xl font-logo text-[#2D2D2D]">Recent Inquiries</h3>
                    </div>
                    <div class="p-6">
                        @if(isset($recentInquiries) && count($recentInquiries) > 0)
                            <div class="space-y-4">
                                @foreach($recentInquiries as $inquiry)
                                    <div class="flex items-start space-x-3 p-4 hover:bg-[#F5F5F5] rounded-lg transition-all duration-200">
                                        <i class="ri-message-3-fill text-[#A8B2C1] text-xl mt-1"></i>
                                        <div class="flex-1">
                                            <h4 class="font-medium text-[#2D2D2D]">
                                                {{ $inquiry->client->first_name }} {{ $inquiry->client->last_name }}
                                            </h4>
                                            <p class="text-sm text-[#5A5A5A] mt-1">
                                                Service: {{ $inquiry->serviceCategory->name ?? 'Not specified' }}
                                                <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                    @if($inquiry->status == 'new') bg-[#A8B2C1]/20 text-[#2D2D2D]
                                                    @elseif($inquiry->status == 'contacted') bg-amber-100 text-amber-700
                                                    @elseif($inquiry->status == 'quoted') bg-violet-100 text-violet-700
                                                    @elseif($inquiry->status == 'booked') bg-emerald-100 text-emerald-700
                                                    @else bg-[#2D2D2D]/10 text-[#2D2D2D]
                                                    @endif">
                                                    {{ strtoupper($inquiry->status) }}
                                                </span>
                                            </p>
                                            <p class="text-sm text-[#5A5A5A] mt-1">{{ $inquiry->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-[#5A5A5A] text-center py-8">No recent inquiries</p>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>