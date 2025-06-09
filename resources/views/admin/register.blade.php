<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - Tres Lente Studio</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <main class="w-full max-w-md p-8 bg-white shadow-lg rounded-xl">
    <h2 class="text-2xl font-bold text-center text-gray-800">Admin Registration
    </h2>
    <p class="text-sm text-center text-gray-500 mb-6">Create an admin account</p>

    @if ($errors->any())
      <div class="mb-4 space-y-2 text-red-600 text-sm">
        @foreach ($errors->all() as $error)
          <div><i class="fas fa-exclamation-circle mr-2"></i>{{ $error }}</div>
        @endforeach
      </div>
    @endif

    @if (session('success'))
      <div class="mb-4 text-green-600 text-sm flex items-center">
        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('register.user') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label for="fullname" class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" id="fullname" name="fullname" required value="{{ old('fullname') }}"
               class="mt-1 w-full px-3 py-2 border rounded-md focus:ring focus:ring-indigo-200 focus:outline-none">
        @error('fullname')
          <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
      </div>

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

      <div>
        <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" required
               class="mt-1 w-full px-3 py-2 border rounded-md focus:ring focus:ring-indigo-200 focus:outline-none">
        @error('confirm-password')
          <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
      </div>

      <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">Create Account</button>
    </form>

    <p class="mt-6 text-sm text-center text-gray-600">
      Already have an account? <a href="{{ route('login.user') }}" class="text-indigo-600 hover:underline">Sign In</a>
    </p>
  </main>
</body>
</html>
