<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;  // Voeg Carbon toe

class Game extends Model
{
    use HasFactory;

    // Beschikbare velden voor mass assignment
    protected $fillable = [
        'team1_id',
        'team2_id',
        'date',
    ];

    // Voeg de 'date' kolom toe aan de $dates array zodat Laravel deze als een Carbon object behandelt
    protected $dates = ['date'];

    // Relaties met teams
    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }
    public function standing()
    {
        return $this->hasOne(Standing::class);
    }
}
