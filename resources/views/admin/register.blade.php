<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - Tres Lente Studio</title>  <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-[#F5F5F5] flex items-center justify-center min-h-screen">  <main class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-3xl font-logo text-center text-[#2D2D2D] mb-2">Admin Registration</h2>
    <p class="text-sm text-center text-[#5A5A5A] mb-8">Create an admin account</p>

    @if ($errors->any())
      <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-lg shadow-sm">
        <div class="flex flex-col space-y-1">
          @foreach ($errors->all() as $error)
            <div class="flex items-center">
              <i class="ri-error-warning-line text-red-400 mr-2"></i>
              <p class="text-red-700 text-sm">{{ $error }}</p>
            </div>
          @endforeach
        </div>
      </div>
    @endif

    @if (session('success'))
      <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-400 p-4 rounded-lg shadow-sm">
        <div class="flex items-center">
          <i class="ri-checkbox-circle-line text-emerald-400 mr-2"></i>
          <p class="text-emerald-700 text-sm">{{ session('success') }}</p>
        </div>
      </div>
    @endif

    <form action="{{ route('register.user') }}" method="POST" class="space-y-6">
      @csrf
      <div>
        <label for="fullname" class="block text-sm font-medium text-[#2D2D2D] mb-2">Full Name</label>
        <input type="text" id="fullname" name="fullname" required value="{{ old('fullname') }}"
               class="w-full px-4 py-2 bg-white/50 border border-[#2D2D2D]/20 rounded-lg text-[#2D2D2D] focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
        @error('fullname')
          <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-[#2D2D2D] mb-2">Email Address</label>
        <input type="email" id="email" name="email" required value="{{ old('email') }}"
               class="w-full px-4 py-2 bg-white/50 border border-[#2D2D2D]/20 rounded-lg text-[#2D2D2D] focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
        @error('email')
          <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-[#2D2D2D] mb-2">Password</label>
        <input type="password" id="password" name="password" required
               class="w-full px-4 py-2 bg-white/50 border border-[#2D2D2D]/20 rounded-lg text-[#2D2D2D] focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
        @error('password')
          <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label for="confirm-password" class="block text-sm font-medium text-[#2D2D2D] mb-2">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" required
               class="w-full px-4 py-2 bg-white/50 border border-[#2D2D2D]/20 rounded-lg text-[#2D2D2D] focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
        @error('confirm-password')
          <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
        @enderror
      </div>

      <button type="submit" 
              class="w-full bg-[#A8B2C1] text-white py-3 rounded-lg font-medium hover:bg-[#8C98A9] transition-colors duration-200">
        Create Account
      </button>
    </form>

    <p class="mt-6 text-sm text-center text-[#5A5A5A]">
      Already have an account? <a href="{{ route('login.user') }}" class="text-[#A8B2C1] hover:text-[#8C98A9] transition-colors duration-200">Sign In</a>
    </p>
  </main>
</body>
</html>
