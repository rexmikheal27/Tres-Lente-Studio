<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Tres Lente Studio</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <main class="w-full max-w-md p-8 bg-white shadow-lg rounded-xl">
    <h2 class="text-2xl font-bold text-center text-gray-800">Welcome Back</h2>
    <p class="text-sm text-center text-gray-500 mb-6">Sign in to manage your studio dashboard.</p>

    @if (session('error'))
      <div class="mb-4 text-red-600 text-sm flex items-center">
        <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
      </div>
    @endif

    @if (session('success'))
      <div class="mb-4 text-green-600 text-sm flex items-center">
        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('auth.user') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
        <input type="email" id="email" name="email" required value="{{ old('email') }}"
               class="mt-1 w-full px-3 py-2 border rounded-md focus:ring focus:ring-indigo-200 focus:outline-none">
        @error('email')
          <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
               class="mt-1 w-full px-3 py-2 border rounded-md focus:ring focus:ring-indigo-200 focus:outline-none">
        @error('password')
          <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
      </div>

      <div class="flex items-center justify-between text-sm">
        <label class="flex items-center space-x-2">
          <input type="checkbox" name="remember" class="form-checkbox">
          <span class="text-gray-600">Remember me</span>
        </label>
      </div>

      <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">Sign In</button>
    </form>

    <p class="mt-6 text-sm text-center text-gray-600">
      Don’t have an account? <a href="{{ route('create.user') }}" class="text-indigo-600 hover:underline">Create Account</a>
    </p>
  </main>
</body>
</html>
