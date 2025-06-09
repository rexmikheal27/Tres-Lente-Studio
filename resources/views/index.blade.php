<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tres Lente Studio - Fullscreen Sections</title>
  <script src="https://cdn.tailwindcss.com"></script>
   <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet" />

    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap');

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
        <li><a href="#home" class="nav-link text-white hover:text-gray-200 transition">Home</a></li>
        <li><a href="#services" class="nav-link text-white hover:text-gray-200 transition">Services</a></li>
        <li><a href="#about" class="nav-link text-white hover:text-gray-200 transition">About</a></li>
        <li><a href="#contact" class="nav-link text-white hover:text-gray-200 transition">Contact</a></li>
      </ul>
    </div>
  </nav>

  <!-- Hero Section -->
  <section
    id="home"
    class="min-h-screen flex items-center justify-center pt-16 px-6 text-center scroll-mt-20 bg-cover bg-center bg-no-repeat relative"
    style="background-image: url('/wed.jpg');"
  >
    <div class="absolute inset-0 bg-black/40 z-0"></div>
    <div class="max-w-4xl mx-auto z-10 relative text-white">
      <h1 class="text-5xl md:text-6xl font-logo font-extrabold mb-6 leading-tight drop-shadow-md">
        Your Go-To Photography and Videography Studio in the Philippines
      </h1>
      <p class="text-lg md:text-xl mb-6 leading-relaxed drop-shadow-sm">
        Life is a beautiful series of fleeting moments — full of laughter, love, and connection. At Tres Lente Studio, we believe those moments deserve to be remembered and re-lived through timeless imagery.
      </p>
      <p class="text-lg md:text-xl leading-relaxed drop-shadow-sm">
        From intimate portraits to grand celebrations, our services help you preserve memories, tell your story, and create a legacy worth cherishing.
      </p>
      <a href="#services" class="inline-block mt-10 px-8 py-3 rounded-md bg-white text-gray-900 font-semibold text-lg hover:bg-gray-200 transition shadow-lg">
        Explore Our Services
      </a>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="min-h-screen py-24 bg-gray-900 px-8 text-center flex flex-col justify-center scroll-mt-20">
    <h2 class="text-4xl font-logo text-white mb-12 font-bold">Our Services</h2>
    <div class="grid md:grid-cols-3 gap-12 max-w-7xl mx-auto">
      <!-- Service Card Example -->
      <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl border border-white/10 transform transition-all duration-300 hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:bg-white/20">
        <h3 class="text-2xl font-semibold mb-4 text-white">Wedding Photography</h3>
        <p class="text-gray-300">Capturing your most special day with elegance and timeless beauty.</p>
      </div>

      <!-- Duplicate for all other cards below -->
      <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl border border-white/10 transform transition-all duration-300 hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:bg-white/20">
        <h3 class="text-2xl font-semibold mb-4 text-white">Portrait Sessions</h3>
        <p class="text-gray-300">Professional portraits for individuals, couples, or families in studio or on location.</p>
      </div>

      <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl border border-white/10 transform transition-all duration-300 hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:bg-white/20">
        <h3 class="text-2xl font-semibold mb-4 text-white">Event Coverage</h3>
        <p class="text-gray-300">High-quality photo and video coverage for corporate events, birthdays, and more.</p>
      </div>

      <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl border border-white/10 transform transition-all duration-300 hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:bg-white/20">
        <h3 class="text-2xl font-semibold mb-4 text-white">Wedding Videos</h3>
        <p class="text-gray-300">Beautifully edited wedding videos to relive your special day with cinematic flair.</p>
      </div>

      <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl border border-white/10 transform transition-all duration-300 hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:bg-white/20">
        <h3 class="text-2xl font-semibold mb-4 text-white">Prenup Videos</h3>
        <p class="text-gray-300">Romantic pre-wedding video shoots capturing your love story in stunning visuals.</p>
      </div>

      <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl border border-white/10 transform transition-all duration-300 hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:bg-white/20">
        <h3 class="text-2xl font-semibold mb-4 text-white">Birthday Videos</h3>
        <p class="text-gray-300">Fun and lively birthday celebration videos that capture every joyful moment.</p>
      </div>

      <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl border border-white/10 transform transition-all duration-300 hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:bg-white/20">
        <h3 class="text-2xl font-semibold mb-4 text-white">Debut Videos</h3>
        <p class="text-gray-300">Highlight your milestone with cinematic debut video coverage and edits.</p>
      </div>

      <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl border border-white/10 transform transition-all duration-300 hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:bg-white/20">
        <h3 class="text-2xl font-semibold mb-4 text-white">Corporate Videos</h3>
        <p class="text-gray-300">Professional video services tailored for company events, branding, and promotions.</p>
      </div>

      <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl border border-white/10 transform transition-all duration-300 hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:bg-white/20">
        <h3 class="text-2xl font-semibold mb-4 text-white">Wedding Photos</h3>
        <p class="text-gray-300">Capture every romantic moment and detail of your wedding with timeless photography.</p>
      </div>

      <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl border border-white/10 transform transition-all duration-300 hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:bg-white/20">
        <h3 class="text-2xl font-semibold mb-4 text-white">Prenup Photos</h3>
        <p class="text-gray-300">A pre-wedding shoot that showcases your love in your preferred setting or theme.</p>
      </div>

      <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl border border-white/10 transform transition-all duration-300 hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:bg-white/20">
        <h3 class="text-2xl font-semibold mb-4 text-white">Debut Photos</h3>
        <p class="text-gray-300">Glamorous and fun photography to celebrate your transition to adulthood.</p>
      </div>

      <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl border border-white/10 transform transition-all duration-300 hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:bg-white/20">
        <h3 class="text-2xl font-semibold mb-4 text-white">Birthday Photos</h3>
        <p class="text-gray-300">Cherish every smile and moment with high-quality birthday event photography.</p>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="min-h-screen py-24 bg-gray-800 text-white px-8 text-center flex flex-col justify-center scroll-mt-20">
    <h2 class="text-4xl font-logo mb-8 font-bold">About Us</h2>
    <p class="text-gray-300 text-lg leading-relaxed max-w-3xl mx-auto">
      Tres Lente Studio is passionate about capturing beautiful moments and turning them into timeless art. Our team of professional photographers is dedicated to quality, creativity, and storytelling that lasts a lifetime.
    </p>
  </section>

    <!-- Contact Section -->
  <section id="contact" class="bg-[#e0f2f1] py-20 px-6">
    <div class="max-w-4xl mx-auto">
      <h2 class="text-4xl font-logo font-bold mb-4 border-b-2 border-black inline-block text-gray-900">Contact Us</h2>
      <p class="text-gray-700 mb-10 text-lg">
        Have a project in mind or need a photographer or filmmaker to bring your vision to life? We'd love to hear from you!
      </p>

      {{-- Success message --}}
      @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6 max-w-4xl mx-auto text-center font-semibold">
          {{ session('success') }}
        </div>
      @endif

      <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
      @csrf

      <div class="flex flex-col md:flex-row gap-4">
        <input
          type="text"
          name="first_name"
          value="{{ old('first_name') }}"
          placeholder="First Name"
          class="flex-1 border-b border-gray-600 bg-transparent focus:outline-none px-2 py-2 placeholder:text-gray-600 @error('first_name') border-red-500 @enderror"
          required
        />
        <input
          type="text"
          name="last_name"
          value="{{ old('last_name') }}"
          placeholder="Last Name"
          class="flex-1 border-b border-gray-600 bg-transparent focus:outline-none px-2 py-2 placeholder:text-gray-600 @error('last_name') border-red-500 @enderror"
          required
        />
      </div>

      <input
        type="email"
        name="email"
        value="{{ old('email') }}"
        placeholder="Email Address"
        class="w-full border-b border-gray-600 bg-transparent focus:outline-none px-2 py-2 placeholder:text-gray-600 @error('email') border-red-500 @enderror"
        required
      />

      <input
        type="text"
        name="phone"
        value="{{ old('phone') }}"
        placeholder="Phone Number"
        class="w-full border-b border-gray-600 bg-transparent focus:outline-none px-2 py-2 placeholder:text-gray-600 @error('phone') border-red-500 @enderror"
      />

      {{-- Service Category --}}
      <select
        name="service_category_id"
        class="w-full border-b border-gray-600 bg-transparent focus:outline-none px-2 py-2 text-gray-700 @error('service_category_id') border-red-500 @enderror"
        required
      >
        <option value="">Select a Service</option>
        @foreach($serviceCategories as $category)
          <option value="{{ $category->id }}" {{ old('service_category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>

      <textarea
        name="message"
        rows="4"
        placeholder="Your Message"
        class="w-full border-b border-gray-600 bg-transparent focus:outline-none px-2 py-2 placeholder:text-gray-600 @error('message') border-red-500 @enderror"
        required
      >{{ old('message') }}</textarea>

      {{-- Validation Errors --}}
      @if ($errors->any())
        <div class="text-red-600 space-y-1">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      <button
        type="submit"
        class="bg-black text-white px-8 py-3 font-semibold hover:bg-gray-800 transition w-max shadow-md rounded"
      >
        SEND IT
      </button>
    </form>
    </div>
  </section>


    <!-- Footer -->
    <footer class="bg-[#111827] text-gray-200 py-16">
      <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-12">
        <!-- Column 1 -->
        <div>
          <h4 class="text-xl font-logo font-semibold mb-2 border-b-2 border-white w-max text-white">Get In Touch</h4>
          <p class="text-gray-300">
            Reach out for inquiries, collaborations, or just to say hello—I'd love to connect with you.
          </p>
        </div>

        <!-- Column 2 -->
        <div>
          <h4 class="text-xl font-logo font-semibold mb-2 border-b-2 border-white w-max text-white">Where's Our Office?</h4>
          <p class="text-gray-300">
            Kagawasan Ave. Dumaguete City, Negros Oriental.
          </p>
        </div>

        <!-- Column 3 -->
        <div>
          <h4 class="text-xl font-logo font-semibold mb-2 border-b-2 border-white w-max text-white">My Social Links</h4>
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
