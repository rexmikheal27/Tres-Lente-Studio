<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tres Lente Studio - Services</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet" />
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
  </style>
</head>
<body class="bg-white text-gray-800">

  <!-- Navbar -->
  <nav class="fixed top-0 left-0 right-0 z-50 bg-white/10 backdrop-blur-lg shadow-sm">
    <div class="max-w-7xl mx-auto px-8 flex items-center justify-between h-16">
      <div class="text-3xl font-logo text-white cursor-pointer select-none">
        Tres Lente Studio
      </div>
      <ul class="flex space-x-10 text-lg font-semibold">
        <li><a href="{{ route('home') }}" class="nav-link text-white hover:text-gray-200">Home</a></li>
        <li><a href="{{ route('services') }}" class="nav-link text-white hover:text-gray-200 transition">Services</a></li>
        <li><a href="{{ route('about') }}" class="nav-link text-white hover:text-gray-200">About</a></li>
        <li><a href="{{ route('contact') }}" class="nav-link text-white hover:text-gray-200">Contact</a></li>
      </ul>
    </div>
  </nav>

  <!-- Services Section -->
  <section x-data="serviceModal()" class="min-h-screen py-24 bg-gray-900 px-8 text-center scroll-mt-20">
    <h2 class="text-4xl font-logo text-white mb-12 font-bold">Our Services</h2>

    <div class="grid md:grid-cols-3 gap-12 max-w-7xl mx-auto">
      <template x-for="(service, index) in services" :key="index">
        <div
          @click="openModal(service)"
          class="cursor-pointer bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl border border-white/10 transition duration-300 transform hover:scale-105 hover:-translate-y-1 hover:shadow-2xl hover:bg-white/20"
        >
          <h3 class="text-2xl font-semibold mb-4 text-white" x-text="service.title"></h3>
          <p class="text-gray-300" x-text="service.short"></p>
        </div>
      </template>
    </div>

<!-- Modal -->
<div
  x-show="showModal"
  x-transition
  class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50"
>
  <div
    @click.outside="showModal = false"
    class="bg-gray-900 text-white rounded-2xl p-10 shadow-2xl border border-white/10"
    style="width: 1100px; max-width: 95vw; height: 600px; max-height: 90vh;"
  >
    <button
      class="absolute top-4 right-4 text-gray-300 hover:text-white transition"
      @click="showModal = false"
    >
      <i class="ri-close-line text-3xl"></i>
    </button>

    <div class="flex gap-10 h-full">
      <!-- Left: Text -->
      <div class="w-1/2 overflow-y-auto">
        <h2 class="text-4xl font-bold text-yellow-300 mb-6" x-text="selected.title"></h2>
        <p class="text-gray-300 text-lg leading-relaxed text-justify" x-text="selected.description"></p>
      </div>

      <!-- Right: Image -->
      <div class="w-1/2">
        <img
          :src="selected.example"
          alt="Example"
          class="rounded-lg w-full h-full object-cover shadow-xl border border-white/10"
        />
      </div>
    </div>
  </div>
