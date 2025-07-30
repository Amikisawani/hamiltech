@extends('layouts.app')

@section('content')
    <!-- HERO SECTION -->
<section 
    x-data="{ activeSlide: 0, slides: [
        { title: 'Développement logiciel', desc: 'Applications web, mobiles & desktop sur mesure.', images: 'develop.jpg' },
        { title: 'Infographie', desc: 'Création de logos, flyers et visuels pros.', images: 'infog.jpg' },
        { title: 'Community Management', desc: 'Animation et stratégie de réseaux sociaux.', images: 'com.jpg' },
        { title: 'Maintenance informatique', desc: 'Dépannage, assistance et optimisation système.', images: 'maintenance.jpg' },
        { title: 'Assistance académique', desc: 'Rédaction et outils pour mémoires et TFC.', images: 'memoire.jpg' },
    ] }"
    x-init="setInterval(() => activeSlide = (activeSlide + 1) % slides.length, 5000)"
    class="w-full bg-gray-900 text-white"
>
    <div class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-2 items-center gap-8">
        <!-- Présentation + texte -->
        <div class="space-y-6">
            <h1 class="text-4xl font-bold" x-text="slides[activeSlide].title"></h1>
            
            <!-- Texte fixe de présentation de HamilTech -->
            <p class="text-gray-300">
                <strong>HamilTech</strong> est une startup innovante spécialisée dans les services informatiques :
                développement d'applications, infographie, maintenance, community management et accompagnement académique.
                Notre objectif est d'offrir des solutions modernes, efficaces et sur mesure à nos clients particuliers comme professionnels.
            </p>

            <!-- Description du service actif -->
            <p class="text-indigo-300 italic text-sm" x-text="slides[activeSlide].desc"></p>

            <a href="#commander" class="inline-block bg-indigo-600 hover:bg-indigo-700 px-6 py-3 rounded text-white font-semibold">
                Commander ce service
            </a>
        </div>

        <!-- Image dynamique à droite -->
        <div class="w-full h-[400px] overflow-hidden rounded-lg shadow-lg">
            <template x-for="(slide, index) in slides" :key="index">
                <img x-show="activeSlide === index" :src="'/images/' + slide.images"
                     class="w-full h-full object-cover transition-opacity duration-1000 ease-in-out"
                     alt=""
                     x-transition:enter="opacity-0"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="opacity-100"
                     x-transition:leave-end="opacity-0">
            </template>
        </div>
    </div>
