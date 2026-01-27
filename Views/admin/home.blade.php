@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto mt-10 text-white">

    <h1 class="text-3xl font-bold mb-6">
         Bienvenue Admin
    </h1>

    <p class="text-gray-300 mb-10">
        Depuis ce tableau de bord, vous pouvez gérer toute la plateforme pédagogique.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Formateurs -->
        <div class="bg-gray-800 rounded-lg p-6 shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold mb-2">Formateurs</h2>
            <p class="text-gray-400 mb-4">
                Gestion des formateurs (ajout, modification, suppression)
            </p>
            <a href="/admin/formateurs"
               class="inline-block bg-indigo-600 px-4 py-2 rounded hover:bg-indigo-700">
                Gérer
            </a>
        </div>

        <!-- Étudiants -->
        <div class="bg-gray-800 rounded-lg p-6 shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold mb-2">Étudiants</h2>
            <p class="text-gray-400 mb-4">
                Liste des étudiants et affectation aux classes
            </p>
            <a href="/admin/etudiants"
               class="inline-block bg-indigo-600 px-4 py-2 rounded hover:bg-indigo-700">
                Gérer
            </a>
        </div>

        <!-- Classes -->
        <div class="bg-gray-800 rounded-lg p-6 shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold mb-2">Classes</h2>
            <p class="text-gray-400 mb-4">
                Création et organisation des classes
            </p>
            <a href="/admin/classes"
               class="inline-block bg-indigo-600 px-4 py-2 rounded hover:bg-indigo-700">
                Gérer
            </a>
        </div>

        <!-- Sprints -->
        <div class="bg-gray-800 rounded-lg p-6 shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold mb-2">Sprints</h2>
            <p class="text-gray-400 mb-4">
                Planification des sprints pédagogiques
            </p>
            <a href="/admin/sprints"
               class="inline-block bg-indigo-600 px-4 py-2 rounded hover:bg-indigo-700">
                Gérer
            </a>
        </div>

    </div>
</div>
@endsection
