@extends('layouts.admin')
@section('content')

<div class="max-w-7xl mx-auto mt-10 text-white">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Gestion des formateurs</h1>

        <a href="/admin/formateurs/create"
           class="bg-indigo-600 px-5 py-2 rounded-lg hover:bg-indigo-700 transition">
            + Ajouter formateur
        </a>
    </div>

    <div class="bg-gray-800 rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-700 text-gray-300">
                <tr>
                    <th class="px-6 py-3">Nom</th>
                    <th class="px-6 py-3">Prénom</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($formateurs as $f)
                    <tr class="border-b border-gray-700 hover:bg-gray-700/50">
                        <td class="px-6 py-4">{{ $f['nom'] }}</td>
                        <td class="px-6 py-4">{{ $f['prenom'] }}</td>
                        <td class="px-6 py-4">{{ $f['email'] }}</td>
                        <td class="px-6 py-4 text-right space-x-2">

                            <a href="/admin/formateurs/edit?id={{ $f['id'] }}"
                               class="bg-yellow-500 px-3 py-1 rounded hover:bg-yellow-600">
                                Edit
                            </a>

                            <a href="/admin/formateurs/delete?id={{ $f['id'] }}"
                               onclick="return confirm('Supprimer ce formateur ?')"
                               class="bg-red-600 px-3 py-1 rounded hover:bg-red-700">
                                Supprimer
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
