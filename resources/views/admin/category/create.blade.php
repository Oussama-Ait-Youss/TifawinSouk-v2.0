<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

    <div class="min-h-screen bg-gray-900 flex items-center justify-center p-6">

        <div class="w-full max-w-lg bg-gray-800 rounded-lg shadow p-6">

            <h1 class="text-2xl font-bold text-gray-100 mb-6"> Create Category </h1>

            <form action="{{ route('category.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1"> Name </label>
                    <input type="text" name="name" class="w-full border border-gray-600 rounded px-3 py-2 bg-gray-700 text-gray-100" placeholder="name">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1"> Slug </label>
                    <input type="text" name="slug" class="w-full border border-gray-600 rounded px-3 py-2 bg-gray-700 text-gray-100" placeholder="slug">
                </div>
                
                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('category.index') }}" class="px-4 py-2 border border-gray-500 rounded text-gray-300">Cancel</a>
                    <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded">Save Category</button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>