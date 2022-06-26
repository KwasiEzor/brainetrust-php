<?php

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
        Schema::create('sc_games', function (Blueprint $table) {
            $table->id();
            $table->string('competition')->default('Amicale');
            $table->foreignIdFor(User::class);
            $table->dateTime('competition_date')->default(now());
            $table->string('report_sheet')->nullable();
            $table->text('comments')->nullable();
            $table->string('cover_img')->default('images/scrabble-duplicate.png');
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
        Schema::dropIfExists('sc_games');
    }
};