</section>

    <!-- SERVICES SECTION -->
    <section id="services" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Nos Services</h2>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                    $services = [
                        ['title' => 'Développement logiciel', 'desc' => 'Applications web, mobile ou desktop selon vos besoins.', 'icon' => '💻'],
                        ['title' => 'Infographie', 'desc' => 'Design de logos, flyers, cartes de visite, et plus.', 'icon' => '🎨'],
                        ['title' => 'Community Management', 'desc' => 'Animation stratégique de vos réseaux sociaux.', 'icon' => '📱'],
                        ['title' => 'Maintenance Informatique', 'desc' => 'Dépannage, configuration & entretien PC.', 'icon' => '🛠️'],
                        ['title' => 'Assistance Académique', 'desc' => 'Rédaction et outils pour mémoires et TFC.', 'icon' => '📚'],
                        ['title' => 'Formation personnalisée', 'desc' => 'Apprenez les compétences numériques d’aujourd’hui.', 'icon' => '🧠'],
                    ];
                @endphp

                @foreach($services as $service)
                    <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition duration-300 text-center">
                        <div class="text-5xl mb-4">{{ $service['icon'] }}</div>
                        <h3 class="text-xl font-semibold text-indigo-700 mb-2">{{ $service['title'] }}</h3>
                        <p class="text-gray-600">{{ $service['desc'] }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

<!-- COMMANDER UN SERVICE -->
<section id="commander" class="py-20 bg-gray-50 text-gray-800">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Titre -->
        <h2 class="text-4xl font-bold text-center mb-16">Commander un service</h2>

        <div class="grid md:grid-cols-2 gap-12 items-center">

            <!-- Bloc gauche : texte + image -->
            <div class="space-y-6">
                <h3 class="text-3xl font-semibold">Nos services à portée de clic</h3>
                <p class="text-gray-600">
                    Vous avez besoin d’un logiciel sur mesure, d’un design professionnel ou d’une aide académique ?
                    <strong>HamilTech</strong> vous propose une gamme complète de services informatiques adaptés à vos besoins.
                </p>
                <p class="text-gray-600">
                    Remplissez simplement le formulaire ci-contre pour faire votre demande. Nous vous contacterons rapidement
                    pour finaliser les détails.
                </p>
                <img src="/images/commande.jpg" alt="Commande de service"
                     class="w-full max-h-72 object-cover rounded-lg shadow-md border border-gray-300">
            </div>

            <!-- Bloc droit : formulaire -->
            <form method="POST" action="{{ url('/commander') }}" class="bg-white shadow-lg rounded-lg p-8 space-y-4">
                @csrf

                <input type="text" name="nom" placeholder="Votre nom complet"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-300" />

                <input type="email" name="email" placeholder="Votre adresse email"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-300" />

                <input type="text" name="telephone" placeholder="Numéro de téléphone"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-300" />

                <select name="service"
                        class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-300">
                    <option value="">-- Sélectionnez un service --</option>
                    <option value="dev">Développement logiciel</option>
                    <option value="infographie">Infographie</option>
                    <option value="community">Community Management</option>
                    <option value="maintenance">Maintenance Informatique</option>
                    <option value="academique">Assistance Académique</option>
                </select>

                <textarea name="message" rows="5" placeholder="Détails de votre demande"
                          class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring focus:ring-indigo-300"></textarea>

                <button type="submit"
                        class="w-full bg-indigo-600 text-white font-semibold py-3 rounded hover:bg-indigo-700 transition">
                    Envoyer la commande
                </button>
            </form>
        </div>
    </div>
</section>



    <!-- À PROPOS -->
    <section id="apropos" class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row items-center gap-10">
            <div class="md:w-1/2">
                <img src="/images/gratitude.jpg" alt="À propos de HamilTech" class="rounded-lg shadow-md">
            </div>
            <div class="md:w-1/2">
                <h2 class="text-3xl font-bold text-indigo-600 mb-4">Pourquoi choisir HamilTech ?</h2>
                <p class="text-gray-700 text-lg">
                    Nous combinons technologie, créativité et expertise pour offrir des services numériques de haute qualité.
                    Notre équipe passionnée vous accompagne de la conception à la livraison, avec un suivi sur mesure.
                </p>
                <a href="#commander" class="mt-6 inline-block bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium shadow">
                    Commander un service
                </a>
            </div>
        </div>
    </section>



<!-- SECTION CONTACT -->
<section id="contact" class="py-20 bg-gray-50 text-gray-800">
    <div class="max-w-6xl mx-auto px-6">

        <!-- Titre -->
        <h2 class="text-4xl font-bold text-center mb-16">Contactez-nous</h2>

        <div class="grid md:grid-cols-2 gap-10">
            <!-- Coordonnées -->
            <div>
                <h3 class="text-3xl font-bold mb-6">Nos coordonnées</h3>
                <p class="mb-4">
                    📍 <strong>Adresse :</strong><br>
                    Av. Muhango 7, Quartier Kinsuka-Pecheur<br>
                    Commune de Ngaliema, Kinshasa, RDC
                </p>
                <p class="mb-4">
                    📞 <strong>Téléphone :</strong><br>
                    <a href="tel:+243840471829" class="text-indigo-600 underline hover:text-indigo-800">+243 840 471 829</a>
                </p>
                <p class="mb-4">
                    ✉️ <strong>Email :</strong><br>
                    <a href="mailto:amikisawani71@gmail.com" class="text-indigo-600 underline hover:text-indigo-800">amikisawani71@gmail.com</a>
                </p>
                <p class="text-sm text-gray-500">Disponible du lundi au samedi, de 8h à 18h</p>
            </div>

            <!-- Formulaire -->
            <div>
                <h3 class="text-3xl font-bold mb-6">Laissez-nous un message</h3>
                <form method="POST" action="{{ url('/contact') }}" class="space-y-4">
                    @csrf
                    <input type="text" name="nom" placeholder="Votre nom"
                           class="w-full px-4 py-2 rounded bg-white text-gray-800 border border-gray-300 focus:ring focus:ring-indigo-300" />

                    <input type="email" name="email" placeholder="Votre email"
                           class="w-full px-4 py-2 rounded bg-white text-gray-800 border border-gray-300 focus:ring focus:ring-indigo-300" />

                    <textarea name="message" rows="4" placeholder="Votre message"
                              class="w-full px-4 py-2 rounded bg-white text-gray-800 border border-gray-300 focus:ring focus:ring-indigo-300"></textarea>

                    <button type="submit"
                            class="bg-indigo-600 text-white font-semibold px-6 py-3 rounded hover:bg-indigo-700 transition">
                        Envoyer
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>



<!-- FOOTER -->
<footer class="bg-gray-900 text-gray-200 py-10">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 lg:grid-cols-3 gap-10 items-start">

        <!-- Logo et présentation -->
        <div>
            <h3 class="text-2xl font-bold text-indigo-400 mb-4">HamilTech</h3>
            <p class="text-sm text-gray-300">
                HamilTech est une startup spécialisée dans les solutions informatiques innovantes :
                développement logiciel, infographie, gestion réseaux sociaux, maintenance, et accompagnement académique.
            </p>
        </div>

        <!-- Coordonnées -->
        <div>
            <h4 class="text-lg font-semibold mb-4 text-white">Nous contacter</h4>
            <ul class="space-y-2 text-sm">
                <li>📍 Av. Muhango 7, Ngaliema, Kinshasa</li>
                <li>📞 <a href="tel:+243840471829" class="text-indigo-400 hover:underline">+243 840 471 829</a></li>
                <li>✉️ <a href="mailto:amikisawani71@gmail.com" class="text-indigo-400 hover:underline">amikisawani71@gmail.com</a></li>
            </ul>
        </div>

        <!-- Carte Google Maps -->
        <div>
            <h4 class="text-lg font-semibold mb-4 text-white">Localisation</h4>
            <iframe
                src="https://maps.google.com/maps?q=Kinshasa,+Ngaliema,+Av+Muhango+7&t=&z=13&ie=UTF8&iwloc=&output=embed"
                width="100%" height="200"
                class="rounded shadow-md border border-gray-700"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>

    <!-- Copyright -->
    <div class="mt-10 text-center text-sm text-gray-500 border-t border-gray-700 pt-6">
        &copy; {{ date('Y') }} HamilTech. Tous droits réservés. Kinshasa RDC.
    </div>
</footer>

             
@endsection
