<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tres Lente Studio - Services</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- Google Fonts -->    
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <style>
    [x-cloak] { display: none !important; }

    /* Custom Scrollbar Styles */
    .scrollbar-thin::-webkit-scrollbar {
      width: 4px;
    }

    .scrollbar-thin::-webkit-scrollbar-track {
      background: transparent;
    }

    .scrollbar-thin::-webkit-scrollbar-thumb {
      background-color: rgba(156, 163, 175, 0.5);
      border-radius: 20px;
    }

    .scrollbar-thin::-webkit-scrollbar-thumb:hover {
      background-color: rgba(156, 163, 175, 0.8);
    }

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

  <!-- Services Section -->  <section x-data="serviceModal()" class="min-h-screen py-24 bg-[#F5F5F5] px-8 text-center">
    <h2 class="text-4xl font-logo text-[#2D2D2D] mb-12 font-bold">Our Services</h2>    <div class="columns-1 md:columns-2 lg:columns-3 xl:columns-3 gap-3 max-w-7xl mx-auto mb-16 px-4 [column-fill:_balance]">
      <template x-for="(service, index) in services" :key="index">
        <div class="group relative bg-white rounded-xl shadow-md mb-3 break-inside-avoid overflow-hidden transform transition duration-300 hover:-translate-y-1 hover:shadow-xl">
          <!-- Image Container -->
          <div class="relative w-full overflow-hidden"
               :class="{
                 'aspect-[2/3]': index % 5 === 0,
                 'aspect-[3/4]': index % 5 === 1,
                 'aspect-[4/5]': index % 5 === 2,
                 'aspect-[1/1]': index % 5 === 3,
                 'aspect-[9/16]': index % 5 === 4
               }">
            <img :src="service.example" :alt="service.title" class="w-full h-full object-cover">            <!-- Hover Overlay -->
            <div class="absolute inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition-all duration-300">
              <div class="h-full p-6 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-transparent">
                <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                  <h3 class="text-2xl font-logo mb-3 text-white" x-text="service.title"></h3>
                  <p class="text-[#E0E0E0] text-sm leading-relaxed mb-3" x-text="service.short"></p>
                  <p class="text-[#E0E0E0] text-sm leading-relaxed" x-text="service.description"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </template>    </div>
  </section>

  <!-- Alpine.js Component -->
  <script>  function serviceModal() {
    return {
      services: [
        {
          title: 'Birthday Photos',
          short: 'Cherish your birthday with joyful photography.',
          description: 'Our birthday photography service combines artistic vision with candid storytelling to capture the essence of your celebration. From intimate family gatherings to grand parties, we specialize in documenting every meaningful moment—the anticipation of cake-cutting, heartfelt embraces, and spontaneous laughter. Our photographers work discreetly yet effectively, ensuring no precious moment goes uncaptured while maintaining the natural flow of your celebration. We utilize professional-grade equipment and creative lighting techniques to deliver stunning images that will help you relive these special moments for years to come.',
          example: '{{ asset("services (1).png") }}'
        },
        {
          title: 'Birthday Videos',
          short: 'Lively birthday videos to capture joyful memories.',
          description: 'Our birthday videography service creates cinematic narratives of your celebration that go beyond simple event documentation. Using state-of-the-art equipment and creative storytelling techniques, we craft a compelling visual story that captures both the grand moments and subtle nuances of your special day. Our videographers expertly blend candid footage with carefully composed shots, incorporating professional audio recording to capture heartfelt wishes and speeches. The final product includes beautifully edited footage with color grading, background music, and seamless transitions, delivered in high-definition format for lasting quality.',
          example: '{{ asset("services (2).png") }}'
        },
        {
          title: 'Corporate Videos',
          short: 'Professional videos for business branding and events.',
          description: 'Our corporate video production service delivers polished, professional content that elevates your brand\'s message and engages your target audience. We offer comprehensive video solutions including company profiles, product demonstrations, training materials, and event documentation. Our team combines industry expertise with creative storytelling to produce compelling narratives that resonate with your stakeholders. We utilize advanced filming techniques, professional sound recording, and sophisticated editing to ensure your message is conveyed with clarity and impact. Each project includes thorough pre-production planning, professional scripting, and post-production excellence.',
          example: '{{ asset("services (3).png") }}'
        },
        {
          title: 'Debut Photos',
          short: 'Celebrate your coming-of-age with glamorous shots.',
          description: 'Our debut photography service transforms your milestone 18th celebration into timeless artistic imagery. We blend contemporary fashion photography techniques with traditional debut customs to create a sophisticated visual narrative of your special day. Our approach includes elegant portrait sessions, capturing traditional ceremonies, and documenting candid moments with family and friends. We pay meticulous attention to lighting, composition, and timing to ensure every image reflects the sophistication of the occasion. Our service includes pre-event consultation, multiple professional photographers, and carefully curated post-processing to deliver magazine-worthy images that celebrate this significant milestone.',
          example: '{{ asset("services (4).png") }}'
        },
        {
          title: 'Debut Videos',
          short: 'Cinematic debut coverage for your special 18th birthday.',
          description: 'Our debut videography service creates an enchanting cinematic experience that captures the magic of your transition into adulthood. Using premium cinematographic equipment and techniques, we craft a compelling visual narrative that highlights both the grandeur and intimate moments of your celebration. Our comprehensive coverage includes artistic pre-debut footage, ceremony highlights, and reception celebrations, all woven together with professional audio recording of speeches and musical performances. The final film features sophisticated editing techniques, color grading, and carefully selected musical scoring to create a memorable keepsake of your special day.',
          example: '{{ asset("services (5).png") }}'
        },
        {
          title: 'Event Coverage',
          short: 'Photo and video for corporate events, birthdays, and more.',
          description: 'Our event coverage service provides comprehensive documentation of your occasions through both photography and videography. We specialize in capturing the atmosphere, energy, and key moments of any event, from corporate conferences to intimate celebrations. Our team employs a multi-camera setup with strategic positioning to ensure complete coverage from various angles. We utilize advanced lighting techniques and professional audio recording equipment to deliver high-quality content regardless of venue conditions. Our service includes pre-event planning, on-site coordination, and professional post-production to create a cohesive narrative of your event.',
          example: '{{ asset("services (6).png") }}'
        },
        {
          title: 'Portrait Sessions',
          short: 'Professional portraits for individuals, couples, or families.',
          description: 'Our portrait photography service offers a personalized experience that captures the essence of individuals, couples, and families. We begin with a consultation to understand your vision and preferences, followed by careful location scouting or studio setup to create the perfect backdrop for your story. Our photographers excel in making subjects feel comfortable and natural in front of the camera, resulting in authentic expressions and genuine moments. We utilize professional lighting techniques and high-end equipment to ensure exceptional image quality. Each session includes wardrobe consultation, multiple poses and setups, and meticulous post-processing to deliver stunning portraits that reflect your personality.',
          example: '{{ asset("services (7).png") }}'
        },
        {
          title: 'Prenup Photos',
          short: 'Stylized pre-wedding photos in your favorite setting.',
          description: 'Our pre-wedding photography service creates romantic, magazine-worthy images that tell your unique love story. We begin with an in-depth consultation to understand your journey as a couple and design a shoot that reflects your personality and style. Our team scouts multiple locations to find the perfect backdrops that complement your vision, whether it\'s urban landscapes, natural settings, or meaningful places in your relationship. We provide expert guidance on styling, poses, and expressions while maintaining natural chemistry between couples. Our service includes professional lighting setup, multiple outfit changes, and artistic post-processing to create a stunning collection of images perfect for wedding invitations and displays.',
          example: '{{ asset("services (8).png") }}'
        },
        {
          title: 'Prenup Videos',
          short: 'Romantic pre-wedding video shoots.',
          description: 'Our pre-wedding videography service creates cinematic love stories that showcase your journey as a couple. Using high-end cinema cameras and creative filming techniques, we produce engaging short films that capture both staged moments and natural interactions. Our approach includes dramatic aerial shots, intimate close-ups, and creative transitions to create a dynamic viewing experience. We incorporate professional audio recording for heartfelt messages and background music that complements your story. The final product includes sophisticated editing, color grading, and sound design to create a romantic film that builds anticipation for your wedding day.',
          example: '{{ asset("services (9).png") }}'
        },
        {
          title: 'Wedding Photos',
          short: 'Timeless and romantic wedding photography.',
          description: 'Our wedding photography service provides comprehensive coverage of your special day with an artistic and photojournalistic approach. We capture everything from elaborate details to candid emotions, creating a complete visual narrative of your celebration. Our team includes multiple photographers strategically positioned to document parallel moments and different perspectives. We utilize professional lighting equipment to handle any lighting situation, from bright outdoor ceremonies to dimly lit receptions. Our service includes pre-wedding consultation, detailed timeline planning, and sophisticated post-processing to deliver a stunning collection of images that tell your complete wedding story.',
          example: '{{ asset("services (10).png") }}'
        },
        {
          title: 'Wedding Videos',
          short: 'Beautifully edited cinematic wedding videos.',
          description: 'Our wedding videography service creates cinematic masterpieces that immortalize your special day. Using multiple professional-grade cameras and sophisticated audio equipment, we capture every significant moment with artistic precision. Our coverage begins with preparation footage, following through to ceremony highlights and reception celebrations. We employ a combination of stabilized camera movements, drone footage, and intimate handheld shots to create dynamic and engaging visuals. The final film features carefully curated moments, professional audio mixing of vows and speeches, custom musical scoring, and advanced color grading to produce a wedding film that exceeds expectations.',
          example: '{{ asset("services (11).png") }}'
        }      ]
    }
  }
  </script>

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
