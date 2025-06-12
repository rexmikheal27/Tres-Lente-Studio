<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tres Lente Studio - Fullscreen Sections</title>
  <script src="https://cdn.tailwindcss.com"></script>
   <!-- Google Fonts -->    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet" />

    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />  <style>
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
      background-color: #fff;
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    .slideshow {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    .slideshow-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }    .slideshow-image.active {
      opacity: 1;
    }    @keyframes scroll {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-50%);
      }
    }

    @keyframes scroll-reverse {
      0% {
        transform: translateX(-50%);
      }
      100% {
        transform: translateX(0);
      }
    }

    .service-slider {
      margin: auto;
      overflow: hidden;
      position: relative;
      width: 100%;
      padding: 2rem 0;
      mask: linear-gradient(90deg, transparent, white 10%, white 90%, transparent);
      -webkit-mask: linear-gradient(90deg, transparent, white 10%, white 90%, transparent);
    }

    .service-track {
      animation: scroll 40s linear infinite;
      display: flex;
      gap: 3rem;
      width: max-content;
      will-change: transform;
      filter: drop-shadow(0 10px 20px rgba(0,0,0,0.15));
    }

    .service-track-reverse {
      animation: scroll-reverse 40s linear infinite;
      display: flex;
      gap: 3rem;
      width: max-content;
      will-change: transform;
      filter: drop-shadow(0 10px 20px rgba(0,0,0,0.15));
      margin-top: 2rem;
    }

    .service-track:hover,
    .service-track-reverse:hover {
      animation-play-state: paused;
    }

    .service-card {
      position: relative;
      overflow: hidden;
    }

    .service-card::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle at center, rgba(255,255,255,0.1) 0%, transparent 50%);
      transform: rotate(45deg);
      transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
      pointer-events: none;
      z-index: 1;
    }

    .service-card:hover::before {
      transform: rotate(45deg) translateY(-50%);
    }

    .service-card img {
      transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .service-card:hover img {
      transform: scale(1.15);
    }

    .service-track:hover {
      animation-play-state: paused;
    }    .service-card {
      width: 280px;
      height: 200px;
      flex-shrink: 0;
      transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
      cursor: pointer;
      backface-visibility: hidden;
      -webkit-font-smoothing: subpixel-antialiased;
      position: relative;
      overflow: hidden;
    }

    .service-card:hover {
      transform: scale(1.05);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
    }
  </style>
</head><body class="bg-[#FFFFFF] text-[#5A5A5A]">

  <!-- Navbar -->
  <nav class="fixed top-0 left-0 right-0 z-50 bg-[#FFFFFF]/95 backdrop-blur-lg shadow-sm transition duration-300">    <div class="max-w-7xl mx-auto px-8 flex items-center justify-between h-16">        <div class="flex items-center space-x-4">
        <img src="{{ asset('Logo1.svg') }}" alt="Tres Lente Studio Logo" class="w-14 h-14"/>
        <div class="text-3xl font-logo tracking-wide text-[#2D2D2D] hover:text-[#A8B2C1] cursor-pointer select-none">
          Tres Lente Studio
        </div>
      </div><ul class="flex space-x-10 text-sm nav-text font-medium">
        <li><a href="{{ route('home') }}" class="nav-link text-[#5A5A5A] hover:text-[#A8B2C1] transition">Home</a></li>
        <li><a href="{{ route('services') }}" class="nav-link text-[#5A5A5A] hover:text-[#A8B2C1] transition">Services</a></li>
        <li><a href="{{ route('about') }}" class="nav-link text-[#5A5A5A] hover:text-[#A8B2C1] transition">About</a></li>
        <li><a href="{{ route('contact') }}" class="nav-link text-[#5A5A5A] hover:text-[#A8B2C1] transition">Contact</a></li>
      </ul>
    </div>
  </nav>

  <!-- Hero Section -->  <section
    id="home"
    class="min-h-screen flex items-center justify-center pt-16 px-6 text-center scroll-mt-20 relative"
  >
    <div class="slideshow">
      <div class="slideshow-image active" style="background-image: url('{{ asset('hr1.png') }}');"></div>
      <div class="slideshow-image" style="background-image: url('{{ asset('hr2.png') }}');"></div>
      <div class="slideshow-image" style="background-image: url('{{ asset('hr3.png') }}');"></div>
      <div class="slideshow-image" style="background-image: url('{{ asset('hr4.png') }}');"></div>
    </div>
    <div class="absolute inset-0 bg-black/40 z-0"></div>
    <div class="max-w-4xl mx-auto z-10 relative text-white">
      <h1 class="text-5xl md:text-6xl font-logo font-extrabold mb-6 leading-tight drop-shadow-md">
        Your Go-To Photography and Videography Studio in the Philippines
      </h1>
      <p class="text-lg md:text-xl mb-6 leading-relaxed drop-shadow-sm">
        Life is a beautiful series of fleeting moments — full of laughter, love, and connection. At Tres Lente Studio, we believe those moments deserve to be remembered and re-lived through timeless imagery.
      </p>
      <p class="text-lg md:text-xl leading-relaxed drop-shadow-sm">
        From intimate portraits to grand celebrations, our services help you preserve memories, tell your story, and create a legacy worth cherishing.      </p>      <a href="#services" class="inline-block mt-10 px-8 py-3 rounded-md bg-[#D4D9E0] text-[#2D2D2D] font-medium text-lg hover:bg-[#A8B2C1] transition shadow-lg">
        Explore Our Services
      </a>
    </div>  </section>  <!-- Services Section -->    <section id="services" 
    class="min-h-screen py-24 px-8 text-center flex flex-col justify-center scroll-mt-20 relative overflow-hidden bg-cover bg-center bg-no-repeat"
    style="background-image: url('{{ asset('serve2.png') }}');"
  >
    <div class="absolute inset-0 bg-gradient-to-b from-white/80 via-white/70 to-white/80 backdrop-blur-[2px]"></div>
    <div class="relative z-10">
      <h2 class="text-4xl font-logo text-[#2D2D2D] mb-4 font-bold">Our Services</h2>
      <p class="text-[#5A5A5A] max-w-2xl mx-auto mb-12 text-lg">Professional photography and videography services tailored to capture your precious moments</p>
      
      <!-- First track - scrolling right to left -->
      <div class="service-slider">
        <div class="service-track">
          <!-- First set of 6 cards -->
          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Wedding Photos</h3>
            <p class="text-sm text-text/70">Timeless and romantic wedding photography.</p>
          </div>
          
          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Wedding Videos</h3>
            <p class="text-sm text-text/70">Beautifully edited cinematic wedding videos.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Prenup Photos</h3>
            <p class="text-sm text-text/70">Stylized pre-wedding photos in your favorite setting.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Prenup Videos</h3>
            <p class="text-sm text-text/70">Romantic pre-wedding video shoots.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Birthday Photos</h3>
            <p class="text-sm text-text/70">Cherish your birthday with joyful photography.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Birthday Videos</h3>
            <p class="text-sm text-text/70">Lively birthday videos to capture joyful memories.</p>
          </div>

          <!-- Duplicate set for infinite scroll -->
          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Wedding Photos</h3>
            <p class="text-sm text-text/70">Timeless and romantic wedding photography.</p>
          </div>
          
          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Wedding Videos</h3>
            <p class="text-sm text-text/70">Beautifully edited cinematic wedding videos.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Prenup Photos</h3>
            <p class="text-sm text-text/70">Stylized pre-wedding photos in your favorite setting.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Prenup Videos</h3>
            <p class="text-sm text-text/70">Romantic pre-wedding video shoots.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Birthday Photos</h3>
            <p class="text-sm text-text/70">Cherish your birthday with joyful photography.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Birthday Videos</h3>
            <p class="text-sm text-text/70">Lively birthday videos to capture joyful memories.</p>
          </div>
        </div>
      </div>

      <!-- Second track - scrolling left to right -->
      <div class="service-slider">
        <div class="service-track-reverse">
          <!-- Second set of 5 cards -->
          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Corporate Videos</h3>
            <p class="text-sm text-text/70">Professional videos for business branding and events.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Debut Photos</h3>
            <p class="text-sm text-text/70">Celebrate your coming-of-age with glamorous shots.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Debut Videos</h3>
            <p class="text-sm text-text/70">Cinematic debut coverage for your special 18th birthday.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Event Coverage</h3>
            <p class="text-sm text-text/70">Photo and video for corporate events, birthdays, and more.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Portrait Sessions</h3>
            <p class="text-sm text-text/70">Professional portraits for individuals, couples, or families.</p>
          </div>

          <!-- Duplicate set for infinite scroll -->
          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Corporate Videos</h3>
            <p class="text-sm text-text/70">Professional videos for business branding and events.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Debut Photos</h3>
            <p class="text-sm text-text/70">Celebrate your coming-of-age with glamorous shots.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Debut Videos</h3>
            <p class="text-sm text-text/70">Cinematic debut coverage for your special 18th birthday.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Event Coverage</h3>
            <p class="text-sm text-text/70">Photo and video for corporate events, birthdays, and more.</p>
          </div>

          <div class="service-card bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/50 group transition duration-500">
            <h3 class="font-semibold mb-2 text-text">Portrait Sessions</h3>
            <p class="text-sm text-text/70">Professional portraits for individuals, couples, or families.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- About Section -->  <section id="about" class="min-h-screen py-24 bg-[#F5F5F5] text-[#2D2D2D] px-8 scroll-mt-20">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-4xl font-logo mb-16 font-bold text-center">About Us</h2>
      
      <div class="grid md:grid-cols-2 gap-12 items-center">        <!-- Left side - Images -->
        <div class="relative">
          <!-- Main large image -->
          <div class="overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.12)]">
            <img src="{{ asset('1abt.png') }}" alt="About Tres Lente Studio" class="w-full h-[500px] object-cover"/>
          </div>
          <!-- Overlapping small image -->
          <div class="absolute -bottom-14 -left-16 w-60 h-60 overflow-hidden shadow-xl border-none border-white">
            <img src="{{ asset('2abt.png') }}" alt="Studio detail" class="w-full h-full object-cover"/>
          </div>
        </div>

        <!-- Right side - Text content -->
        <div class="flex flex-col justify-center">
          <h3 class="text-2xl font-logo mb-6 text-[#2D2D2D]">Capturing Timeless Moments</h3>
          <p class="text-[#7A7A7A] text-lg leading-relaxed mb-6 font-body">
            Tres Lente Studio is passionate about capturing beautiful moments and turning them into timeless art. Our team of professional photographers is dedicated to quality, creativity, and storytelling that lasts a lifetime.
          </p>
          <p class="text-[#7A7A7A] text-lg leading-relaxed font-body">
            With years of experience in photography and videography, we understand that every moment is unique and deserves to be captured with precision, artistry, and attention to detail.
          </p>
        </div>
      </div>
    </div>
  </section><!-- Contact Section -->  <section id="contact" class="bg-[#FFFFFF] py-20 px-6">
    <div class="max-w-4xl mx-auto">
      <h2 class="text-4xl font-logo font-bold mb-4 text-[#2D2D2D]">Contact Us</h2>
      <p class="text-[#7A7A7A] mb-10 text-lg font-body">
        Have a project in mind or need a photographer or filmmaker to bring your vision to life? We'd love to hear from you!
      </p>

      @if(session('success'))
        <div class="bg-[#F5F5F5] text-[#2D2D2D] px-4 py-3 rounded mb-6 max-w-4xl mx-auto text-center font-body font-medium">
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
          class="flex-1 border-b bg-transparent focus:outline-none px-2 py-2 placeholder:text-[#7A7A7A] font-body @if($errors->has('first_name')) border-red-500 @endif"
          required
        />
        <input
          type="text"
          name="last_name"
          value="{{ old('last_name') }}"
          placeholder="Last Name"
          class="flex-1 border-b bg-transparent focus:outline-none px-2 py-2 placeholder:text-[#7A7A7A] font-body @if($errors->has('last_name')) border-red-500 @endif"
          required
        />
      </div>      <input
        type="email"
        name="email"
        value="{{ old('email') }}"
        placeholder="Email Address"
        class="w-full border-b bg-transparent focus:outline-none px-2 py-2 placeholder:text-[#7A7A7A] font-body @if($errors->has('email')) border-red-500 @endif"
        required
      />
      <input 
        type="text" 
        name="phone" 
        placeholder="Phone Number" 
        value="{{ old('phone') }}"
        class="w-full border-b bg-transparent focus:outline-none px-2 py-2 placeholder:text-[#7A7A7A] font-body @if($errors->has('phone')) border-red-500 @endif"
        required
      />
      <input type="hidden" name="location" value="home">

      <select
        name="service_category_id"
        class="w-full border-b bg-transparent focus:outline-none px-2 py-2 text-[#5A5A5A] font-body @if($errors->has('service_category_id')) border-red-500 @endif"
        required
      >
        <option value="">Select Service</option>
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
        class="w-full border-b bg-transparent focus:outline-none px-2 py-2 placeholder:text-[#7A7A7A] font-body @if($errors->has('message')) border-red-500 @endif"
        required
      >{{ old('message') }}</textarea>

      @if ($errors->any())
        <div class="text-red-600 space-y-1 font-body">
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      <button
        type="submit"
        class="bg-[#D4D9E0] text-[#2D2D2D] px-8 py-3 font-body font-semibold hover:bg-[#A8B2C1] transition w-max shadow-md rounded"
      >
        SEND MESSAGE
      </button>
    </form>
    </div>
  </section>


    <!-- Footer -->    <footer class="bg-[#2D2D2D] text-white py-16">
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
    </footer>    <footer class="bg-[#1a2c23] text-[#E0E0E0] text-center py-6 font-body">
  <p>&copy; 2025 Tres Lente Studio. All rights reserved.</p>
</footer>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const images = document.querySelectorAll('.slideshow-image');
      let currentImageIndex = 0;

      function switchImage() {
        // Remove active class from all images
        images.forEach(img => img.classList.remove('active'));
        
        // Add active class to next image
        currentImageIndex = (currentImageIndex + 1) % images.length;
        images[currentImageIndex].classList.add('active');
      }

      // Switch image every 5 seconds
      setInterval(switchImage, 5000);
    });
  </script>
</body>
</html>
