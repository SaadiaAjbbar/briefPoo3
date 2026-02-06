<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogSystem</title>
    <link rel="stylesheet" href="/css/output.css">
</head>

<body class="bg-gray-900 font-sans">

    <nav class="bg-white border-b border-gray-200 top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                <div class="flex items-center">
                    <span class="text-2xl font-bold text-indigo-600">DEBSystem</span>
                </div>

                <div class="flex items-center space-x-4">
                    <?php if (!isset($_SESSION['user'])): ?>

                        <a href="/" class="text-gray-600 hover:text-indigo-600 font-medium">
                            Home
                        </a>

                        <a href="/login" class="text-gray-600 hover:text-indigo-600 font-medium">
                            Login
                        </a>

                    <?php elseif (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'ADMIN'): ?>

                         <a href="/admin/home" class="text-gray-600 hover:text-indigo-600 font-medium">
                           home
                        </a>

                        <a href="/admin/formateurs" class="text-gray-600 hover:text-indigo-600 font-medium">
                            Formateurs
                        </a>

                        <a href="/admin/etudiants" class="text-gray-600 hover:text-indigo-600 font-medium">
                            Étudiants
                        </a>

                        <a href="/admin/classes" class="text-gray-600 hover:text-indigo-600 font-medium">
                            Classes
                        </a>

                        <a href="/admin/sprints" class="text-gray-600 hover:text-indigo-600 font-medium">
                            Sprints
                        </a>

                        <a href="/logout"
                            class="bg-red-600 text-white px-5 py-2 rounded-full font-medium hover:bg-red-700 transition shadow-sm">
                            Logout
                        </a>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </nav>