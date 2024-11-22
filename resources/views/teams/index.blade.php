<x-base-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Alle Teams</h1>
            <a href="{{ route('teams.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-300">Maak een nieuw team aan</a>
        </div>

        <!-- Teams Tabel -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Teamnaam</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Acties</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($teams as $team)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-700">{{ $team->name }}</td>
                            <td class="px-6 py-4 text-sm font-medium">
                                <a href="{{ route('teams.show', $team) }}" class="text-blue-600 hover:text-blue-800 transition duration-300">Bekijk</a>
                                <a href="{{ route('teams.edit', $team) }}" class="text-green-600 hover:text-green-800 ml-4 transition duration-300">Bewerken</a>
                                <form action="{{ route('teams.destroy', $team) }}" method="POST" class="inline-block ml-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition duration-300">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-base-layout>
