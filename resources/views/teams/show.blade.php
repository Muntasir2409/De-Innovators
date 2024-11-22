<x-base-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Team Header -->
        <h1 class="text-3xl font-bold mb-6 text-gray-800">{{ $team->name }}</h1>

        <!-- Voeg speler toe button -->
        <div class="mb-6">
            <a href="{{ route('players.create', $team) }}" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Voeg een speler toe
            </a>
        </div>

        <!-- Spelers Tabel -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md overflow-hidden">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Spelers in dit team</h2>
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-600 font-medium">Naam</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-medium">Positie</th>
                        <th class="px-4 py-2 text-left text-gray-600 font-medium">Rugnummer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($team->players as $player)
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $player->name }}</td>
                            <td class="px-4 py-2">{{ $player->positie }}</td>
                            <td class="px-4 py-2">{{ $player->rugnummer }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-base-layout>
