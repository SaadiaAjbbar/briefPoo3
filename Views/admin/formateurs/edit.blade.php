@extends('layouts.admin')

@section('content')
<section class="min-h-screen flex items-center justify-center">

    <div class="max-w-md w-full bg-gray-800 rounded-2xl shadow p-8 text-white">

        <h1 class="text-3xl font-bold text-center mb-6">
            Modifier le formateur
        </h1>

        <form method="POST" action="/admin/formateurs/edit">
            <input type="hidden" name="id" value="{{ $formateur['id'] }}">

            <div class="mb-4">
                <label class="block mb-1">Nom</label>
                <input type="text" name="nom" required value="{{ $formateur['nom'] }}" class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600">
            </div>

            <div class="mb-4">
                <label class="block mb-1">Prénom</label>
                <input type="text" name="prenom" required value="{{ $formateur['prenom'] }}" class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600">
            </div>

            <div class="mb-6">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" required value="{{ $formateur['email'] }}" class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600">
            </div>

            <button type="submit" class="w-full bg-indigo-600 py-2 rounded-lg hover:bg-indigo-700 transition font-semibold">
                Mettre à jour
            </button>
        </form>

    </div>

</section>
@endsection