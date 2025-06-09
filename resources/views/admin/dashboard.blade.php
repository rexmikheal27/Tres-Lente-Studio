<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard - Tres Lente Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <style>
        .font-logo {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white min-h-screen">
            <div class="p-6">
                <h1 class="text-2xl font-logo mb-2">{{ $user->name ?? 'Tres Lente Studio' }}</h1>
                <p class="text-sm text-gray-400">Administrator</p>
            </div>
            
            <nav class="mt-6">
                <a href="{{ route('dashboard') }}" class="block px-6 py-3 bg-gray-700 text-white hover:bg-gray-600 transition">
                    <i class="ri-dashboard-line mr-3"></i>Dashboard
                </a>
                <a href="{{ route('service-management') }}" class="block px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="ri-service-line mr-3"></i>Service Management
                </a>
                <a href="{{ route('client-management') }}" class="block px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="ri-user-line mr-3"></i>Client Management
                </a>
                <a href="{{ route('inquiry-management') }}" class="block px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="ri-message-3-line mr-3"></i>Client Inquiry Management
                </a>
                <form method="POST" action="{{ route('logout.user') }}" class="mt-auto">
                    @csrf
                    <button type="submit" class="block w-full text-left px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                        <i class="ri-logout-box-line mr-3"></i>Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 bg-gray-100">
            <header class="bg-white shadow-sm px-8 py-6">
                <h2 class="text-3xl font-semibold text-gray-800">Admin Dashboard</h2>
            </header>

            <div class="p-8">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Total Services Card -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Services</h3>
                        <p class="text-4xl font-bold text-gray-900 mb-2">{{ $totalServices ?? 0 }}</p>
                        <a href="{{ route('service-management') }}" class="text-red-500 hover:text-red-600 text-sm font-medium">View All</a>
                    </div>

                    <!-- Pending Inquiries Card -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Pending Inquiries</h3>
                        <p class="text-4xl font-bold text-gray-900 mb-2">{{ $pendingInquiries ?? 0 }}</p>
                        <a href="#" class="text-red-500 hover:text-red-600 text-sm font-medium">Review</a>
                    </div>

                    <!-- Total Clients Card -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Clients</h3>
                        <p class="text-4xl font-bold text-gray-900 mb-2">{{ $totalClients ?? 0 }}</p>
                        <a href="{{ route('client-management') }}" class="text-red-500 hover:text-red-600 text-sm font-medium">Manage Clients</a>
                    </div>
                </div>

                <!-- Recent Inquiries Section -->
                <div class="bg-white rounded-lg shadow">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-800">Recent Inquiries</h3>
                    </div>
                    <div class="p-6">
                        @if(isset($recentInquiries) && count($recentInquiries) > 0)
                            <div class="space-y-4">
                                @foreach($recentInquiries as $inquiry)
                                    <div class="flex items-start space-x-3 p-4 hover:bg-gray-50 rounded-lg transition">
                                        <i class="ri-message-3-fill text-gray-400 text-xl mt-1"></i>
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900">
                                                {{ $inquiry->client->first_name }} {{ $inquiry->client->last_name }}
                                            </h4>
                                            <p class="text-sm text-gray-600 mt-1">
                                                Service: {{ $inquiry->serviceCategory->name ?? 'Not specified' }}
                                                <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                    @if($inquiry->status == 'new') bg-blue-100 text-blue-800
                                                    @elseif($inquiry->status == 'contacted') bg-yellow-100 text-yellow-800
                                                    @elseif($inquiry->status == 'quoted') bg-purple-100 text-purple-800
                                                    @elseif($inquiry->status == 'booked') bg-green-100 text-green-800
                                                    @else bg-gray-100 text-gray-800
                                                    @endif">
                                                    {{ strtoupper($inquiry->status) }}
                                                </span>
                                            </p>
                                            <p class="text-sm text-gray-500 mt-1">{{ $inquiry->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 text-center py-8">No recent inquiries</p>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>