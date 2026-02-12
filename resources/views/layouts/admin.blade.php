<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - TifawinSouk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="font-sans bg-gray-100">
    <div class="flex min-h-screen">
        <aside class="flex-shrink-0 w-64 text-white shadow-xl bg-slate-900">
            <div class="p-6">
                <h1 class="text-xl font-bold tracking-widest text-indigo-400 uppercase">TifawinSouk</h1>
                <p class="text-xs text-gray-400">Gestion Boutique</p>
            </div>
            
            <nav class="px-4 mt-4">
                <div class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600' : '' }}">
                        <i class="w-5 fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>

                    <div class="pt-4 pb-2">
                        <p class="px-3 text-xs font-semibold text-gray-500 uppercase">Inventaire</p>
                    </div>

                    <a href="{{ route('admin.products.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('produits.*') ? 'bg-indigo-600' : '' }}">
                        <i class="w-5 fas fa-box"></i>
                        <span>Produits</span>
                    </a>

                    <a href="{{ route('admin.category.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('categories.*') ? 'bg-indigo-600' : '' }}">
                        <i class="w-5 fas fa-tags"></i>
                        <span>Catégories</span>
                    </a>
                    
                    <a href="{{ route('admin.fournisseurs.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('fournisseurs.*') ? 'bg-indigo-600' : '' }}">
                        <i class="w-5 fas fa-truck"></i>
                        <span>Fournisseurs</span>
                    </a>
                </div>
            </nav>
        </aside>

        <div class="flex flex-col flex-1">
            <header class="flex items-center justify-between p-4 bg-white shadow-sm">
                <button class="text-gray-500 md:hidden"><i class="fas fa-bars"></i></button>
                <div class="flex items-center ml-auto space-x-4">
                    <span class="font-medium text-gray-700">{{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-sign-out-alt"></i></button>
                    </form>
                </div>
            </header>

            <main class="p-8">
                @if(session('success'))
                    <div class="p-4 mb-6 text-green-700 bg-green-100 border-l-4 border-green-500 shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>