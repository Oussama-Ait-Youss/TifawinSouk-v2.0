<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TifawinSouk - Plateforme de Gestion du Commerce Local</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .category-card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        .product-badge {
            background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white shadow-lg">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex items-center flex-shrink-0">
                        <i class="mr-3 text-2xl text-purple-600 fas fa-store"></i>
                        <span class="text-xl font-bold text-gray-800">TifawinSouk</span>
                    </div>
                    <div class="hidden md:ml-10 md:flex md:space-x-8">
                        <a href="#" class="px-3 py-2 text-sm font-medium text-gray-900 hover:text-purple-600">Accueil</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-purple-600">Produits</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-purple-600">Catégories</a>
                        <a href="#" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-purple-600">Contact</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher un produit..." class="w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                        <button class="absolute right-2 top-2.5 text-gray-400 hover:text-purple-600">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <button class="relative p-2 text-gray-600 hover:text-purple-600">
                        <i class="text-xl fas fa-shopping-cart"></i>
                        <span class="absolute flex items-center justify-center w-5 h-5 text-xs text-white bg-red-500 rounded-full -top-1 -right-1">0</span>
                    </button>
                    <!-- All auth handled by Filament: use the admin panel login -->
                    <a href="/admin" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition">
                        Connexion
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="py-20 text-white hero-gradient">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="mb-6 text-4xl font-bold md:text-6xl">
                    Bienvenue chez TifawinSouk
                </h1>
                <p class="mb-8 text-xl text-purple-100 md:text-2xl">
                    Votre plateforme de commerce local au Maroc
                </p>
                <div class="flex justify-center space-x-4">
                    <button class="px-8 py-3 font-semibold text-purple-600 transition bg-white rounded-lg hover:bg-gray-100">
                        Parcourir les produits
                    </button>
                    <button class="px-8 py-3 font-semibold text-white transition border-2 border-white rounded-lg hover:bg-white hover:text-purple-600">
                        En savoir plus
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <div class="text-center">
                    <div class="flex items-center justify-center w-16 h-16 p-4 mx-auto mb-4 bg-purple-100 rounded-full">
                        <i class="text-2xl text-purple-600 fas fa-truck"></i>
                    </div>
                    <h3 class="mb-2 text-lg font-semibold">Livraison Rapide</h3>
                    <p class="text-gray-600">Livraison rapide et fiable partout au Maroc</p>
                </div>
                <div class="text-center">
                    <div class="flex items-center justify-center w-16 h-16 p-4 mx-auto mb-4 bg-purple-100 rounded-full">
                        <i class="text-2xl text-purple-600 fas fa-shield-alt"></i>
                    </div>
                    <h3 class="mb-2 text-lg font-semibold">Paiement Sécurisé</h3>
                    <p class="text-gray-600">Paiements 100% sécurisés et protégés</p>
                </div>
                <div class="text-center">
                    <div class="flex items-center justify-center w-16 h-16 p-4 mx-auto mb-4 bg-purple-100 rounded-full">
                        <i class="text-2xl text-purple-600 fas fa-headset"></i>
                    </div>
                    <h3 class="mb-2 text-lg font-semibold">Support 24/7</h3>
                    <p class="text-gray-600">Service client disponible à tout moment</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16 bg-gray-50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-900">Nos Catégories</h2>
                <p class="max-w-2xl mx-auto text-gray-600">
                    Découvrez notre large gamme de produits organisés par catégories pour faciliter vos achats
                </p>
            </div>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                <!-- Category Cards -->
                <div class="p-6 text-white rounded-lg cursor-pointer category-card card-hover">
                    <div class="flex items-center justify-center w-12 h-12 p-3 mb-4 bg-white rounded-full bg-opacity-20">
                        <i class="text-2xl fas fa-tshirt"></i>
                    </div>
                    <h3 class="mb-2 text-lg font-semibold">Vêtements</h3>
                    <p class="text-sm opacity-90">Mode et accessoires</p>
                </div>
                <div class="p-6 text-white rounded-lg cursor-pointer bg-gradient-to-br from-green-400 to-blue-500 card-hover">
                    <div class="flex items-center justify-center w-12 h-12 p-3 mb-4 bg-white rounded-full bg-opacity-20">
                        <i class="text-2xl fas fa-laptop"></i>
                    </div>
                    <h3 class="mb-2 text-lg font-semibold">Électronique</h3>
                    <p class="text-sm opacity-90">Appareils et gadgets</p>
                </div>
                <div class="p-6 text-white rounded-lg cursor-pointer bg-gradient-to-br from-yellow-400 to-orange-500 card-hover">
                    <div class="flex items-center justify-center w-12 h-12 p-3 mb-4 bg-white rounded-full bg-opacity-20">
                        <i class="text-2xl fas fa-home"></i>
                    </div>
                    <h3 class="mb-2 text-lg font-semibold">Maison</h3>
                    <p class="text-sm opacity-90">Meubles et décoration</p>
                </div>
                <div class="p-6 text-white rounded-lg cursor-pointer bg-gradient-to-br from-pink-400 to-red-500 card-hover">
                    <div class="flex items-center justify-center w-12 h-12 p-3 mb-4 bg-white rounded-full bg-opacity-20">
                        <i class="text-2xl fas fa-basketball-ball"></i>
                    </div>
                    <h3 class="mb-2 text-lg font-semibold">Sports</h3>
                    <p class="text-sm opacity-90">Équipements sportifs</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-16 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-900">Produits Populaires</h2>
                <p class="max-w-2xl mx-auto text-gray-600">
                    Les produits les plus appréciés par nos clients
                </p>
            </div>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                <!-- Product Cards -->
                @for($i = 1; $i <= 8; $i++)
                <div class="overflow-hidden bg-white rounded-lg shadow-md card-hover">
                    <div class="relative">
                        <div class="flex items-center justify-center h-48 bg-gray-200">
                            <i class="text-4xl text-gray-400 fas fa-image"></i>
                        </div>
                        @if($i % 3 == 0)
                        <span class="absolute px-2 py-1 text-xs text-white rounded-full top-2 right-2 product-badge">
                            -20%
                        </span>
                        @endif
                        @if($i % 4 == 0)
                        <span class="absolute px-2 py-1 text-xs text-white bg-red-500 rounded-full top-2 left-2">
                            Nouveau
                        </span>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="mb-2 font-semibold text-gray-900">Produit {{ $i }}</h3>
                        <p class="mb-3 text-sm text-gray-600">Description courte du produit {{ $i }}</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-xl font-bold text-purple-600">{{ rand(100, 999) }} DH</span>
                                @if($i % 3 == 0)
                                <span class="ml-2 text-sm text-gray-400 line-through">{{ rand(1200, 1999) }} DH</span>
                                @endif
                            </div>
                            <button class="p-2 text-white transition bg-purple-600 rounded-lg hover:bg-purple-700">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                        <div class="mt-2">
                            <div class="flex items-center">
                                <div class="flex text-yellow-400">
                                    @for($j = 1; $j <= rand(3, 5); $j++)
                                    <i class="text-sm fas fa-star"></i>
                                    @endfor
                                    @for($j = rand(3, 5); $j < 5; $j++)
                                    <i class="text-sm far fa-star"></i>
                                    @endfor
                                </div>
                                <span class="ml-2 text-xs text-gray-500">({{ rand(10, 99) }})</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <div class="mt-12 text-center">
                <button class="px-8 py-3 font-semibold text-white transition bg-purple-600 rounded-lg hover:bg-purple-700">
                    Voir tous les produits
                </button>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 text-white bg-purple-600">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 text-center md:grid-cols-4">
                <div>
                    <div class="mb-2 text-4xl font-bold">{{ rand(1000, 9999) }}</div>
                    <div class="text-purple-200">Produits vendus</div>
                </div>
                <div>
                    <div class="mb-2 text-4xl font-bold">{{ rand(100, 999) }}</div>
                    <div class="text-purple-200">Clients satisfaits</div>
                </div>
                <div>
                    <div class="mb-2 text-4xl font-bold">{{ rand(10, 99) }}</div>
                    <div class="text-purple-200">Fournisseurs partenaires</div>
                </div>
                <div>
                    <div class="mb-2 text-4xl font-bold">{{ rand(1, 5) }}</div>
                    <div class="text-purple-200">Années d'expérience</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-gray-50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-900">Restez informé</h2>
                <p class="mb-8 text-gray-600">
                    Abonnez-vous à notre newsletter pour recevoir les dernières offres et nouveautés
                </p>
                <div class="flex flex-col max-w-md gap-4 mx-auto sm:flex-row">
                    <input type="email" placeholder="Votre adresse email" class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                    <button class="px-6 py-3 font-semibold text-white transition bg-purple-600 rounded-lg hover:bg-purple-700">
                        S'abonner
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 text-white bg-gray-900">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="mr-3 text-2xl text-purple-400 fas fa-store"></i>
                        <span class="text-xl font-bold">TifawinSouk</span>
                    </div>
                    <p class="text-gray-400">
                        Votre plateforme de confiance pour le commerce local au Maroc.
                    </p>
                </div>
                <div>
                    <h3 class="mb-4 font-semibold">Liens utiles</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="transition hover:text-purple-400">À propos</a></li>
                        <li><a href="#" class="transition hover:text-purple-400">Services</a></li>
                        <li><a href="#" class="transition hover:text-purple-400">Contact</a></li>
                        <li><a href="#" class="transition hover:text-purple-400">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 font-semibold">Catégories</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="transition hover:text-purple-400">Vêtements</a></li>
                        <li><a href="#" class="transition hover:text-purple-400">Électronique</a></li>
                        <li><a href="#" class="transition hover:text-purple-400">Maison</a></li>
                        <li><a href="#" class="transition hover:text-purple-400">Sports</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 font-semibold">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 transition hover:text-purple-400">
                            <i class="text-xl fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-400 transition hover:text-purple-400">
                            <i class="text-xl fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 transition hover:text-purple-400">
                            <i class="text-xl fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 transition hover:text-purple-400">
                            <i class="text-xl fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="pt-8 mt-8 text-center text-gray-400 border-t border-gray-800">
                <p>&copy; 2024 TifawinSouk. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // Add some interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });

            // Add to cart animation
            document.querySelectorAll('.fa-shopping-cart').forEach(cart => {
                cart.parentElement.addEventListener('click', function(e) {
                    e.preventDefault();
                    this.classList.add('animate-bounce');
                    setTimeout(() => {
                        this.classList.remove('animate-bounce');
                    }, 1000);
                });
            });
        });
    </script>
</body>
</html>
