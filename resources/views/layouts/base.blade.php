<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <header class="bg-green-800 text-white">
        <nav class="bg-green-700 text-white shadow-md">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <a href="/" class="text-2xl font-bold block transform transition-transform duration-300 ease-in-out hover:scale-110 hover:text-yellow-400 hover:font-bold px-4 py-2 rounded-lg">FootballBets</a>
                <ul class="flex space-x-6">
                    <li>
                        <a href="/games"
                           class="block transform transition-transform duration-300 ease-in-out hover:scale-110 hover:bg-white hover:text-yellow-400 hover:font-bold px-4 py-2 rounded-lg">
                           Wedstrijden
                        </a>
                    </li>
                    <li>
                        <a href="/standings"
                           class="block transform transition-transform duration-300 ease-in-out hover:scale-110 hover:bg-white hover:text-yellow-400 hover:font-bold px-4 py-2 rounded-lg">
                           Stand
                        </a>
                    </li>
                    <li>
                        <a href="/#how-to"
                           class="block transform transition-transform duration-300 ease-in-out hover:scale-110 hover:bg-white hover:text-yellow-400 hover:font-bold px-4 py-2 rounded-lg">
                           Hoe werkt het?
                        </a>
                    </li>
                    <li>
                        <a href="/#contact"
                           class="block transform transition-transform duration-300 ease-in-out hover:scale-110 hover:bg-white hover:text-yellow-400 hover:font-bold px-4 py-2 rounded-lg">
                           Contact
                        </a>
                    </li>
                    @if (auth()->check() && auth()->user()->role === 'scheidsrechter' || 'admin')
                        <li>
                            <a href="/teams/index"
                                class="block transform transition-transform duration-300 ease-in-out hover:scale-110 hover:bg-white hover:text-yellow-400 hover:font-bold px-4 py-2 rounded-lg">
                                Team
                            </a>
                        </li>
                    @endif
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <li>
                            <a href="{{ url('/admin') }}"
                                class="block transform transition-transform duration-300 ease-in-out hover:scale-110 hover:bg-white hover:text-yellow-400 hover:font-bold px-4 py-2 rounded-lg">
                                Admin Panel
                            </a>
                        </li>
                    @endif
                </ul>
                <ul class="flex space-x-6">
                    @guest
                        <li>
                            <a href="{{ route('login') }}"
                               class="transform hover:scale-110 hover:text-yellow-400 transition duration-300 ease-in-out">
                               Login
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}"
                               class="transform hover:scale-110 hover:text-yellow-400 transition duration-300 ease-in-out">
                               Registreren
                            </a>
                        </li>
                    @endguest
                    @auth
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                        class="transform hover:scale-110 hover:text-yellow-400 transition duration-300 ease-in-out">
                                    Uitloggen
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>

        <div class="container mx-auto px-4 py-16 text-center">
            <h1 class="text-5xl font-bold">Welkom bij FootballBets</h1>
            <p class="mt-4 text-lg">De plek waar je fictief kunt wedden op je favoriete voetbalwedstrijden.</p>
            <a href="#matches"
               class="mt-6 inline-block bg-yellow-400 text-green-900 px-6 py-3 rounded-lg font-semibold transform hover:scale-105 hover:bg-yellow-500 transition duration-300 ease-in-out">
               Bekijk Wedstrijden
            </a>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer id="contact" class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p class="mb-4">Heb je vragen? Neem contact met ons op via <a href="mailto:info@footballbets.com" class="text-yellow-400 hover:text-yellow-500">info@footballbets.com</a>.</p>
            <p>&copy; 2024 FootballBets. Alle rechten voorbehouden.</p>
        </div>
    </footer>

</body>
</html>
