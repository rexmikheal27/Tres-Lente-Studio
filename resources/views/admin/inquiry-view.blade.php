<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>View Inquiry - Tres Lente Studio</title>
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
    @if($errors->any())
        <div class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded z-50">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- View/Update Modal (Always Visible) -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-2/3 max-w-3xl shadow-lg rounded-md bg-white">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Inquiry Details</h3>
            
            <!-- Client Information -->
            <div class="mb-6 bg-gray-50 p-4 rounded">
                <h4 class="font-semibold text-gray-700 mb-2">Client Information</h4>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <span class="text-sm text-gray-500">Name:</span>
                        <p class="font-medium">{{ $inquiry->client->first_name }} {{ $inquiry->client->last_name }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Email:</span>
                        <p class="font-medium">{{ $inquiry->client->email }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Phone:</span>
                        <p class="font-medium">{{ $inquiry->client->phone ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Service Category:</span>
                        <p class="font-medium">{{ $inquiry->serviceCategory->name ?? 'Not specified' }}</p>
                    </div>
                </div>
            </div>

            <!-- Message -->
            <div class="mb-6">
                <h4 class="font-semibold text-gray-700 mb-2">Client Message</h4>
                <div class="bg-gray-50 p-4 rounded">
                    <p class="text-gray-700 whitespace-pre-wrap">{{ $inquiry->message }}</p>
                </div>
                <p class="text-xs text-gray-500 mt-1">Submitted on: {{ $inquiry->created_at->format('M d, Y h:i A') }}</p>
            </div>

            <!-- Update Form -->
            <form action="{{ route('inquiries.update', $inquiry->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                        Update Status
                    </label>
                    <select name="status" id="status" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="new" {{ $inquiry->status == 'new' ? 'selected' : '' }}>New</option>
                        <option value="contacted" {{ $inquiry->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="quoted" {{ $inquiry->status == 'quoted' ? 'selected' : '' }}>Quoted</option>
                        <option value="booked" {{ $inquiry->status == 'booked' ? 'selected' : '' }}>Booked</option>
                        <option value="closed" {{ $inquiry->status == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="admin_notes">
                        Admin Notes (Internal Use Only)
                    </label>
                    <textarea name="admin_notes" id="admin_notes" rows="3"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Add any internal notes about this inquiry...">{{ old('admin_notes', $inquiry->admin_notes) }}</textarea>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Update Status
                    </button>
                    <a href="{{ route('inquiry-management') }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Close
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>