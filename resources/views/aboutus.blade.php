<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tres Lente Studio - About Us</title>
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
  </nav>

  <!-- About Hero Section -->
  <section id="about"
    class="relative w-full min-h-screen bg-cover bg-center bg-no-repeat flex items-center pt-16"
    style="background-image: url('{{ asset('about1.png') }}');">
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Content -->
    <div class="relative z-10 w-full max-w-7xl px-8 mx-auto grid md:grid-cols-2 gap-10 items-center py-20">
      <!-- Left: Text -->
      <div class="text-white">
        <h2 class="text-5xl font-logo font-bold mb-6 leading-tight drop-shadow-md">
          Capturing Love, Framing Forever
        </h2>
        <p class="text-lg md:text-xl leading-relaxed drop-shadow-sm mb-6">
          At Tres Lente Studio, we don't just take pictures—we preserve emotion, laughter, and the quiet moments in between. Every frame is a story told in light, every film a timeless chapter of your life's most meaningful days.
        </p>
        <p class="text-lg md:text-xl leading-relaxed drop-shadow-sm">
          Whether you're walking down the aisle, celebrating milestones, or launching something new, we are here to turn fleeting seconds into cherished keepsakes—crafted with artistry, elegance, and soul.
        </p>
      </div>
    </div>
  </section>


<!-- About Section (unchanged) -->
<!-- ... your About Section here ... -->

<!-- New Section -->
<section class="bg-[#F5F5F5] text-[#2D2D2D] py-20 px-6">
  <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">

    <!-- Left: Text Content -->
    <div>
      <p class="uppercase text-sm tracking-wide text-gray-400 mb-2">More About Us</p>
      <h2 class="text-4xl md:text-5xl font-serif font-bold mb-6 leading-tight">
        Crafting Moments into Masterpieces
      </h2>
      <p class="text-lg leading-relaxed mb-4">
        Step into a world where every detail matters. Our passion is capturing those once-in-a-lifetime expressions, emotions, and milestones. From subtle glances to roaring celebrations, we transform fleeting moments into timeless art.
      </p>
      <p class="text-lg leading-relaxed">
        Trust us to frame your life's highlights with precision, passion, and creativity.
      </p>
    </div>    <!-- Right: Images -->
    <div class="grid grid-cols-2 gap-2">
      <div class="col-span-1 md:col-span-1">
        <img src="about2.png" alt="Large" class="w-full h-full object-cover shadow-lg">
      </div>
      <div class="grid grid-rows-2 gap-2 md:col-span-1">
        <img src="about3.png" alt="Small1" class="w-full h-full object-cover shadow-lg">
        <img src="about4.png" alt="Small2" class="w-full h-full object-cover shadow-lg">
      </div>
    </div>

  </div> <!-- 🔴 this closing div was missing -->
</section>

<!-- Mission Vision Values Section -->
<section class="bg-[#F5F5F5] py-20 px-6">
  <div class="flex flex-wrap justify-center gap-8 max-w-7xl mx-auto">
    <!-- Mission Card -->
    <div class="bg-white/90 backdrop-blur-md p-8 rounded-xl shadow-xl w-96 text-center transform transition duration-300 hover:scale-105">
      <img src="{{ asset('logob1.png') }}" alt="Mission Icon" class="w-16 h-16 mx-auto mb-4">
      <h3 class="text-2xl font-logo font-bold mb-4 text-[#2D2D2D]">Our Mission</h3>
      <p class="text-[#5A5A5A]">At Tres Lente Studio, our mission is to exceed client expectations by delivering exceptional photography and videography services that blend artistic vision with technical excellence. We aim to authentically capture life's most meaningful moments, turning them into timeless visual stories that preserve cherished memories for a lifetime.</p>
    </div>

    <!-- Vision Card -->
    <div class="bg-white/90 backdrop-blur-md p-8 rounded-xl shadow-xl w-96 text-center transform transition duration-300 hover:scale-105">
      <img src="{{ asset('logob2.png') }}" alt="Vision Icon" class="w-16 h-16 mx-auto mb-4">
      <h3 class="text-2xl font-logo font-bold mb-4 text-[#2D2D2D]">Our Vision</h3>
      <p class="text-[#5A5A5A]">We envision Tres Lente Studio as a premier name in the visual storytelling industry, driven by creativity, innovation, and a commitment to global standards. Through continuous growth and forward-thinking practices, we aim to become a trusted partner in creating emotionally resonant and visually stunning narratives for clients across all walks of life.</p>
    </div>

    <!-- Values Card -->
    <div class="bg-white/90 backdrop-blur-md p-8 rounded-xl shadow-xl w-96 text-center transform transition duration-300 hover:scale-105">
      <img src="{{ asset('logob3.png') }}" alt="Values Icon" class="w-16 h-16 mx-auto mb-4">
      <h3 class="text-2xl font-logo font-bold mb-4 text-[#2D2D2D]">Our Values</h3>
      <p class="text-[#5A5A5A]">At Tres Lente Studio, we value quality, creativity, and client-centered service. We use professional-grade equipment, uphold transparent pricing, and offer personalized packages tailored to each client's vision. Our team is dedicated to delivering exceptional results with integrity, collaboration, and punctuality—ensuring a smooth, inspiring experience from consultation to delivery.</p>
    </div>
  </div>
</section>

<!-- Team Section -->
<section class="bg-[#FFFFFF] py-20 px-8">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-4xl font-logo text-[#2D2D2D] mb-16 font-bold text-center">Experience the Exceptional with Us</h2>
    
    <div class="grid md:grid-cols-2 gap-12 items-center">      <!-- Left: Images Grid -->
      <div class="grid grid-cols-2 gap-2">
        <div class="col-span-1 md:col-span-1">
          <div class="h-[500px]"> <!-- Increased height for main image -->
            <img src="{{ asset('team1.png') }}" alt="Studio Image" class="w-full h-full object-cover shadow-lg" />
          </div>
        </div>
        <div class="grid grid-rows-2 gap-2 md:col-span-1">
          <div class="h-[250px]"> <!-- Increased height for top image -->
            <img src="{{ asset('team2.png') }}" alt="Studio Detail" class="w-full h-full object-cover shadow-lg" />
          </div>
          <div class="h-[240px]"> <!-- Increased height for bottom image -->
            <img src="{{ asset('team3.png') }}" alt="Studio Work" class="w-full h-full object-cover shadow-lg" />
          </div>
        </div>
      </div>

      <!-- Right: Text Content -->
      <div class="flex flex-col justify-center">
        <p class="text-[#7A7A7A] text-lg leading-relaxed mb-6">
          We believe that photos and videos are not just art forms of today. They are more than just reflections of craft. They are priceless visuals. Each format captures a second or a minute of fleeting memories. While you can always capture the mundane and ordinary moments of your life, it is always worthwhile to invest in the events that matter.
        </p>
        <p class="text-[#7A7A7A] text-lg leading-relaxed mb-6">
          Working with Tres Lente Studio means partnering with the experts. When you need stunning images and records of your special moments, we will be there. Every laugh, embrace, and kiss is captured artistically by our team. Dedicated to giving you the best treasures, our services are here to be your bridges to your life-changing milestones.
        </p>
        <p class="text-[#7A7A7A] text-lg leading-relaxed">
          Let our team be your partners for creativity and memory-collecting. Our mission to become your extra pairs of eyes in your significant events is unparalleled. We will capture every angle, cranny, and nook in a seamless experience. Embark on high-quality photography and videography services with Tres Lente Studio.
        </p>
      </div>
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
