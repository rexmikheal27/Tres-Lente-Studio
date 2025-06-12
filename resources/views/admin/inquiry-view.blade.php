<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>View Inquiry - Tres Lente Studio</title>    <script src="https://cdn.tailwindcss.com"></script>
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
        
        .status-new {
            background-color: rgb(168, 178, 193);
            color: white;
        }
        
        .status-contacted {
            background-color: rgb(255, 184, 0);
            color: white;
        }
        
        .status-quoted {
            background-color: rgb(140, 152, 169);
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
<body class="bg-[#F5F5F5] min-h-screen">    @if($errors->any())
        <div class="fixed top-4 right-4 bg-red-50 border-l-4 border-red-400 p-4 rounded shadow-sm z-50">
            <div class="flex items-center">
                <i class="ri-error-warning-line text-red-400 mr-2"></i>
                <ul class="text-red-700">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <!-- View/Update Modal (Always Visible) -->    <div class="fixed inset-0 bg-[#2D2D2D]/50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-8 w-2/3 max-w-3xl shadow-lg rounded-lg bg-white">
            <h3 class="text-2xl font-logo text-[#2D2D2D] mb-6">Inquiry Details</h3>
            
            <!-- Client Information -->
            <div class="mb-8 bg-[#F5F5F5] p-6 rounded-lg">
                <h4 class="text-lg font-medium text-[#2D2D2D] mb-4">Client Information</h4>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <span class="text-sm text-[#5A5A5A]">Name:</span>
                        <p class="font-medium text-[#2D2D2D]">{{ $inquiry->client->first_name }} {{ $inquiry->client->last_name }}</p>
                    </div>                    <div>
                        <span class="text-sm text-[#5A5A5A]">Email:</span>
                        <p class="font-medium text-[#2D2D2D]">{{ $inquiry->client->email }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-[#5A5A5A]">Phone:</span>
                        <p class="font-medium text-[#2D2D2D]">{{ $inquiry->client->phone ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-[#5A5A5A]">Service Category:</span>
                        <p class="font-medium text-[#2D2D2D]">{{ $inquiry->serviceCategory->name ?? 'Not specified' }}</p>
                    </div>
                </div>
            </div>            <!-- Message -->
            <div class="mb-8">
                <h4 class="text-lg font-medium text-[#2D2D2D] mb-4">Client Message</h4>
                <div class="bg-[#F5F5F5] p-6 rounded-lg">
                    <p class="text-[#2D2D2D] whitespace-pre-wrap">{{ $inquiry->message }}</p>
                </div>
                <p class="text-xs text-[#5A5A5A] mt-2">Submitted on: {{ $inquiry->created_at->format('M d, Y h:i A') }}</p>
            </div>

            <!-- Update Form -->
            <form action="{{ route('inquiries.update', $inquiry->id) }}" method="POST">
                @csrf
                @method('PUT')                <div class="mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <label class="block text-[#2D2D2D] text-sm font-medium" for="status">
                            Update Status
                        </label>
                        <span class="px-3 py-1 text-xs leading-5 font-medium rounded-full shadow-sm
                            @if($inquiry->status == 'new') status-new
                            @elseif($inquiry->status == 'contacted') status-contacted
                            @elseif($inquiry->status == 'quoted') status-quoted
                            @elseif($inquiry->status == 'booked') status-booked
                            @else status-closed
                            @endif">
                            Current: {{ ucfirst($inquiry->status) }}
                        </span>
                    </div>
                    <select name="status" id="status" required
                        class="w-full px-4 py-2 bg-white/50 border border-[#2D2D2D]/20 rounded-lg text-[#2D2D2D] focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
                        <option value="new" {{ $inquiry->status == 'new' ? 'selected' : '' }}>New</option>
                        <option value="contacted" {{ $inquiry->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="quoted" {{ $inquiry->status == 'quoted' ? 'selected' : '' }}>Quoted</option>
                        <option value="booked" {{ $inquiry->status == 'booked' ? 'selected' : '' }}>Booked</option>
                        <option value="closed" {{ $inquiry->status == 'closed' ? 'selected' : '' }}>Closed</option>
                    </select>
                </div>

                <div class="mb-8">
                    <label class="block text-[#2D2D2D] text-sm font-medium mb-2" for="admin_notes">
                        Admin Notes (Internal Use Only)
                    </label>
                    <textarea name="admin_notes" id="admin_notes" rows="3"
                        class="w-full px-4 py-2 bg-white/50 border border-[#2D2D2D]/20 rounded-lg text-[#2D2D2D] focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition"
                        placeholder="Add any internal notes about this inquiry...">{{ old('admin_notes', $inquiry->admin_notes) }}</textarea>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-[#A8B2C1] hover:bg-[#8C98A9] text-white font-medium py-2 px-6 rounded-lg transition-colors duration-200">
                        Update Status
                    </button>
                    <a href="{{ route('inquiry-management') }}"
                        class="bg-[#2D2D2D]/10 hover:bg-[#2D2D2D]/20 text-[#2D2D2D] font-medium py-2 px-6 rounded-lg transition-colors duration-200">
                        Close
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>