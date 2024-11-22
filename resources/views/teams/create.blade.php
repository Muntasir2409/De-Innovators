<x-base-layout>
    <x-slot:title>
        Nieuw Team
    </x-slot:title>

    <h1 class="text-2xl font-bold mb-6">Nieuw Team Aanmaken</h1>

    <form action="{{ route('teams.store') }}" method="POST" class="bg-white shadow rounded p-6">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold">Teamnaam</label>
            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded mt-1" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Opslaan
        </button>
    </form>
</x-base-layout>
