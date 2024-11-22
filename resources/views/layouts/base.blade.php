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
                <a href="/" class="text-2xl font-bold">FootballBets</a>
                <ul class="flex space-x-6">
                    <li><a href="/#matches" class="hover:text-yellow-400">Wedstrijden</a></li>
                    <li><a href="/#how-to" class="hover:text-yellow-400">Hoe werkt het?</a></li>
                    <li><a href="/#contact" class="hover:text-yellow-400">Contact</a></li>
                    <li><a href="/teams/index" class="hover:text-yellow-400">teams</a></li>
                </ul>
            </div>
        </nav>

        <div class="container mx-auto px-4 py-16 text-center">
            <h1 class="text-5xl font-bold">Welkom bij FootballBets</h1>
            <p class="mt-4 text-lg">De plek waar je fictief kunt wedden op je favoriete voetbalwedstrijden.</p>
            <a href="#matches" class="mt-6 inline-block bg-yellow-400 text-green-900 px-6 py-3 rounded-lg font-semibold hover:bg-yellow-500">
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
