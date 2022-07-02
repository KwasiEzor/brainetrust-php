<?php

use App\Models\PlayerSerie;
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
        Schema::create('interclubs', function (Blueprint $table) {
            $table->id();
            $table->integer('match_round')->default(1);
            $table->unsignedBigInteger('receiver_team_id');
            $table->foreign('receiver_team_id')->references('id')->on('clubs');
            $table->unsignedBigInteger('visitor_team_id');
            $table->foreign('visitor_team_id')->references('id')->on('clubs');
            $table->dateTime('match_date')->default(now());
            $table->foreignIdFor(PlayerSerie::class)->default(1);
            $table->decimal('receiver_team_score');
            $table->decimal('visitor_team_score');
            $table->text('comments')->nullable();
            $table->string('match_report')->nullable();
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
        Schema::dropIfExists('interclubs');
    }
};
