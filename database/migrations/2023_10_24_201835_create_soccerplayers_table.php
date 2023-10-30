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
        Schema::create('soccerplayers', function (Blueprint $table) {
            $table->id();
            $table->string('soccerplayer', 80);
            $table->boolean('goalkeeper');
            $table->integer('level');
            $table->integer('sortition')->nullable();
            $table->string('photo', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soccerplayers');
    }
};
