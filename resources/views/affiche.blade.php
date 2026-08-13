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

        <h1 class="text-3xl font-bold mb-8">
            Liste des utilisateurs
        </h1>

        @if($users->isEmpty())

            <p class="text-gray-400">
                Aucun utilisateur trouvé.
            </p>

        @else

            @foreach($users as $user)

                <div class="mb-4 rounded-xl border border-gray-800 bg-gray-900 p-5">

                    <p>
                        <strong>ID :</strong>
                        {{ $user->id }}
                    </p>

                    <p>
                        <strong>Nom :</strong>
                        {{ $user->name }}
                    </p>

                    <p>
                        <strong>Email :</strong>
                        {{ $user->email }}
                    </p>

                </div>

            @endforeach

        @endif

    </div>

</body>

</html>