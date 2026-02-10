<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - TifawinSouk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-slate-900 text-white flex-shrink-0 shadow-xl">
            <div class="p-6">
                <h1 class="text-xl font-bold tracking-widest uppercase text-indigo-400">TifawinSouk</h1>
                <p class="text-xs text-gray-400">Gestion Boutique</p>
            </div>
            
            <nav class="mt-4 px-4">
                <div class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600' : '' }}">
                        <i class="fas fa-home w-5"></i>
                        <span>Tableau de bord</span>
                    </a>

                    <div class="pt-4 pb-2">
                        <p class="text-xs uppercase text-gray-500 font-semibold px-3">Inventaire</p>
                    </div>

                    <a href="" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('produits.*') ? 'bg-indigo-600' : '' }}">
                        <i class="fas fa-box w-5"></i>
                        <span>Produits</span>
                    </a>

                    <a href="{" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('categories.*') ? 'bg-indigo-600' : '' }}">
                        <i class="fas fa-tags w-5"></i>
                        <span>Catégories</span>
                    </a>

                    <div class="pt-4 pb-2">
                        <p class="text-xs uppercase text-gray-500 font-semibold px-3">Partenaires</p>
                    </div>

                    <a href="{{ route('fournisseurs.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('fournisseurs.*') ? 'bg-indigo-600' : '' }}">
                        <i class="fas fa-truck w-5"></i>
                        <span>Fournisseurs</span>
                    </a>
                </div>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col">
            <header class="bg-white shadow-sm p-4 flex justify-between items-center">
                <button class="text-gray-500 md:hidden"><i class="fas fa-bars"></i></button>
                <div class="flex items-center space-x-4 ml-auto">
                    <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-sign-out-alt"></i></button>
                    </form>
                </div>
            </header>

            <main class="p-8">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>