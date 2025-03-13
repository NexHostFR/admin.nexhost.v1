@extends('base')

@section('body')
<main class="flex justify-center items-center h-screen flex-col">
    @if (session('error'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif
    
    <form method="POST" action="{{ route('login') }}" id="form_login" class="w-full sm:w-96 bg-white p-8 rounded-lg shadow-lg">
        @csrf
        <h1 class="text-center text-2xl font-semibold mb-6">Connexion à l'admin</h1>

        <!-- Champ username -->
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700">Nom d'utilisateur</label>
            <input 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('username') border-red-500 @enderror"
                type="text" 
                name="username" 
                id="username" 
                value="{{ old('username') }}" 
                required 
                autofocus
            >
            @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ mot de passe -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                type="password" 
                name="password" 
                id="password" 
                required
            >
            @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <!-- Option 'Se souvenir de moi' -->
        {{-- 
        <div class="mb-4">
            <label for="remember" class="inline-flex items-center">
                <input 
                    type="checkbox" 
                    name="remember" 
                    id="remember" 
                    class="form-checkbox h-4 w-4 text-blue-600" 
                    {{ old('remember') ? 'checked' : '' }}
                >
                <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
            </label>
        </div>
        --}}

        <!-- Bouton de soumission -->
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
            Connexion
        </button>
    </form>
</main>  
@endsection