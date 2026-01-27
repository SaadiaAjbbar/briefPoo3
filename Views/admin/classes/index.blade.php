@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto mt-10 text-white">
    <h1 class="text-3xl font-bold mb-6">Liste des classes</h1>

    <a href="/admin/classes/create"
       class="bg-indigo-600 px-4 py-2 rounded hover:bg-indigo-700 mb-4 inline-block">
       Ajouter une classe
    </a>

    <table class="w-full text-left border border-gray-700">
        <thead class="bg-gray-800">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nom</th>
                <th class="px-4 py-2">Année scolaire</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $classe)
                <tr class="border-t border-gray-700">
                    <td class="px-4 py-2">{{ $classe['id'] }}</td>
                    <td class="px-4 py-2">{{ $classe['nom'] }}</td>
                    <td class="px-4 py-2">{{ $classe['annee_scolaire'] }}</td>
                    <td class="px-4 py-2">
                        <form method="POST" action="/admin/classes/delete" class="inline">
                            <input type="hidden" name="id" value="{{ $classe['id'] }}">
                            <button type="submit" class="bg-red-600 px-2 py-1 rounded hover:bg-red-700">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
