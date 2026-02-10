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
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <i class="fas fa-store text-2xl text-purple-600 mr-3"></i>
                        <span class="text-xl font-bold text-gray-800">TifawinSouk</span>
                    </div>
                    <div class="hidden md:ml-10 md:flex md:space-x-8">
                        <a href="#" class="text-gray-900 hover:text-purple-600 px-3 py-2 text-sm font-medium">Accueil</a>
                        <a href="#" class="text-gray-500 hover:text-purple-600 px-3 py-2 text-sm font-medium">Produits</a>
                        <a href="#" class="text-gray-500 hover:text-purple-600 px-3 py-2 text-sm font-medium">Catégories</a>
                        <a href="#" class="text-gray-500 hover:text-purple-600 px-3 py-2 text-sm font-medium">Contact</a>
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
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
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
    <section class="hero-gradient text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    Bienvenue chez TifawinSouk
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-purple-100">
                    Votre plateforme de commerce local au Maroc
                </p>
                <div class="flex justify-center space-x-4">
                    <button class="bg-white text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        Parcourir les produits
                    </button>
                    <button class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-purple-600 transition">
                        En savoir plus
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-purple-100 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-truck text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Livraison Rapide</h3>
                    <p class="text-gray-600">Livraison rapide et fiable partout au Maroc</p>
                </div>
                <div class="text-center">
                    <div class="bg-purple-100 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-shield-alt text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Paiement Sécurisé</h3>
                    <p class="text-gray-600">Paiements 100% sécurisés et protégés</p>
                </div>
                <div class="text-center">
                    <div class="bg-purple-100 rounded-full p-4 w-16 h-16 mx-auto mb-4 flex items-center justify-center">
                        <i class="fas fa-headset text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Support 24/7</h3>
                    <p class="text-gray-600">Service client disponible à tout moment</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Nos Catégories</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Découvrez notre large gamme de produits organisés par catégories pour faciliter vos achats
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Category Cards -->
                <div class="category-card rounded-lg p-6 text-white card-hover cursor-pointer">
                    <div class="bg-white bg-opacity-20 rounded-full p-3 w-12 h-12 mb-4 flex items-center justify-center">
                        <i class="fas fa-tshirt text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Vêtements</h3>
                    <p class="text-sm opacity-90">Mode et accessoires</p>
                </div>
                <div class="bg-gradient-to-br from-green-400 to-blue-500 rounded-lg p-6 text-white card-hover cursor-pointer">
                    <div class="bg-white bg-opacity-20 rounded-full p-3 w-12 h-12 mb-4 flex items-center justify-center">
                        <i class="fas fa-laptop text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Électronique</h3>
                    <p class="text-sm opacity-90">Appareils et gadgets</p>
                </div>
                <div class="bg-gradient-to-br from-yellow-400 to-orange-500 rounded-lg p-6 text-white card-hover cursor-pointer">
                    <div class="bg-white bg-opacity-20 rounded-full p-3 w-12 h-12 mb-4 flex items-center justify-center">
                        <i class="fas fa-home text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Maison</h3>
                    <p class="text-sm opacity-90">Meubles et décoration</p>
                </div>
                <div class="bg-gradient-to-br from-pink-400 to-red-500 rounded-lg p-6 text-white card-hover cursor-pointer">
                    <div class="bg-white bg-opacity-20 rounded-full p-3 w-12 h-12 mb-4 flex items-center justify-center">
                        <i class="fas fa-basketball-ball text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Sports</h3>
                    <p class="text-sm opacity-90">Équipements sportifs</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Produits Populaires</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Les produits les plus appréciés par nos clients
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product Cards -->
                @for($i = 1; $i <= 8; $i++)
                <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
                    <div class="relative">
                        <div class="h-48 bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-image text-gray-400 text-4xl"></i>
                        </div>
                        @if($i % 3 == 0)
                        <span class="absolute top-2 right-2 product-badge text-white text-xs px-2 py-1 rounded-full">
                            -20%
                        </span>
                        @endif
                        @if($i % 4 == 0)
                        <span class="absolute top-2 left-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                            Nouveau
                        </span>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-2">Produit {{ $i }}</h3>
                        <p class="text-gray-600 text-sm mb-3">Description courte du produit {{ $i }}</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-xl font-bold text-purple-600">{{ rand(100, 999) }} DH</span>
                                @if($i % 3 == 0)
                                <span class="text-sm text-gray-400 line-through ml-2">{{ rand(1200, 1999) }} DH</span>
                                @endif
                            </div>
                            <button class="bg-purple-600 text-white p-2 rounded-lg hover:bg-purple-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                        <div class="mt-2">
                            <div class="flex items-center">
                                <div class="flex text-yellow-400">
                                    @for($j = 1; $j <= rand(3, 5); $j++)
                                    <i class="fas fa-star text-sm"></i>
                                    @endfor
                                    @for($j = rand(3, 5); $j < 5; $j++)
                                    <i class="far fa-star text-sm"></i>
                                    @endfor
                                </div>
                                <span class="text-xs text-gray-500 ml-2">({{ rand(10, 99) }})</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            <div class="text-center mt-12">
                <button class="bg-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-700 transition">
                    Voir tous les produits
                </button>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-purple-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold mb-2">{{ rand(1000, 9999) }}</div>
                    <div class="text-purple-200">Produits vendus</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">{{ rand(100, 999) }}</div>
                    <div class="text-purple-200">Clients satisfaits</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">{{ rand(10, 99) }}</div>
                    <div class="text-purple-200">Fournisseurs partenaires</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">{{ rand(1, 5) }}</div>
                    <div class="text-purple-200">Années d'expérience</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Restez informé</h2>
                <p class="text-gray-600 mb-8">
                    Abonnez-vous à notre newsletter pour recevoir les dernières offres et nouveautés
                </p>
                <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input type="email" placeholder="Votre adresse email" class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                    <button class="bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700 transition">
                        S'abonner
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-store text-2xl text-purple-400 mr-3"></i>
                        <span class="text-xl font-bold">TifawinSouk</span>
                    </div>
                    <p class="text-gray-400">
                        Votre plateforme de confiance pour le commerce local au Maroc.
                    </p>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Liens utiles</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-purple-400 transition">À propos</a></li>
                        <li><a href="#" class="hover:text-purple-400 transition">Services</a></li>
                        <li><a href="#" class="hover:text-purple-400 transition">Contact</a></li>
                        <li><a href="#" class="hover:text-purple-400 transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Catégories</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-purple-400 transition">Vêtements</a></li>
                        <li><a href="#" class="hover:text-purple-400 transition">Électronique</a></li>
                        <li><a href="#" class="hover:text-purple-400 transition">Maison</a></li>
                        <li><a href="#" class="hover:text-purple-400 transition">Sports</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-4">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-purple-400 transition">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
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
