<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopX - Utilisateurs</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-black text-gray-100">

<div class="min-h-screen overflow-hidden">

    <!-- Navigation Bar -->
    <nav class="mx-3 mt-2 flex flex-wrap items-center justify-between gap-3 rounded-full border border-gray-800 bg-gray-900/90 p-3 sm:p-4">
    <!-- Logo -->
        <div class="flex items-center gap-1">
            <div class="flex h-8 w-8 items-center justify-center rounded-full border border-blue-400 bg-blue-500 text-sm font-bold text-white">
                S
            </div>

            <h1 class="text-base font-bold tracking-tight text-blue-400 sm:text-lg">
                ShopX
            </h1>
        </div>

        <!-- Desktop Menu -->
        <section class="hidden md:flex flex-1 flex-wrap justify-center gap-3 text-gray-300 sm:gap-4">

            <a href="/" class="text-gray-300 hover:text-white transition">
                Accueil
            </a>

            <a href="/Catalogue" class="text-gray-300 hover:text-white transition">
                Catalogue
            </a>

            <a href="/Panier" class="text-gray-300 hover:text-white transition">
                Panier
            </a>

            <a href="/contact" class="text-gray-300 hover:text-white transition">
                Compte
            </a>

        </section>

        <!-- Buttons Section -->
        <section class="ml-auto flex w-full flex-wrap items-center justify-end gap-2 sm:w-auto sm:gap-2 md:gap-3">

            <!-- Mobile Menu Button -->
            <button
                id="openNav"
                class="inline-flex h-8 w-8 items-center justify-center rounded-full text-gray-300 hover:bg-gray-800 md:hidden"
                aria-label="Ouvrir le menu"
            >
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>
            </button>

        </section>

    </nav>

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-xl font-bold mb-6 text-white">Liste des utilisateurs</h2>

        @if(session('success'))
            <div class="mb-4 rounded bg-green-600/20 border border-green-600 p-3 text-green-200">
                {{ session('success') }}
            </div>
        @endif

        @if($users->isEmpty())
            <p class="text-gray-400">Aucun utilisateur.</p>
        @else
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($users as $user)
                    <div class="rounded-lg border border-gray-700 bg-gray-800 p-4">
                        <h3 class="font-semibold text-white">{{ $user->name }}</h3>
                        <p class="text-sm text-gray-400 mb-3">{{ $user->email }}</p>

                        <a href="{{ route('users.edit', $user->id) }}"
                           class="inline-block rounded bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-700">
                            Modifier
                        </a>

                        <form action="{{ route('users.delete', $user->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-block rounded bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700">
                                Supprimer
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>

<!-- JavaScript -->
<script src="{{ asset('Js/Accueil.js') }}"></script>

</body>
</html>
