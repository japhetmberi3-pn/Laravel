
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
            class="inline-flex justify-center py-2 px-4 rounded-md bg-red-600 text-white">
            Déconnexion
        </button>
    </form>