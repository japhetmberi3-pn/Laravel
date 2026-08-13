<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopX</title>

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

            <!-- Auth Buttons -->
            <div class="flex flex-row flex-nowrap items-center gap-2 sm:gap-2 md:gap-3">

                <button
                    id="openRegister"
                    class="rounded-full bg-blue-500 px-3 py-1.5 text-[10px] text-white shadow-lg shadow-blue-500/30 transition hover:bg-blue-600 hover:shadow-xl hover:shadow-blue-500/40 sm:px-5 sm:py-2.5 sm:text-[13px]"
                >
                    modifier mon compte
                </button>


                <form action="{{ route('logout.post') }}" method="POST" class="m-0">
                    @csrf
                    <button
                        type="submit"
                        class="w-auto rounded-full bg-green-500 px-3 py-1.5 text-[10px] text-white shadow-lg shadow-green-500/30 transition hover:bg-green-600 hover:shadow-xl hover:shadow-green-500/40 sm:px-5 sm:py-2.5 sm:text-[13px]"
                    >
                        Déconnexion
                    </button>
                </form>

            </div>

        </section>

    </nav>


    <!-- Register Modal -->
    <div
        id="registerModal"
        class="hidden fixed inset-0 z-40 flex items-center justify-center bg-black/70"
    >

        <div class="w-96 rounded-xl border border-gray-800 bg-gray-900 p-6 text-gray-100 shadow-2xl">

            <h2 class="mb-4 text-2xl font-bold">
                Modifier mon compte
            </h2>

            <!-- FORMULAIRE D'INSCRIPTION -->
            <form action="{{ route('users.update', auth()->id()) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">

                    <input
                        type="text"
                        placeholder="Nom d'utilisateur"
                        class="w-full border border-gray-700 p-2 rounded-lg bg-gray-800 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 mb-3"
                        name="name"
                        required
                    >

                    <input
                        type="email"
                        placeholder="Email"
                        class="w-full border border-gray-700 p-2 rounded-lg bg-gray-800 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 mb-3"
                        name="email"
                        required
                    >

                    <input
                        type="password"
                        placeholder="Mot de passe"
                        class="w-full border border-gray-700 p-2 rounded-lg bg-gray-800 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 mb-3"
                        name="password"
                        required
                    >

                    <!-- Confirmation du mot de passe -->

                    <button
                        type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition mb-2"
                    >
                        Modifier
                    </button>

                </div>

            </form>

            <button
                id="closeRegister"
                class="w-full bg-gray-700 text-white py-2 rounded-lg hover:bg-gray-600 transition"
            >
                Fermer
            </button>

        </div>

    </div>


    <!-- Login Modal -->
    <div
        id="loginModal"
        class="hidden fixed inset-0 z-40 flex items-center justify-center bg-black/70"
    >

        <div class="w-96 rounded-xl border border-gray-800 bg-gray-900 p-6 text-gray-100 shadow-2xl">

            <h2 class="mb-4 text-2xl font-bold">
                Connexion
            </h2>

            <form action="/Accueil" method="POST">
                @csrf

                <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    class="w-full border border-gray-700 p-2 rounded-lg bg-gray-800 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 mb-3"
                    required
                >

                <input
                    type="password"
                    name="password"
                    placeholder="Mot de passe"
                    class="w-full border border-gray-700 p-2 rounded-lg bg-gray-800 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 mb-4"
                    required
                >

                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition mb-2"
                >
                    Se connecter
                </button>

                <label class="flex items-center mb-4">
                    <input
                        type="checkbox"
                        name="remember"
                        class="mr-2"
                    >

                    <span class="text-sm">
                        Se souvenir de moi
                    </span>
                </label>

            </form>

            <button
                id="closeLogin"
                class="w-full bg-gray-700 text-white py-2 rounded-lg hover:bg-gray-600 transition"
            >
                Fermer
            </button>

        </div>

    </div>


    <!-- Mobile Menu -->
    <div
        id="mobileNav"
        class="hidden fixed inset-0 z-50 bg-black/60"
    >

        <div class="bg-gray-900 w-full p-6 pt-20">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-xl font-bold text-white">
                    Menu
                </h2>

                <button
                    id="closeNav"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-300 hover:bg-gray-800"
                    aria-label="Fermer le menu"
                >
                    <svg
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>

            </div>


            <nav class="flex flex-col gap-4">

                <a
                    href="/"
                    class="text-white hover:text-blue-400 transition"
                >
                    Accueil
                </a>

                <a
                    href="/Catalogue"
                    class="text-white hover:text-blue-400 transition"
                >
                    Catalogue
                </a>

                <a
                    href="/Panier"
                    class="text-white hover:text-blue-400 transition"
                >
                    Panier
                </a>

                <a
                    href="/contact"
                    class="text-white hover:text-blue-400 transition"
                >
                    Compte
                </a>

            </nav>

        </div>

    </div>

</div>


<!-- JavaScript -->
<script src="{{ asset('Js/Accueil.js') }}"></script>

</body>
</html>