@extends('base')

@section('body')
<main class="container mx-auto px-4">
    <h1>Création d'un utilisateur</h1>
    <form action="" method="POST">
        @csrf
        <div>
            <label for="username">Nom Prénom</label>
            <input type="text" name="username" id="username" class="border border-gray-300 p-2 w-full">
        </div>
        <div>
            <label for="role">Rôle</label>
            <select name="role" id="role" class="border border-gray-300 p-2 w-full">
                <option value="superadmin">Admin</option>
                <option value="support">Support</option>
            </select>
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <div class="flex flex-row items-center">
                <input type="password" name="password" id="password" class="border border-gray-300 p-2 w-full">
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2" id="generatorPassword">Générer</button>
            </div>
            <div class="mt-2">
                <input type="checkbox" id="showPassword" class="mr-2">
                <label for="showPassword">Afficher le mot de passe</label>
            </div>
        </div>        
        <div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">
                Ajouter
            </button>
        </div>
    </form>
</main>
@endsection