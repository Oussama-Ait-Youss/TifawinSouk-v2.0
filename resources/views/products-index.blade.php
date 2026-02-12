<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TifawinSouk - Plateforme de Gestion du Commerce Local</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @livewireStyles
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

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
                    <a href="{{ route('home') }}" class="px-3 py-2 text-sm font-medium text-gray-900 hover:text-purple-600">Accueil</a>
                    <a href="{{ route('products.home') }}" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-purple-600">Produits</a>
                    <a href="" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-purple-600">Catégories</a>
                    <a href="#" class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-purple-600">Contact</a>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    @livewire('search-component')
                </div>
                <div class="relative">
                    <button id="cart-toggle" class="relative p-2 text-gray-600 hover:text-purple-600">
                        <i class="text-xl fas fa-shopping-cart"></i>
                        <span id="cart-count" class="absolute flex items-center justify-center w-5 h-5 text-xs text-white bg-red-500 rounded-full -top-1 -right-1">0</span>
                    </button>
                    @include('partials.cart_dropdown')
                </div>
                @guest
                <a href="{{ route('login') }}" class="px-4 py-2 text-white transition bg-purple-600 rounded-lg hover:bg-purple-700">
                    Connexion
                </a>
                @else
                <div class="flex items-center space-x-2">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" class="text-gray-500 hover:text-purple-600">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
                @endguest
            </div>
        </div>
    </div>
</nav>

<body class="h-full">
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
                @foreach( $products as $product )
                <div data-product-id="{{ $product->id }}" class="overflow-hidden bg-white rounded-lg shadow-md cursor-pointer product-card card-hover">
                    <div class="relative">
                        <div class="flex items-center justify-center h-48 bg-gray-200">
                            <img class="object-cover w-full h-full" src="https://picsum.photos/seed/product-{{$product->id}}/300/300.jpg" alt="{{ $product->nom }}" onerror="this.src='https://via.placeholder.com/300x300?text=Product'">
                        </div>
                        <div class="p-4">
                            <h3 class="mb-2 font-semibold text-gray-900">{{ $product->nom }}</h3>
                            <div class="mb-2 text-xs text-gray-500">ID: {{ $product->id }}</div>
                            <p class="mb-3 text-sm text-gray-600">Produit Stock: {{ $product->stock }}</p>
                            <div class="flex items-center justify-between">
                                <div>
                                    <span class="text-xl font-bold text-purple-600">Prix: {{ $product->prix_vente }} DH</span>
                                </div>
                                <button data-product-id="{{ $product->id }}" class="p-2 text-white transition bg-purple-600 rounded-lg add-to-cart hover:bg-purple-700">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mt-12 text-center">
            <button class="px-8 py-3 font-semibold text-white transition bg-purple-600 rounded-lg hover:bg-purple-700">
                Voir tous les produits
            </button>
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
    @livewireScripts
</body>

</html>