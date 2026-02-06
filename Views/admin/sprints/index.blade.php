@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto mt-10 text-white">
    <h1 class="text-3xl font-bold mb-6">Liste des sprints</h1>

    <a href="/admin/sprints/create"
       class="bg-indigo-600 px-4 py-2 rounded hover:bg-indigo-700 mb-4 inline-block">
       Ajouter un sprint
    </a>

    <table class="w-full text-left border border-gray-700">
        <thead class="bg-gray-800">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Nom</th>
                <th class="px-4 py-2">Durée</th>
                <th class="px-4 py-2">Ordre</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sprints as $sprint)
            <tr class="border-t border-gray-700">
                <td class="px-4 py-2">{{ $sprint['id'] }}</td>
                <td class="px-4 py-2">{{ $sprint['nom'] }}</td>
                <td class="px-4 py-2">{{ $sprint['duree'] }}</td>
                <td class="px-4 py-2">{{ $sprint['ordre_chronologique'] }}</td>
                <td class="px-4 py-2">
                    <a href="/admin/sprints/edit?id={{ $sprint['id'] }}"
                       class="bg-yellow-500 px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                    <form method="POST" action="/admin/sprints/delete" class="inline">
                        <input type="hidden" name="id" value="{{ $sprint['id'] }}">
                        <button type="submit" class="bg-red-600 px-2 py-1 rounded hover:bg-red-700">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
