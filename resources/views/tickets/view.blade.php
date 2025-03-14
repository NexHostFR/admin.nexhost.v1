@extends('base')

@section('title', "Ticket N°{$ticket->id}")

@section('body')
@php
    $status = match($ticket->status) {
        'open' => 'Ouvert',
        'closed' => 'Fermé',
        'client' => 'En attente de réponse',
        'support' => 'Une réponse vous attend',
        default => 'Inconnu',
    };
@endphp

<main class="container mx-auto p-4">
    <div class="flex flex-col md:flex-row gap-4 w-full max-w-full">
        <!-- Colonne de gauche : Détails du ticket -->
        <div class="p-4 bg-white rounded-lg shadow w-6/12 max-w-full">
            <h2 class="text-lg font-bold mb-4">Détail du ticket</h2>
            <p><strong>Propriétaire :</strong> {{ auth()->user()->FirstName }} {{ auth()->user()->LastName }}</p>
            <p><strong>Titre :</strong> {{ $ticket->titre }}</p>
            <p><strong>Status :</strong> {{ $status }}</p>
            <p><strong>Produit :</strong> {{ $ticket->product === 'null' ? 'Aucun produit' : $ticket->product }}</p>
            <h3 class="text-md font-semibold mt-4">Description :</h3>
            <p class="text-gray-700">{{ $ticket->content }}</p>
            <button 
                class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition"
                onclick="fermerTicket({{ $ticket->id }})">
                Fermer le ticket
            </button>
        </div>

        <!-- Colonne de droite : Réponses et formulaire de réponse -->
        <div class="p-4 bg-white rounded-lg shadow w-6/12 max-w-full">
            <!-- Réponses précédentes -->
            <div class="mb-6">
                <h2 class="text-lg font-bold mb-4">Réponses</h2>
                @if (isset($reponsesTicketListe) && $reponsesTicketListe->isNotEmpty())
                    @foreach ($reponsesTicketListe as $reponse)
                        <div class="mb-4">
                            <p><strong>Réponse de :</strong> 
                                {{ $reponse->user_id == $ticket->user_id 
                                    ? auth()->user()->FirstName . ' ' . auth()->user()->LastName 
                                    : 'Support' }}
                            </p>
                            <p class="text-gray-700">{{ $reponse->content }}</p>
                            <hr class="my-3">
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500">Aucune réponse pour le moment.</p>
                @endif
            </div>

            <!-- Formulaire de réponse -->
            <div>
                <h2 class="text-lg font-bold mb-4">Répondre au ticket</h2>
                <form action="" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="response" class="block text-sm font-medium text-gray-700">Votre réponse</label>
                        <textarea 
                            name="contentReponse" 
                            id="response" 
                            rows="5" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Écrire votre réponse ici..."></textarea>
                    </div>
                    <button 
                        type="submit" 
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                        Envoyer
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection