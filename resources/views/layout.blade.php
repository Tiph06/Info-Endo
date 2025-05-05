<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Info-Endo')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>

<body class="bg-pink-50 text-gray-900 font-sans">

    <header class="bg-pink-200 py-4 shadow-md">
        <div class="max-w-4xl mx-auto px-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-pink-900">Info-Endo 🌸</h1>
            <nav>
                <a href="{{ route('blog.index') }}" class="text-pink-800 font-medium hover:underline">Accueil</a>
                <a href="{{ route('article') }}" class="text-pink-800 font-medium hover:underline ml-4">Article</a>
                <a href="{{ route('temoignages.index') }}" class="text-pink-800 font-medium hover:underline ml-4">Témoignages</a>

                @auth
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="ml-4 text-sm text-pink-700 font-medium hover:underline">Se déconnecter</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                @else
                <a href="{{ route('login') }}" class="ml-4 text-sm text-pink-700 font-medium hover:underline">Connexion</a>
                <a href="{{ route('register') }}" class="ml-4 text-sm text-pink-700 font-medium hover:underline">Inscription</a>
                @endauth


            </nav>
        </div>
    </header>

    <main class="max-w-4xl mx-auto p-4 mt-6">
        @yield('content')
    </main>

    <footer class="mt-10 py-6 text-center text-sm text-gray-500">
        © {{ date('Y') }} Info-Endo – Ensemble pour mieux comprendre 💛
    </footer>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @yield('scripts')
</body>

</html>