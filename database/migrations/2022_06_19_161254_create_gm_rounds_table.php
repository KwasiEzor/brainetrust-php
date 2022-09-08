<?php

use App\Models\ScGame;
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
        Schema::create('gm_rounds', function (Blueprint $table) {
            $table->id();
            $table->string('letters_selected');
            $table->string('place');
            $table->string('solution');
            $table->integer('top_points');
            $table->text('comments')->nullable();
            $table->foreignIdFor(ScGame::class)->onDelete('cascade');
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
        Schema::dropIfExists('gm_rounds');
    }
};
