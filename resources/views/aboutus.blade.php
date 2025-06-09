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
  <li><a href="{{ route('home') }}" class="nav-link text-white hover:text-gray-200 transition">Home</a></li>
<li><a href="{{ route('services') }}" class="nav-link text-white hover:text-gray-200 transition">Services</a></li>
<li><a href="{{ route('about') }}" class="nav-link text-white hover:text-gray-200 transition">About</a></li>
<li><a href="{{ route('contact') }}" class="nav-link text-white hover:text-gray-200 transition">Contact</a></li>

      </ul>
    </div>
  </nav>

<!-- About Section -->
<section id="about"
  class="relative w-full min-h-screen bg-cover bg-center bg-no-repeat flex items-center"
  style="background-image: url('/wed2.jpg');">
  
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black bg-opacity-60"></div>

  <!-- Content -->
  <div class="relative z-10 w-full max-w-6xl px-6 mx-auto grid md:grid-cols-2 gap-10 items-center py-20">
    
    <!-- Left: Text -->
    <div class="text-white">
      <h2 class="text-5xl font-bold leading-tight mb-6 font-serif">
        Capturing Love, Framing Forever
      </h2>
      <p class="text-lg leading-relaxed">
        At Tres Lente Studio, we don’t just take pictures—we preserve emotion, laughter, and the quiet moments in between. Every frame is a story told in light, every film a timeless chapter of your life’s most meaningful days. <br><br>
        Whether you're walking down the aisle, celebrating milestones, or launching something new, we are here to turn fleeting seconds into cherished keepsakes—crafted with artistry, elegance, and soul.
      </p>
    </div>
  </div>
</section>


<!-- About Section (unchanged) -->
<!-- ... your About Section here ... -->

<!-- New Section -->
<section class="bg-[#1f1f1f] text-white py-20 px-6">
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
    </div>

    <!-- Right: Images -->
    <div class="grid grid-cols-2 gap-4">
      <div class="col-span-2 md:col-span-1">
        <img src="pic1.png" alt="Large" class="w-full h-full object-cover rounded-lg border-4 border-white shadow-lg">
      </div>
      <div class="grid grid-rows-2 gap-4 md:col-span-1">
        <img src="pic2.png" alt="Small1" class="w-full h-full object-cover rounded-lg border-4 border-white shadow-lg">
        <img src="pic3.png" alt="Small2" class="w-full h-full object-cover rounded-lg border-4 border-white shadow-lg">
      </div>
    </div>

  </div> <!-- 🔴 this closing div was missing -->
</section>

<section class="bg-[#1f1f1f] py-20 px-6 text-white">
  <div class="flex flex-wrap justify-center gap-8">
<!-- Mission Card -->
<div class="border border-gray-700 rounded-lg p-8 w-96 text-center">
  <img src="mission.png" alt="Mission Icon" class="w-16 h-16 mx-auto mb-4">
  <h3 class="text-2xl font-semibold mb-4">Our Mission</h3>
  <p class="text-gray-300">To exceed customer expectations by delivering excellent quality service in capturing unforgettable moments and preserving memories of a lifetime.</p>
</div>

<!-- Vision Card -->
<div class="border border-gray-700 rounded-lg p-8 w-96 text-center">
  <img src="vision.png" alt="Vision Icon" class="w-16 h-16 mx-auto mb-4">
  <h3 class="text-2xl font-semibold mb-4">Our Vision</h3>
  <p class="text-gray-300">Tres Lente Studio is a pillar in its industry through innovation, expansion, and global competitiveness.</p>
</div>

<!-- Values Card -->
<div class="border border-gray-700 rounded-lg p-8 w-96 text-center">
  <img src="values.png" alt="Values Icon" class="w-16 h-16 mx-auto mb-4">
  <h3 class="text-2xl font-semibold mb-4">Our Values</h3>
  <p class="text-gray-300">
    At Tres Lente Studio, we harness the power of visual storytelling and cherish timeless memories. Our commitment to excellence drives us to provide:
    <br><br>
    <strong>Quality:</strong> Using advanced technology and skilled professionals.
    <br>
    <strong>Value:</strong> Transparent pricing and customizable packages.
    <br>
    <strong>Personalized Service:</strong> From consultation to delivery, exceeding expectations with every client interaction.
  </p>
</div>


  </div>
</section>

<!-- New Section -->
<section
  class="relative bg-[#1f1f1f] text-white py-20 px-6"
  style="background-image: url('bg.jpg'); background-size: cover; background-position: center;"
>
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black opacity-60 pointer-events-none"></div>

  <div class="relative max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
    <!-- Left: Text Content -->
    <div class="grid grid-cols-2 gap-4">
      <div class="col-span-2 md:col-span-1">
        <img src="pic6.png" alt="Large" class="w-full h-full object-cover rounded-lg border-4 border-white shadow-lg" />
      </div>
      <div class="grid grid-rows-2 gap-4 md:col-span-1">
        <img src="pic5.png" alt="Small1" class="w-full h-full object-cover rounded-lg border-4 border-white shadow-lg" />
        <img src="pic4.png" alt="Small2" class="w-full h-full object-cover rounded-lg border-4 border-white shadow-lg" />
      </div>
    </div>

    <!-- Right: Text Content -->
    <div class="pl-6 md:pl-12"> <!-- added padding-left -->
  <h2 class="text-4xl md:text-5xl font-serif font-bold mb-6 leading-tight">
    Experience the Exceptional with Us
  </h2>
  <p class="text-lg leading-relaxed mb-4">
        We believe that photos and videos are not just the art forms of today. They are more than just reflections of craft. They are priceless visuals. Each format captures a second or a minute of fleeting memories. While you can always capture the mundane and ordinary moments of your life, it is always worthwhile to invest in the events that matter.
  </p>
  <p class="text-lg leading-relaxed mb-4">
        Working with Tres Lente Studio means partnering with the experts. When you need stunning images and records of your special moments, we will be there. Every laugh, embrace, and kiss is captured artistically by our team. Dedicated to giving you the best treasures, our services are here to be your bridges to your life-changing milestones.
  </p>
  <p class="text-lg leading-relaxed">
        Let our team be your partners for creativity and memory-collecting. Our mission to become your extra pairs of eyes in your significant events is unparalleled. We will capture every angle, cranny, and nook in a seamless experience. Embark on high-quality photography and videography services with Tres Lente Studio.
  </p>
</div>
  </div>
</section>


</body>
</html>
