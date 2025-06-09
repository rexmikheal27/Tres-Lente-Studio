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
                <a href="{{ route('dashboard') }}" class="block px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="ri-dashboard-line mr-3"></i>Dashboard
                </a>
                <a href="{{ route('service-management') }}" class="block px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="ri-service-line mr-3"></i>Service Management
                </a>
                <a href="{{ route('client-management') }}" class="block px-6 py-3 text-gray-300 hover:bg-gray-800 hover:text-white transition">
                    <i class="ri-user-line mr-3"></i>Client Management
                </a>
                <a href="{{ route('inquiry-management') }}" class="block px-6 py-3 bg-gray-700 text-white hover:bg-gray-600 transition">
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
                <div class="flex justify-between items-center">
                    <h2 class="text-3xl font-semibold text-gray-800">Client Inquiry Management</h2>
                    <div class="flex items-center space-x-4">
                        <!-- Status Filter -->
                        <form method="GET" action="{{ route('inquiry-management') }}" class="flex items-center space-x-2">
                            <select name="status" onchange="this.form.submit()" 
                                class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
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
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Inquiries Table -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($inquiries as $inquiry)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $inquiry->client->first_name }} {{ $inquiry->client->last_name }}
                                        </div>
                                        <div class="text-sm text-gray-500">{{ $inquiry->client->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $inquiry->serviceCategory->name ?? 'Not specified' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 max-w-xs truncate" title="{{ $inquiry->message }}">
                                            {{ Str::limit($inquiry->message, 50) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            @if($inquiry->status == 'new') bg-blue-100 text-blue-800
                                            @elseif($inquiry->status == 'contacted') bg-yellow-100 text-yellow-800
                                            @elseif($inquiry->status == 'quoted') bg-purple-100 text-purple-800
                                            @elseif($inquiry->status == 'booked') bg-green-100 text-green-800
                                            @else bg-gray-100 text-gray-800
                                            @endif">
                                            {{ ucfirst($inquiry->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $inquiry->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick='openViewModal(@json($inquiry->load(["client", "serviceCategory"])))' 
                                            class="text-blue-600 hover:text-blue-900 mr-3">
                                            <i class="ri-eye-line"></i> View
                                        </button>
                                        <form action="{{ route('inquiries.destroy', $inquiry->id) }}" method="POST" class="inline" 
                                            onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
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

    <!-- View/Update Modal -->
    <div id="inquiryModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-2/3 max-w-3xl shadow-lg rounded-md bg-white">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Inquiry Details</h3>
            
            <!-- Client Information -->
            <div class="mb-6 bg-gray-50 p-4 rounded">
                <h4 class="font-semibold text-gray-700 mb-2">Client Information</h4>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="text-sm text-gray-500">Name:</span>
                        <p id="clientName" class="font-medium"></p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Email:</span>
                        <p id="clientEmail" class="font-medium"></p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Phone:</span>
                        <p id="clientPhone" class="font-medium"></p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Service Category:</span>
                        <p id="serviceCategory" class="font-medium"></p>
                    </div>
                </div>
            </div>

            <!-- Message -->
            <div class="mb-6">
                <h4 class="font-semibold text-gray-700 mb-2">Client Message</h4>
                <div class="bg-gray-50 p-4 rounded">
                    <p id="clientMessage" class="text-gray-700 whitespace-pre-wrap"></p>
                </div>
                <p class="text-xs text-gray-500 mt-1">Submitted on: <span id="submittedDate"></span></p>
            </div>

            <!-- Update Form -->
            <form id="updateForm" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                        Update Status
                    </label>
                    <select name="status" id="status" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="new">New</option>
                        <option value="contacted">Contacted</option>
                        <option value="quoted">Quoted</option>
                        <option value="booked">Booked</option>
                        <option value="closed">Closed</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="admin_notes">
                        Admin Notes (Internal Use Only)
                    </label>
                    <textarea name="admin_notes" id="admin_notes" rows="3"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Add any internal notes about this inquiry..."></textarea>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Status
                    </button>
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openViewModal(inquiry) {
            // Populate client information
            document.getElementById('clientName').textContent = inquiry.client.first_name + ' ' + inquiry.client.last_name;
            document.getElementById('clientEmail').textContent = inquiry.client.email;
            document.getElementById('clientPhone').textContent = inquiry.client.phone || 'Not provided';
            
            // Access the service category - check both possible property names
            let serviceCategoryName = 'Not specified';
            if (inquiry.service_category && inquiry.service_category.name) {
                serviceCategoryName = inquiry.service_category.name;
            } else if (inquiry.serviceCategory && inquiry.serviceCategory.name) {
                serviceCategoryName = inquiry.serviceCategory.name;
            }
            document.getElementById('serviceCategory').textContent = serviceCategoryName;
            
            // Populate inquiry details
            document.getElementById('clientMessage').textContent = inquiry.message;
            document.getElementById('submittedDate').textContent = new Date(inquiry.created_at).toLocaleString();
            
            // Set form action with correct URL path
            document.getElementById('updateForm').action = `{{ url('/admin/inquiries') }}/${inquiry.id}`;
            document.getElementById('status').value = inquiry.status;
            document.getElementById('admin_notes').value = inquiry.admin_notes || '';
            
            // Show modal
            document.getElementById('inquiryModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('inquiryModal').classList.add('hidden');
        }
    </script>
</body>
</html>