<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Products Management</title>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in { animation: fadeIn 0.5s ease-out; }
    </style>
</head>

<body class="h-full">
    <div class="flex h-full">
        <!-- Sidebar -->
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

                    <a href="{{ route('admin.products.create') }}" class="flex items-center gap-2 px-4 py-2 text-white transition-colors bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700">
                        <i class="w-5 fas fa-box"></i>
                        <span>Produits</span>
                    </a>

                    <a href="{{ route('admin.category.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('category.*') ? 'bg-indigo-600' : '' }}">
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

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 shadow-sm">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex items-center">
                            <i class="mr-3 text-2xl text-blue-600 fas fa-box"></i>
                            <h1 class="text-2xl font-bold text-gray-900">Products Management</h1>
                        </div>
                        <nav class="flex space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="p-2 text-green-600 transition-colors rounded-lg hover:text-green-900 hover:bg-green-50" title="Dashboard">
                                <i class="mr-2 fas fa-chart-bar"></i>Dashboard
                            </a>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto bg-gray-50">
                <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    @livewire('product-index')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
