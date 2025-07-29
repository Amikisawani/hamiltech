<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>HamilTech | Services informatiques</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>
<body class="bg-gray-100 text-gray-800 scroll-smooth">

    <!-- NAVBAR -->
<nav x-data="{ open: false }" class="bg-gray-900 text-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-bold text-indigo-400">HamilTech</a>
            </div>

            <!-- Desktop menu -->
            <div class="hidden md:flex space-x-6">
                <a href="#accueil" class="hover:text-indigo-400">Accueil</a>
                <a href="#services" class="hover:text-indigo-400">Services</a>
                <a href="#commander" class="hover:text-indigo-400">Commander</a>
                <a href="#apropos" class="hover:text-indigo-400">A propos</a>
                <a href="#contact" class="hover:text-indigo-400">Contact</a>
            </div>

            <!-- Mobile burger icon -->
            <div class="md:hidden">
                <button @click="open = !open" class="focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu links -->
    <div x-show="open" class="md:hidden px-4 pb-4 space-y-2 bg-gray-800">
        <a href="#accueil" @click="open = false" class="block hover:text-indigo-400">Accueil</a>
        <a href="#services" @click="open = false" class="block hover:text-indigo-400">Services</a>
        <a href="#commander" @click="open = false" class="block hover:text-indigo-400">Commander</a>
        <a href="#contact" @click="open = false" class="block hover:text-indigo-400">Contact</a>
    </div>
</nav>


    <!-- CONTENU PRINCIPAL -->
    <main id="accueil">
        @if (session('success'))
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            x-transition
            class="fixed top-6 right-6 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50"
        >
            {{ session('success') }}
        </div>
    @endif

        @yield('content')
    </main>

    <!-- FOOTER -->
 

</body>
</html>
