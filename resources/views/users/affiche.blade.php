<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Liste des utilisateurs</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white">

    <div class="container mx-auto px-6 py-10">

        <h1 class="text-3xl font-bold mb-8 text-blue-400">
            Liste des utilisateurs
        </h1>

        @if ($users->isEmpty())

            <p class="text-gray-400">
                Aucun utilisateur enregistré.
            </p>

        @else

            <div class="overflow-x-auto">

                <table class="w-full border border-gray-800">

                    <thead class="bg-gray-900">

                        <tr>
                            <th class="border border-gray-800 px-4 py-3 text-left">
                                ID
                            </th>

                            <th class="border border-gray-800 px-4 py-3 text-left">
                                Nom
                            </th>

                            <th class="border border-gray-800 px-4 py-3 text-left">
                                Email
                            </th>

                            <th class="border border-gray-800 px-4 py-3 text-left">
                                Actions
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($users as $user)

                            <tr class="hover:bg-gray-900">

                                <td class="border border-gray-800 px-4 py-3">
                                    {{ $user->id }}
                                </td>

                                <td class="border border-gray-800 px-4 py-3">
                                    {{ $user->name }}
                                </td>

                                <td class="border border-gray-800 px-4 py-3">
                                    {{ $user->email }}
                                </td>

                                <td class="border border-gray-800 px-4 py-3">

                                    <a
                                        href="{{ route('users.edit', $user->id) }}"
                                        class="bg-blue-600 px-3 py-2 rounded-lg hover:bg-blue-700"
                                    >
                                        Modifier
                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </div>

</body>

</html>