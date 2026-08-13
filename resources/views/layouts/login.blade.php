@extends('layouts.app')

@section('title', 'Connexion')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Connexion</h1>

    <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input type="password" name="password" id="password" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </div>

        <div>
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 rounded-md bg-indigo-600 text-white">
                Se connecter
            </button>
        </div>
    </form>
</div>
@endsection