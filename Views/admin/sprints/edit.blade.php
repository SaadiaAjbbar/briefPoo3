@extends('layouts.admin')

@section('content')
<section class="max-h-screen flex items-center justify-center p-8">
    <div class="max-w-md w-full bg-gray-600 rounded-2xl shadow-sm border border-gray-100 p-8">
        <h1 class="text-3xl font-bold text-center text-gray-300 mb-6">
            Modifier le sprint
        </h1>

        <form method="POST" action="/admin/sprints/edit?id={{ $sprint['id'] }}">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Nom</label>
                <input type="text" name="nom" value="{{ $sprint['nom'] }}" required class="w-full px-4 py-2 rounded border">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Durée (jours)</label>
                <input type="number" name="duree" value="{{ $sprint['duree'] }}" required class="w-full px-4 py-2 rounded border">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-1">Ordre chronologique</label>
                <input type="text" name="ordre_chronologique" value="{{ $sprint['ordre_chronologique'] }}" required class="w-full px-4 py-2 rounded border">
            </div>

            <button type="submit" class="w-full bg-indigo-600 py-2 rounded text-white hover:bg-indigo-700">Enregistrer</button>
        </form>
    </div>
</section>
@endsection
