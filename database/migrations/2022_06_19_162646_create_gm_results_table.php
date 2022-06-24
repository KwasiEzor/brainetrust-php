<?php

use App\Models\ScGame;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gm_results', function (Blueprint $table) {
            $table->id();
            $table->integer('ranking_position');
            $table->integer('player_top');
            $table->integer('game_top');
            $table->decimal('percentage', 4, 2)->unsigned();
            $table->foreignIdFor(ScGame::class)->onDelete('cascade');
            $table->foreignIdFor(User::class)->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gm_results');
    }
};
