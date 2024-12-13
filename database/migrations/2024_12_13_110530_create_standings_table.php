<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

 class CreateStandingsTable extends Migration
    {
        public function up()
        {
            Schema::create('standings', function (Blueprint $table) {
                $table->id();
                $table->foreignId('team_id')->constrained('teams')->onDelete('cascade'); // Verbindt met de teams tabel
                $table->integer('total_points')->default(0); // Totale punten van het team
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('standings');
        }
    }
