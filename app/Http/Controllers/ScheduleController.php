<?
namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Game;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function generateSchedule()
    {
        $teams = Team::all();

        if ($teams->count() < 2) {
            return response()->json(['error' => 'Er moeten minimaal 2 teams zijn om een schema te genereren.'], 400);
        }

        if ($teams->count() % 2 != 0) {
            $teams->push(new Team(['id' => null, 'name' => 'Bye']));
        }

        $games = [];
        $numRounds = $teams->count() - 1;
        $numMatchesPerRound = $teams->count() / 2;

        for ($round = 0; $round < $numRounds; $round++) {
            for ($match = 0; $match < $numMatchesPerRound; $match++) {
                $home = ($round + $match) % ($teams->count() - 1);
                $away = ($teams->count() - 1 - $match + $round) % ($teams->count() - 1);

                if ($match == 0) {
                    $away = $teams->count() - 1;
                }

                $games[] = [
                    'team1_id' => $teams[$home]->id,
                    'team2_id' => $teams[$away]->id,
                    'match_date' => now()->addDays(count($games)),
                ];
            }
        }

        Game::insert($games);

        return response()->json(['success' => 'Wedstrijdschema succesvol gegenereerd!', 'games' => $games]);
    }
}
