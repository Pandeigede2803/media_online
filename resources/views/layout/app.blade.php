<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Berita')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-800 min-h-screen flex flex-col">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <a href="/" class="flex items-center space-x-2">
                        <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Berita</span>
                    </a>
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Home</a>
                    <a href="/kategori" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Kategori</a>
                    <a href="/trending" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Trending</a>
                    <a href="/about" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">About</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
        <div class="container mx-auto px-4 py-16">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class=" font-poppins text-4xl md:text-5xl font-bold mb-4">@yield('header-title', 'Berita Terkini')</h1>
                <p class="text-xl text-blue-100">@yield('header-subtitle', 'Dapatkan informasi terbaru dan terpercaya')</p>
            </div>
        </div>
        <!-- Decorative Wave -->
        <div class="relative h-16">
            <svg class="absolute bottom-0 w-full h-16 text-gray-50" preserveAspectRatio="none" viewBox="0 0 1440 54">
                <path fill="currentColor" d="M0 22L120 16.7C240 11 480 1 720 1C960 1 1200 11 1320 16.7L1440 22V54H1320C1200 54 960 54 720 54C480 54 240 54 120 54H0V22Z"></path>
            </svg>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-8">
        <!-- Breadcrumbs -->
        <div class="text-sm text-gray-600 mb-8">
            @yield('breadcrumbs')
        </div>

        <!-- Content Area -->
        <div class="bg-white rounded-lg shadow-sm p-6 md:p-8">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold text-white">Berita</h3>
                    <p class="text-sm">Sumber berita terpercaya untuk informasi terkini dan mendalam.</p>
                </div>
                
                <!-- Quick Links -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-white">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="/about" class="hover:text-white transition-colors duration-200">About Us</a></li>
                        <li><a href="/contact" class="hover:text-white transition-colors duration-200">Contact</a></li>
                        <li><a href="/privacy" class="hover:text-white transition-colors duration-200">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <!-- Categories -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-white">Categories</h4>
                    <ul class="space-y-2">
                        <li><a href="/kategori/nasional" class="hover:text-white transition-colors duration-200">Nasional</a></li>
                        <li><a href="/kategori/internasional" class="hover:text-white transition-colors duration-200">Internasional</a></li>
                        <li><a href="/kategori/teknologi" class="hover:text-white transition-colors duration-200">Teknologi</a></li>
                    </ul>
                </div>
                
                <!-- Newsletter -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-white">Newsletter</h4>
                    <form class="space-y-2">
                        <input type="email" placeholder="Your email" class="w-full px-3 py-2 bg-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-200">Subscribe</button>
                    </form>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="mt-12 pt-8 border-t border-gray-700 text-center text-sm">
                <p>&copy; {{ date('Y') }} Berita. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu (Hidden by default) -->
    <div class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 z-50" id="mobile-menu">
        <div class="bg-white h-full w-64 p-6">
            <div class="flex justify-between items-center mb-8">
                <span class="text-xl font-bold">Menu</span>
                <button class="text-gray-500 hover:text-gray-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <nav class="space-y-4">
                <a href="/" class="block text-gray-600 hover:text-blue-600">Home</a>
                <a href="/kategori" class="block text-gray-600 hover:text-blue-600">Kategori</a>
                <a href="/trending" class="block text-gray-600 hover:text-blue-600">Trending</a>
                <a href="/about" class="block text-gray-600 hover:text-blue-600">About</a>
            </nav>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('[aria-label="Menu"]');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>