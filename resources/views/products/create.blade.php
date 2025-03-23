@extends('base')

@section('body')
<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Créer un Nouveau Produit</h2>
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Erreur !</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
        <form id="productForm" class="space-y-4" method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="nom" class="block text-gray-600">Nom du Produit :</label>
                <input type="text" id="nom" name="nom" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-300">
            </div>
            <div>
                <label for="description" class="block text-gray-600">Description :</label>
                <textarea id="description" name="description" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-300"></textarea>
            </div>
            <div>
                <label for="prix" class="block text-gray-600">Prix :</label>
                <input type="number" step="0.01" id="prix" name="prix" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-300">
            </div>
            <div>
                <label for="status" class="block text-gray-600">Statut :</label>
                <select id="status" name="status" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-300">
                    <option value="disponible">Disponible</option>
                    <option value="indisponible">Indisponible</option>
                </select>
            </div>
            <div>
                <label for="categorie_id" class="block text-gray-600">Catégorie :</label>
                <select id="categorie_id" name="categorie_id" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-300">
                    @foreach($listeCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="image" class="block text-gray-600">Image :</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-300">
            </div>
            <div>
                <label for="mise_avant" class="block text-gray-600">Mise en avant :</label>
                <select id="mise_avant" name="mise_avant" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-300">
                    <option value="true">oui</option>
                    <option value="false">non</option>
                </select>
            </div>
            <div>
                <label for="data" class="block text-gray-600">Données Supplémentaires (JSON) :</label>
                <textarea id="data" name="data_produit" class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-green-300"></textarea>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white p-2 rounded-lg hover:bg-green-600">Créer Produit</button>
        </form>
    </div>
</div>
@endsection
