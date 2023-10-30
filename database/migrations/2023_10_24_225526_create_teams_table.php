<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('soccerteams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matches');
            $table->foreign('matches')->references('id')->on('soccermatches');
            $table->unsignedBigInteger('soccerplayer');
            $table->foreign('soccerplayer')->references('id')->on('soccerplayers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soccerteams');
    }
};
