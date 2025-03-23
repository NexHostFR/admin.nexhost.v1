@extends('base')

@section('body')
<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Créer une Nouvelle Catégorie</h2>
        <form id="categoryForm" class="space-y-4" method="POST" action="">
            @csrf
            <div>
                <label for="nom" class="block text-gray-600">Nom de la Catégorie :</label>
                <input type="text" id="nom" name="nom" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-300">
            </div>
            <div>
                <label for="description" class="block text-gray-600">Description de la Catégorie :</label>
                <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-300"></textarea>
            </div>
            *<div>
                <label for="url" class="block text-gray-600">Url de la Catégorie :</label>
                <input type="text" id="url" name="url" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-300">
            </div>
            <div>
                <label for="categorie_parent" class="block text-gray-600">Catégorie Parent :</label>
                <select id="categorie_parent" name="categorie_parent" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-300">
                    <option value="" selected>Aucune (Catégorie principale)</option>
                    @foreach($listeCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white p-2 rounded-lg hover:bg-green-600">Créer Catégorie</button>
        </form>
    </div>
</div>
@endsection
