<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <title>Document</title>
</head>

<body>
    <main>
        <div class="flex flex-col justify-center item-center">
            <div >
                <h1>title</h1>
            </div>
            <div class="w-50">
            <table class="min-w-full overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                <thead class="border-b border-gray-200 bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Prix</th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Category</th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Fournisseur</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($products as $product)
                    <tr class="transition-colors duration-150 hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $product->nom }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $product->prix_vente}}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $product->Category->name}}</td>
                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $product->Fournisseur->nom}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </main>

</body>

</html>