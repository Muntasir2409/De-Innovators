<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Bets</title>
    @vite('resources/css/app.css') <!-- Tailwind CSS -->
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <!-- Navigatiebalk -->
    <nav class="bg-green-700 text-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold">FootballBets</a>
            <ul class="flex space-x-6">
                <li><a href="#" class="hover:text-yellow-400">Home</a></li>
                <li><a href="#matches" class="hover:text-yellow-400">Wedstrijden</a></li>
                <li><a href="#how-to" class="hover:text-yellow-400">Hoe werkt het?</a></li>
                <li><a href="#contact" class="hover:text-yellow-400">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Sectie -->
    <header class="bg-green-800 text-white">
        <div class="container mx-auto px-4 py-16 text-center">
            <h1 class="text-5xl font-bold">Welkom bij FootballBets</h1>
            <p class="mt-4 text-lg">De plek waar je fictief kunt wedden op je favoriete voetbalwedstrijden.</p>
            <a href="#matches" class="mt-6 inline-block bg-yellow-400 text-green-900 px-6 py-3 rounded-lg font-semibold hover:bg-yellow-500">
                Bekijk Wedstrijden
            </a>
        </div>
    </header>

    <!-- Sectie: Wedstrijden -->
    <section id="matches" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Aanstaande Wedstrijden</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Voeg hier wedstrijdkaarten toe -->
            </div>

            <!-- Geen wedstrijden gepland -->
            <div class="mt-8 text-center">
                <p class="text-lg text-gray-600 italic">Nog geen wedstrijden gepland.</p>
            </div>
        </div>
    </section>

    <!-- Sectie: Hoe werkt het? -->
    <section id="how-to" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Hoe werkt het?</h2>
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="md:w-1/2">
                    <img src="https://via.placeholder.com/400x250" alt="Gokken uitleg" class="rounded-lg shadow-md">
                </div>
                <div class="md:w-1/2">
                    <ol class="list-decimal pl-6 text-lg">
                        <li>Kies een wedstrijd uit de lijst.</li>
                        <li>Plaats je fictieve inzet.</li>
                        <li>Kijk live hoe je weddenschap verloopt.</li>
                        <li>Verdien punten en stijg in het klassement!</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4 text-center">
            <p class="mb-4">Heb je vragen? Neem contact met ons op via <a href="mailto:info@footballbets.com" class="text-yellow-400 hover:text-yellow-500">info@footballbets.com</a>.</p>
            <p>&copy; 2024 FootballBets. Alle rechten voorbehouden.</p>
        </div>
    </footer>
</body>
</html>