</div>



  <!-- Alpine.js Component -->
  <script>
  function serviceModal() {
    return {
      showModal: false,
      selected: {},
      services: [
        {
          title: 'Wedding Photography',
          short: 'Capturing your most special day with elegance and timeless beauty.',
          description: 'Our wedding photography services are tailored to capture every heartfelt moment of your big day—from the quiet anticipation before the ceremony to the joy of the celebration. We blend artistic direction with candid storytelling to produce timeless images that reflect your unique love story.',
          example: 'https://via.placeholder.com/600x400?text=Wedding+Photography'
        },
        {
          title: 'Portrait Sessions',
          short: 'Professional portraits for individuals, couples, or families.',
          description: 'Our portrait sessions are designed to highlight personality and emotion in every frame. Whether in studio or on location, we use creative lighting and composition to create polished portraits that feel personal, authentic, and refined.',
          example: 'https://via.placeholder.com/600x400?text=Portrait+Sessions'
        },
        {
          title: 'Event Coverage',
          short: 'Photo and video for corporate events, birthdays, and more.',
          description: 'We provide comprehensive event coverage for both personal and professional occasions. With a keen eye for detail and moments, our team captures the energy, emotion, and atmosphere of your events so you can relive them for years to come.',
          example: 'https://via.placeholder.com/600x400?text=Event+Coverage'
        },
        {
          title: 'Wedding Videos',
          short: 'Beautifully edited cinematic wedding videos.',
          description: 'Our wedding films are crafted with cinematic flair to tell your love story through motion. From vows and first dances to the subtle glances shared throughout the day, we create heartfelt, visually stunning videos you’ll cherish forever.',
          example: 'https://via.placeholder.com/600x400?text=Wedding+Videos'
        },
        {
          title: 'Prenup Videos',
          short: 'Romantic pre-wedding video shoots.',
          description: 'Prenup videos are a beautiful way to showcase your journey as a couple. We conceptualize and produce creative, emotionally resonant films set in locations that reflect your style and story—perfect for invitations or social media.',
          example: 'https://via.placeholder.com/600x400?text=Prenup+Videos'
        },
        {
          title: 'Birthday Videos',
          short: 'Lively birthday videos to capture joyful memories.',
          description: 'Celebrate another trip around the sun with dynamic and joyful birthday videos. We focus on the highlights, laughter, and heartfelt moments to create a vibrant reel that truly captures the spirit of your celebration.',
          example: 'https://via.placeholder.com/600x400?text=Birthday+Videos'
        },
        {
          title: 'Debut Videos',
          short: 'Cinematic debut coverage for your special 18th birthday.',
          description: 'Mark your coming-of-age in cinematic style. Our debut videos highlight the elegance, excitement, and emotion of your 18th birthday, with personalized touches that reflect your individuality and journey.',
          example: 'https://via.placeholder.com/600x400?text=Debut+Videos'
        },
        {
          title: 'Corporate Videos',
          short: 'Professional videos for business branding and events.',
          description: 'From company profiles to event coverage, our corporate video services are crafted to elevate your brand’s message. We produce clean, engaging visuals that enhance your presence both online and in presentations.',
          example: 'https://via.placeholder.com/600x400?text=Corporate+Videos'
        },
        {
          title: 'Wedding Photos',
          short: 'Timeless and romantic wedding photography.',
          description: 'Our wedding photos emphasize emotion, detail, and connection. We combine candid shots with styled compositions to build a complete and beautiful visual narrative of your special day.',
          example: 'https://via.placeholder.com/600x400?text=Wedding+Photos'
        },
        {
          title: 'Prenup Photos',
          short: 'Stylized pre-wedding photos in your favorite setting.',
          description: 'Capture your chemistry and story with our prenup photo sessions. From romantic outdoor escapes to chic urban shots, we tailor every session to reflect your love in the most meaningful way.',
          example: 'https://via.placeholder.com/600x400?text=Prenup+Photos'
        },
        {
          title: 'Debut Photos',
          short: 'Celebrate your coming-of-age with glamorous shots.',
          description: 'Our debut photography is designed to highlight your personality, poise, and beauty. With elegant poses, thoughtful lighting, and stylish backdrops, we ensure your debut feels like a true red-carpet moment.',
          example: 'https://via.placeholder.com/600x400?text=Debut+Photos'
        },
        {
          title: 'Birthday Photos',
          short: 'Cherish your birthday with joyful photography.',
          description: 'We capture birthdays with vibrant, fun, and heartfelt imagery. From the décor to the candid moments, our goal is to preserve every smile and surprise in high-quality, memorable photos.',
          example: 'https://via.placeholder.com/600x400?text=Birthday+Photos'
        }
      ],
      openModal(service) {
        this.selected = service;
        this.showModal = true;
      }
    }
  }
</script>


</body>
</html>
