<x-base-layout>
    <div class="container mx-auto">
        <h1 class="text-xl font-bold">Wedstrijden</h1>

        <!-- Knop om wedstrijden te genereren -->
        <form action="{{ route('games.generate') }}" method="GET">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded mt-4">
                Genereer Wedstrijden
            </button>
        </form>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 mt-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Wedstrijdenlijst -->
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">Team 1</th>
                    <th class="px-4 py-2">Team 2</th>
                    <th class="px-4 py-2">Datum</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($games as $game)
                    <tr>
                        <td class="border px-4 py-2">{{ $game->team1->name }}</td>
                        <td class="border px-4 py-2">{{ $game->team2->name }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($game->date)->format('Y-m-d') }}</td>

                    </tr>
                @endforeach --}}
                @foreach ($games as $game)
    <tr>
        <td class="border px-4 py-2">{{ $game->team1->name }}</td>
        <td class="border px-4 py-2">{{ $game->team2->name }}</td>
        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($game->date)->format('Y-m-d') }}</td>

        <td class="border px-4 py-2">
            @if(is_null($game->score_team1) && is_null($game->score_team2))
                <form action="{{ route('games.update', $game->id) }}" method="POST">
                    @csrf
                    <input type="number" name="score_team1" required class="border p-1" placeholder="Score Team 1" />
                    <input type="number" name="score_team2" required class="border p-1" placeholder="Score Team 2" />
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded mt-2">Score invoeren</button>
                </form>
            @else
                <span>{{ $game->score_team1 }} - {{ $game->score_team2 }}</span>
            @endif
        </td>
    </tr>
@endforeach

            </tbody>
        </table>
    </div>


</x-base-layout>
