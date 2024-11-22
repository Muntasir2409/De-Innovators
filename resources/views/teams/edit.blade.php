<x-base-layout>
<h1 class="text-2xl font-bold mb-6">Team Bewerken</h1>

<form action="{{ route('teams.update', $team) }}" method="POST" class="bg-white shadow rounded p-6">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-bold">Teamnaam</label>
        <input type="text" name="name" id="name" value="{{ $team->name }}" class="w-full border-gray-300 rounded mt-1" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Bijwerken
    </button>
</form>
</x-base-layout>
