<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    // Beschikbare velden voor mass assignment
    protected $fillable = ['name'];

    // Relaties met spelers
    public function players()
    {
        return $this->hasMany(Player::class);
    }


    // Relatie met games als team1
    public function gamesAsTeam1()
    {
        return $this->hasMany(Game::class, 'team1_id');
    }

    // Relatie met games als team2
    public function gamesAsTeam2()
    {
        return $this->hasMany(Game::class, 'team2_id');
    }
    public function games()
{
    return $this->hasMany(Game::class);
}
public function standing()
{
    return $this->hasOne(Standing::class);
}

}
