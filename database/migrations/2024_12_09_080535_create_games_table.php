<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
        public function up()
        {
            Schema::create('games', function (Blueprint $table) {
                $table->id();
                $table->foreignId('team1_id')->constrained('teams'); // Verwijst naar de teams-tabel
                $table->foreignId('team2_id')->constrained('teams'); // Verwijst naar de teams-tabel
                $table->dateTime('date');
                $table->integer('score_team1')->nullable();
                $table->integer('score_team2')->nullable();
                $table->integer('points_team1')->default(0);
                $table->integer('points_team2')->default(0);
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('games');
        }
    }

