<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact Us - Tres Lente Studio</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Fonts -->    
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

    .nav-text {
      font-family: 'Montserrat', sans-serif;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .nav-link {
      position: relative;
      display: inline-block;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -4px;
      width: 0;
      height: 2px;
      background-color: #A8B2C1;
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 100%;
    }
  </style>
</head>
<body class="bg-[#FFFFFF] text-[#5A5A5A]">

  <!-- Navbar -->
  <nav class="fixed top-0 left-0 right-0 z-50 bg-[#FFFFFF]/95 backdrop-blur-lg shadow-sm transition duration-300">
    <div class="max-w-7xl mx-auto px-8 flex items-center justify-between h-16">
      <div class="flex items-center space-x-4">
        <img src="{{ asset('Logo1.svg') }}" alt="Tres Lente Studio Logo" class="w-14 h-14"/>
        <div class="text-3xl font-logo tracking-wide text-[#2D2D2D] hover:text-[#A8B2C1] cursor-pointer select-none">
          Tres Lente Studio
        </div>
      </div>
      <ul class="flex space-x-10 text-sm nav-text font-medium">
        <li><a href="{{ route('home') }}" class="nav-link text-[#5A5A5A] hover:text-[#A8B2C1] transition">Home</a></li>
        <li><a href="{{ route('services') }}" class="nav-link text-[#5A5A5A] hover:text-[#A8B2C1] transition">Services</a></li>
        <li><a href="{{ route('about') }}" class="nav-link text-[#5A5A5A] hover:text-[#A8B2C1] transition">About</a></li>
        <li><a href="{{ route('contact') }}" class="nav-link text-[#5A5A5A] hover:text-[#A8B2C1] transition">Contact</a></li>
      </ul>
    </div>
  </nav>  <!-- Contact Hero Section -->
  <section class="min-h-screen pt-24 pb-16 bg-[#F5F5F5]">
    <div class="max-w-6xl mx-auto px-4 sm:px-8 py-16 grid md:grid-cols-2 gap-8">
      <!-- Left side - Background Image -->
      <div class="relative h-full min-h-[400px] rounded-lg overflow-hidden">
        <img src="{{ asset('bgc1.png') }}" alt="Contact Background" class="absolute inset-0 w-full h-full object-cover">
      </div>
      <!-- Right side - Form -->
      <div class="flex flex-col justify-center">
        <h1 class="text-4xl sm:text-5xl font-logo font-bold leading-tight text-[#2D2D2D] mb-4">
          Get in Touch with Us
      </h1>      <p class="text-lg sm:text-xl text-[#5A5A5A] mb-8 font-light">
        The journey of treasuring your life's finest moments starts with the first connection. Drop us a line and let's begin how we can make the best out of your event!
      </p>

      @if(session('success'))
        <div class="bg-[#2D2D2D]/10 text-[#2D2D2D] px-4 py-3 rounded mb-6 max-w-4xl mx-auto text-center font-body font-medium">
          {{ session('success') }}
        </div>
      @endif
      <form method="POST" action="{{ route('contact.store') }}" class="space-y-5 max-w-3xl mx-auto">
        @csrf

        <div class="flex flex-col md:flex-row gap-4">
          <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}"
            class="flex-1 bg-white/50 border border-[#2D2D2D]/20 px-4 py-2 text-[#2D2D2D] placeholder:text-[#5A5A5A] rounded focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition" required>
          <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}"
            class="flex-1 bg-white/50 border border-[#2D2D2D]/20 px-4 py-2 text-[#2D2D2D] placeholder:text-[#5A5A5A] rounded focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition" required>
        </div>

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
          class="w-full bg-white/50 border border-[#2D2D2D]/20 px-4 py-2 text-[#2D2D2D] placeholder:text-[#5A5A5A] rounded focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition" required>

        <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}"
          class="w-full bg-white/50 border border-[#2D2D2D]/20 px-4 py-2 text-[#2D2D2D] placeholder:text-[#5A5A5A] rounded focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition">
        <input type="hidden" name="location" value="contact">
        <select name="service_category_id"
          class="w-full bg-white/50 border border-[#2D2D2D]/20 px-4 py-2 text-[#2D2D2D] rounded focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition @error('service_category_id') ring-2 ring-red-500 @enderror" required>
          <option value="" disabled selected class="text-[#5A5A5A]">Choose Category</option>
          @foreach($serviceCategories as $category)
            <option value="{{ $category->id }}" {{ old('service_category_id') == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>

        <textarea name="message" placeholder="Message" rows="4"
          class="w-full bg-white/50 border border-[#2D2D2D]/20 px-4 py-2 text-[#2D2D2D] placeholder:text-[#5A5A5A] rounded focus:ring-2 focus:ring-[#A8B2C1] focus:border-transparent transition" required>{{ old('message') }}</textarea>        <button type="submit"
          class="w-full bg-[#A8B2C1] hover:bg-[#8c98a9] text-white font-bold py-3 rounded shadow-md hover:shadow-lg transition duration-300 mt-4">
          Send Message
        </button>
      </form>
    </div>
  </section>
  <section class="relative text-white py-20 px-6">
    <!-- Overlay to deem the background -->
    <div class="absolute inset-0 bg-[#2D2D2D] bg-opacity-40 z-0"></div>

    <!-- Background Image -->
    <div 
        class="absolute inset-0 bg-cover bg-center bg-no-repeat z-[-1]" 
        style="background-image: url('{{ asset('bgc2.png') }}')">
    </div>    <div class="relative max-w-5xl mx-auto text-center mb-12 z-10">
        <h2 class="text-4xl font-logo font-bold mb-4 drop-shadow-md">Connect with Our Team Today</h2>
        <p class="text-gray-300 text-lg font-light">
            We're excited to hear from you! We're committed to delivering exceptional service and ensuring your photography and videography needs are met with creativity and professionalism.
        </p>
    </div>    <div class="relative max-w-4xl mx-auto space-y-6 z-10">
        <!-- Phone -->
        <div class="flex items-start gap-4 border border-white/40 p-6 rounded-md bg-[#2D2D2D]/30 backdrop-blur-sm hover:bg-[#2D2D2D]/40 transition duration-300">
            <img src="{{ asset('logoc1.png') }}" alt="Phone Icon" class="w-7 h-7 mt-1 object-contain opacity-90">
            <div>
                <h4 class="text-xl font-semibold">Phone Number</h4>
                <p class="text-gray-100">+632 8636 5505 (landline) | +63 917 858 2950 | +63 917 515 0102</p>
            </div>
        </div>

        <!-- Email -->
        <div class="flex items-start gap-4 border border-white/40 p-6 rounded-md bg-[#2D2D2D]/30 backdrop-blur-sm hover:bg-[#2D2D2D]/40 transition duration-300">
            <img src="{{ asset('logoc2.png') }}" alt="Email Icon" class="w-7 h-7 mt-1 object-contain opacity-90">
            <div>
                <h4 class="text-xl font-semibold">Email Address</h4>
                <p class="text-gray-100">treslentestudio@gmail.com</p>
            </div>
        </div>

        <!-- Location -->
        <div class="flex items-start gap-4 border border-white/40 p-6 rounded-md bg-[#2D2D2D]/30 backdrop-blur-sm hover:bg-[#2D2D2D]/40 transition duration-300">
            <img src="{{ asset('logoc3.png') }}" alt="Location Icon" class="w-7 h-7 mt-1 object-contain opacity-90">
            <div>
                <h4 class="text-xl font-semibold">Location</h4>
                <p class="text-gray-100">Kagawasan Ave. Dumaguete City, Negros Oriental.</p>
            </div>
        </div>
    </div>
  </section>

  <section class="bg-[#F5F5F5] text-[#2D2D2D] py-20 px-6">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        {{-- Text Section --}}
        <div>
            <p class="uppercase text-sm tracking-wide text-gray-400 mb-2">Message From Us to You</p>
            <h2 class="text-4xl md:text-5xl font-serif font-bold mb-6 leading-tight">
                Our Heartfelt Message
            </h2>
            <p class="text-lg leading-relaxed mb-4">
                In the midst of planning your special day, we want to thank you for thinking of us as your trusted partner in making it grander.
                We know that these events can be challenging to curate as your own. Staying in the present is difficult when you are tugged in a different direction.
            </p>
            <p class="text-lg leading-relaxed">
                With Tres Lente Studio, we ensure that we elevate your experience, encouraging you to enjoy every second of it.
                In once-in-a-lifetime events, we have your back in making sure you can treasure every moment.
            </p>
        </div>        {{-- Image Section --}}
        <div class="w-full h-[450px]">
            <img src="{{ asset('picc1.png') }}" alt="Proposal Scene" class="w-full h-full object-cover shadow-lg">
        </div>
    </div>
  </section>



  <!-- Footer -->
  <footer class="bg-[#2D2D2D] text-white py-12">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-12">
      <!-- Column 1 -->
      <div>
        <h4 class="text-xl font-logo font-semibold mb-2 border-b border-[#E0E0E0] w-max text-white">Get In Touch</h4>
        <p class="text-[#E0E0E0] font-body">
          Reach out for inquiries, collaborations, or just to say hello—we'd love to connect with you.
        </p>
      </div>

      <!-- Column 2 -->
      <div>
        <h4 class="text-xl font-logo font-semibold mb-2 border-b border-[#E0E0E0] w-max text-white">Where's Our Office?</h4>
        <p class="text-[#E0E0E0] font-body">
          Kagawasan Ave. Dumaguete City, Negros Oriental.
        </p>
      </div>

      <!-- Column 3 -->
      <div>
        <h4 class="text-xl font-logo font-semibold mb-2 border-b border-[#E0E0E0] w-max text-white">My Social Links</h4>
        <div class="flex space-x-4 text-2xl mt-3">
          <a href="#" class="text-[#E0E0E0] hover:text-blue-500 transition"><i class="ri-facebook-fill"></i></a>
          <a href="#" class="text-[#E0E0E0] hover:text-sky-400 transition"><i class="ri-twitter-fill"></i></a>
          <a href="#" class="text-[#E0E0E0] hover:text-red-400 transition"><i class="ri-pinterest-line"></i></a>
          <a href="#" class="text-[#E0E0E0] hover:text-pink-500 transition"><i class="ri-instagram-line"></i></a>
          <a href="#" class="text-[#E0E0E0] hover:text-red-600 transition"><i class="ri-youtube-fill"></i></a>
        </div>
      </div>
    </div>
  </footer>

  <footer class="bg-[#1a2c23] text-[#E0E0E0] text-center py-4">
    <p>&copy; 2025 Tres Lente Studio. All rights reserved.</p>
  </footer>

</body>
</html>
