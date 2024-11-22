<x-base-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-4">Speler toevoegen aan {{ $team->name }}</h1>

        <form action="{{ route('players.store', $team) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="positie" class="block text-sm font-medium text-gray-700">Positie</label>
                <input type="text" name="positie" id="positie" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="rugnummer" class="block text-sm font-medium text-gray-700">Rugnummer</label>
                <input type="number" name="rugnummer" id="rugnummer" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">Speler toevoegen</button>
        </form>
    </div>
</x-base-layout>
