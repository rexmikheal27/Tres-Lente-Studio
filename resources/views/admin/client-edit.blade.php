<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Client - Tres Lente Studio</title>
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
<body class="bg-[#FFFFFF] text-[#5A5A5A] min-h-screen">
    @if($errors->any())
        <div class="fixed top-4 right-4 bg-red-50 border-l-4 border-red-400 p-4 rounded shadow-lg z-50">
            <div class="flex items-center mb-2">
                <i class="ri-error-warning-fill text-red-400 mr-2"></i>
                <p class="font-medium text-red-800">Please fix the following errors:</p>
            </div>
            <ul class="list-disc list-inside text-red-700 text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif    <!-- Edit Modal (Always Visible) -->
    <div class="fixed inset-0 bg-[#2D2D2D]/40 backdrop-blur-sm overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-8 w-[32rem] shadow-xl rounded-lg bg-[#F5F5F5]">
            <h3 class="text-3xl font-logo font-bold text-[#2D2D2D] mb-6">Edit Client</h3>
            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-6">
                    <label class="block text-[#2D2D2D] text-sm font-medium mb-2" for="first_name">
                        First Name
                    </label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $client->first_name) }}" required maxlength="50"
                        class="w-full bg-white/50 border border-[#2D2D2D]/20 px-4 py-2 text-[#2D2D2D] rounded focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
                </div>

                <div class="mb-6">
                    <label class="block text-[#2D2D2D] text-sm font-medium mb-2" for="last_name">
                        Last Name
                    </label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $client->last_name) }}" required maxlength="50"
                        class="w-full bg-white/50 border border-[#2D2D2D]/20 px-4 py-2 text-[#2D2D2D] rounded focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
                </div>

                <div class="mb-6">
                    <label class="block text-[#2D2D2D] text-sm font-medium mb-2" for="email">
                        Email
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email', $client->email) }}" required maxlength="100"
                        class="w-full bg-white/50 border border-[#2D2D2D]/20 px-4 py-2 text-[#2D2D2D] rounded focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
                </div>

                <div class="mb-8">
                    <label class="block text-[#2D2D2D] text-sm font-medium mb-2" for="phone">
                        Phone (Optional)
                    </label>
                    <input type="tel" name="phone" id="phone" value="{{ old('phone', $client->phone) }}" maxlength="20"
                        class="w-full bg-white/50 border border-[#2D2D2D]/20 px-4 py-2 text-[#2D2D2D] rounded focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
                </div>

                <div class="flex items-center justify-between gap-4">
                    <button type="submit"
                        class="flex-1 bg-[#A8B2C1] hover:bg-[#8c98a9] text-white font-bold py-3 rounded shadow-md hover:shadow-lg transition duration-300">
                        Save Changes
                    </button>
                    <a href="{{ route('client-management') }}"
                        class="flex-1 bg-[#2D2D2D]/10 hover:bg-[#2D2D2D]/20 text-[#2D2D2D] font-bold py-3 rounded shadow-md hover:shadow-lg transition duration-300 text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>