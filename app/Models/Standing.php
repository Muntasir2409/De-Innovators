<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Standing extends Model
{
    protected $fillable = ['team_id', 'total_points'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
