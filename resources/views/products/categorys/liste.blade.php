@extends('base')

@section('body')
<main class="container mx-auto px-4">
    <div>
        <a href="/products/category/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
            Ajouter une nouvelle catégorie
        </a>
    </div>
    <div class="overflow-x-auto mt-10">
        <table class="min-w-full border border-gray-200 bg-white rounded-lg shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Nom</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($listeCategories) && $listeCategories->isNotEmpty())
                    @foreach ($listeCategories as $categorie)
                        <tr class="cursor-pointer hover:bg-gray-100 transition" onclick="window.location='/products/category/{{ $categorie->id }}'">
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $categorie->nom }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Aucune catégorie disponible pour le moment.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</main>
@endsection