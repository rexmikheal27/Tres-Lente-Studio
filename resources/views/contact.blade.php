<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Contact Us - Tres Lente Studio</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet" />
  <!-- Remix Icons -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />

  <style>
    .font-logo {
      font-family: 'Playfair Display', serif;
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
      background-color: #fff;
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    /* Override input and select placeholder color for dark bg */
    input::placeholder,
    textarea::placeholder,
    select {
      color: #bbb;
    }
  </style>
</head>
<body class="bg-white text-gray-800">

<!-- Navbar -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/10 backdrop-blur-lg shadow-sm transition duration-300">
  <div class="max-w-7xl mx-auto px-8 flex items-center justify-between h-16">
    <div class="text-3xl font-logo tracking-wide text-white hover:text-gray-200 cursor-pointer select-none">
      Tres Lente Studio
    </div>
    <ul class="flex space-x-10 text-lg font-semibold">
     <li><a href="{{ route('home') }}" class="nav-link text-white hover:text-gray-200 transition">Home</a></li>
     <li><a href="{{ route('services') }}" class="nav-link text-white hover:text-gray-200 transition">Services</a></li>
     <li><a href="{{ route('about') }}" class="nav-link text-white hover:text-gray-200 transition">About</a></li>
     <li><a href="{{ route('contact') }}" class="nav-link text-white hover:text-gray-200 transition">Contact</a></li>
    </ul>
  </div>
</nav>

<section id="contact" class="bg-[#2c292a] text-white py-20 px-6 min-h-screen flex items-center justify-center">
  <div class="max-w-6xl w-full mx-auto grid md:grid-cols-2 gap-20 items-center">

    <!-- Left: Images -->
    <div class="relative">
      <div class="border-[6px] border-white rounded-md overflow-hidden">
        <img src="{{ asset('img2.png') }}" alt="Main Couple" class="w-full h-auto object-cover" />
      </div>
      <div class="absolute bottom-0 right-0 transform translate-x-1/4 translate-y-1/4 border-[6px] border-white rounded-md overflow-hidden shadow-lg">
        <img src="{{ asset('img.png') }}" alt="Secondary Couple" class="w-40 h-40 object-cover" />
      </div>
    </div>

    <!-- Right: Form -->
    <div class="bg-[#2c292a] border-[1.5px] border-gray-400 rounded-lg p-10 shadow-lg">
      <h3 class="text-sm uppercase tracking-widest text-gray-400 mb-1">Contact Us</h3>
      <h2 class="text-3xl md:text-4xl font-logo font-bold mb-4">Get in Touch with Us</h2>
      <p class="text-gray-300 mb-8">
        The journey of treasuring your life's finest moments starts with the first connection. Drop us a line and let's begin how we can make the best out of your event!
      </p>

      <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
        @csrf

        <div class="flex flex-col md:flex-row gap-4">
          <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}"
            class="flex-1 bg-transparent border border-gray-500 px-4 py-2 text-white placeholder:text-gray-400 rounded" required>
          <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}"
            class="flex-1 bg-transparent border border-gray-500 px-4 py-2 text-white placeholder:text-gray-400 rounded" required>
        </div>

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
          class="w-full bg-transparent border border-gray-500 px-4 py-2 text-white placeholder:text-gray-400 rounded" required>

        <input type="text" name="phone" placeholder="Phone Number" value="{{ old('phone') }}"
          class="w-full bg-transparent border border-gray-500 px-4 py-2 text-white placeholder:text-gray-400 rounded">

        <select name="service_category_id"
          class="w-full bg-transparent border border-gray-500 px-4 py-2 text-white rounded @error('service_category_id') border-red-500 @enderror" required>
          <option value="" disabled selected class="text-gray-400">Choose Category</option>
          @foreach($serviceCategories as $category)
            <option value="{{ $category->id }}" {{ old('service_category_id') == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>

        <textarea name="message" placeholder="Message" rows="4"
          class="w-full bg-transparent border border-gray-500 px-4 py-2 text-white placeholder:text-gray-400 rounded" required>{{ old('message') }}</textarea>

        <button type="submit"
          class="w-full bg-[#c1837b] hover:bg-[#d8968e] text-white font-bold py-3 rounded transition">
          Send Message
        </button>
      </form>
    </div>
  </div>
</section>


<section class="relative text-white py-20 px-6">
    <!-- Overlay to deem the background -->
    <div class="absolute inset-0 bg-black bg-opacity-60 z-0"></div>

    <!-- Background Image -->
    <div 
        class="absolute inset-0 bg-cover bg-center bg-no-repeat z-[-1]" 
        style="background-image: url('{{ asset('bg2.jpg') }}');">
    </div>

    <div class="relative max-w-5xl mx-auto text-center mb-12 z-10">
        <h2 class="text-4xl font-bold mb-4">Connect with Our Team Today</h2>
        <p class="text-gray-300 text-lg">
            We're excited to hear from you! We're committed to delivering exceptional service and ensuring your photography and videography needs are met with creativity and professionalism.
        </p>
    </div>

    <div class="relative max-w-4xl mx-auto space-y-6 z-10">
        <!-- Phone -->
        <div class="flex items-start gap-4 border border-white/30 p-6 rounded-md">
            <img src="{{ asset('telephone.png') }}" alt="Phone Icon" class="w-6 h-6 mt-1 object-contain">
            <div>
                <h4 class="text-xl font-semibold">Phone Number</h4>
                <p class="text-gray-300">+632 8636 5505 (landline) | +63 917 858 2950 | +63 917 515 0102</p>
            </div>
        </div>

        <!-- Email -->
        <div class="flex items-start gap-4 border border-white/30 p-6 rounded-md">
            <img src="{{ asset('email.png') }}" alt="Email Icon" class="w-6 h-6 mt-1 object-contain">
            <div>
                <h4 class="text-xl font-semibold">Email Address</h4>
                <p class="text-gray-300">treslentestudio@gmail.com</p>
            </div>
        </div>

        <!-- Location -->
        <div class="flex items-start gap-4 border border-white/30 p-6 rounded-md">
            <img src="{{ asset('location.png') }}" alt="Location Icon" class="w-6 h-6 mt-1 object-contain">
            <div>
                <h4 class="text-xl font-semibold">Location</h4>
                <p class="text-gray-300">Kagawasan Ave. Dumaguete City, Negros Oriental.</p>
            </div>
        </div>
    </div>
</section>



<section class="bg-[#2D2A2B] py-20">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        {{-- Text Section --}}
        <div>
            <p class="text-sm uppercase text-gray-300 tracking-wider mb-2">Message From Us to You</p>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 leading-tight">
                Our Heartfelt Message
            </h2>
            <p class="text-gray-300 mb-4 leading-relaxed">
                In the midst of planning your special day, we want to thank you for thinking of us as your trusted partner in making it grander.
                We know that these events can be challenging to curate as your own. Staying in the present is difficult when you are tugged in a different direction.
            </p>
            <p class="text-gray-300 leading-relaxed">
                With Tres Lente Studio, we ensure that we elevate your experience, encouraging you to enjoy every second of it.
                In once-in-a-lifetime events, we have your back in making sure you can treasure every moment.
            </p>
        </div>

        {{-- Image Section --}}
        <div class="w-full">
            <img src="{{ asset('heartfelt.png') }}" alt="Proposal Scene" class="rounded shadow-lg border-4 border-white">
        </div>
    </div>
</section>




<!-- Footer -->
<footer class="bg-[#111827] text-gray-200 py-16">
  <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-12">
    <div>
      <h4 class="text-xl font-logo font-semibold mb-2 border-b-2 border-white w-max text-white">Get In Touch</h4>
      <p class="text-gray-300">Reach out for inquiries, collaborations, or just to say hello—I'd love to connect with you.</p>
    </div>
    <div>
      <h4 class="text-xl font-logo font-semibold mb-2 border-b-2 border-white w-max text-white">Where's Our Office?</h4>
      <p class="text-gray-300">Kagawasan Ave. Dumaguete City, Negros Oriental.</p>
    </div>
    <div>
      <h4 class="text-xl font-logo font-semibold mb-2 border-b-2 border-white w-max text-white">Our Social Links</h4>
      <div class="flex space-x-4 text-2xl mt-3">
        <a href="#" class="text-gray-300 hover:text-blue-500 transition"><i class="ri-facebook-fill"></i></a>
        <a href="#" class="text-gray-300 hover:text-sky-400 transition"><i class="ri-twitter-fill"></i></a>
        <a href="#" class="text-gray-300 hover:text-red-400 transition"><i class="ri-pinterest-line"></i></a>
        <a href="#" class="text-gray-300 hover:text-pink-500 transition"><i class="ri-instagram-line"></i></a>
        <a href="#" class="text-gray-300 hover:text-red-600 transition"><i class="ri-youtube-fill"></i></a>
      </div>
    </div>
  </div>
</footer>

<footer class="bg-gray-900 text-white text-center py-6">
  <p>&copy; 2025 Tres Lente Studio. All rights reserved.</p>
</footer>

</body>
</html>
