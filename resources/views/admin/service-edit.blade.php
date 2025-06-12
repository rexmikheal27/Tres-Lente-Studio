<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Service - Tres Lente Studio</title>    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-[#F5F5F5] min-h-screen">    @if($errors->any())
        <div class="fixed top-4 right-4 bg-red-50 border-l-4 border-red-400 p-4 rounded-lg shadow-sm z-50">
            <div class="flex flex-col space-y-1">
                @foreach($errors->all() as $error)
                    <div class="flex items-center">
                        <i class="ri-error-warning-line text-red-400 mr-2"></i>
                        <p class="text-red-700 text-sm">{{ $error }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Edit Modal (Always Visible) -->
    <div class="fixed inset-0 bg-[#2D2D2D]/50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-8 w-full max-w-md shadow-lg rounded-lg bg-white">
            <h3 class="text-2xl font-logo text-[#2D2D2D] mb-6">Edit Service</h3>
            <form action="{{ route('service-categories.update', $service->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-sm font-medium text-[#2D2D2D] mb-2" for="name">
                        Service Name
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" required maxlength="100"
                        class="w-full px-4 py-2 bg-white/50 border border-[#2D2D2D]/20 rounded-lg text-[#2D2D2D] focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#2D2D2D] mb-2" for="type">
                        Type
                    </label>
                    <select name="type" id="type" required
                        class="w-full px-4 py-2 bg-white/50 border border-[#2D2D2D]/20 rounded-lg text-[#2D2D2D] focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
                        <option value="photo" {{ old('type', $service->type) == 'photo' ? 'selected' : '' }}>Photo</option>
                        <option value="video" {{ old('type', $service->type) == 'video' ? 'selected' : '' }}>Video</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#2D2D2D] mb-2" for="is_active">
                        Status
                    </label>
                    <select name="is_active" id="is_active" required
                        class="w-full px-4 py-2 bg-white/50 border border-[#2D2D2D]/20 rounded-lg text-[#2D2D2D] focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
                        <option value="1" {{ old('is_active', $service->is_active) == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', $service->is_active) == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="flex items-center justify-between pt-4">
                    <button type="submit"
                        class="bg-[#A8B2C1] text-white px-6 py-2 rounded-lg font-medium hover:bg-[#8C98A9] transition-colors duration-200">
                        Save Changes
                    </button>
                    <a href="{{ route('service-management') }}"
                        class="bg-[#2D2D2D]/10 text-[#2D2D2D] px-6 py-2 rounded-lg font-medium hover:bg-[#2D2D2D]/20 transition-colors duration-200">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>