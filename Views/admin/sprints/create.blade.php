@extends('layouts.admin')

@section('content')
<section class="max-h-screen flex items-center justify-center p-8">
    <div class="max-w-md w-full bg-gray-600 rounded-2xl shadow-sm border border-gray-100 p-8">
        <h1 class="text-3xl font-bold text-center text-gray-300 mb-6">
            Ajouter un sprint
        </h1>

        @if($error)
            <p class="text-red-500 mb-4">{{ $error }}</p>
        @endif

        <form method="POST" action="">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Nom</label>
                <input type="text" name="nom" required class="w-full px-4 py-2 rounded border">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Durée (jours)</label>
                <input type="number" name="duree" required class="w-full px-4 py-2 rounded border">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Ordre chronologique</label>
                <input type="text" name="ordre_chronologique" required class="w-full px-4 py-2 rounded border">
            </div>

            <button type="submit" class="w-full bg-indigo-600 py-2 rounded text-white hover:bg-indigo-700">Enregistrer</button>
        </form>
    </div>
</section>
@endsection
