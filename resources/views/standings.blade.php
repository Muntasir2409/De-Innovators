<x-base-layout>
    <div class="container mx-auto">
        <h1 class="text-xl font-bold">Stand</h1>

        <!-- Standenlijst -->
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Team</th>
                    <th class="px-4 py-2">Punten</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td class="border px-4 py-2">{{ $team->name }}</td>
                        <td class="border px-4 py-2">{{ $team->total_points }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-base-layout>
