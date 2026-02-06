<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fournisseur Managment</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    

<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <h1>Fourniseur Information:<h1>
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Ville
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Telephone
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($fournisseurs as $fournisseur)
            <tr class="bg-neutral-primary border-b border-default">
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    {{$fournisseur->nom}}
                </th>
                <td class="px-6 py-4">
                    {{$fournisseur->email}}
                </td>
                <td class="px-6 py-4">
                    {{$fournisseur->ville}}
                </td>
                <td class="px-6 py-4">
                    {{$fournisseur->telephone}}
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>