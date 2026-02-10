<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body>
    <div class="p-6 bg-gray-900 min-h-screen">

    <div class="flex flex-row justify-between">
        <div class="flex justify-between items-center mb-5">
            <h1 class="text-2xl font-bold text-gray-100">Categories</h1>
        </div>

         <div class="flex justify-between items-center mb-5">
                <a href="{{ route('category.create') }}" class="bg-blue-700 text-white px-4 py-2 rounded">+ Add Category</a>

            </div>

    </div>
           

        <div class="overflow-x-auto bg-gray-800 rounded shadow">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-700 text-gray-100">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Slug</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)
                        <tr class="border-b border-gray-700 text-gray-200 hover:bg-gray-700">
                            <td class="px-4 py-2">{{ $cat->name }}</td>
                            <td class="px-4 py-2">{{ $cat->slug }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('category.edit', $cat) }}"
                                    class="bg-yellow-300 text-black px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('category.destroy', $cat) }}" method="POST"
                                    onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-700 text-white px-3 py-1 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>