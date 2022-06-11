<?php

use App\Models\PlayerCategory;
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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->date('event_date')->default(now());
            $table->string('event_time')->nullable();
            $table->string('competition');
            $table->string('competition_round')->nullable();
            $table->string('minute_per_round')->nullable();
            $table->text('details')->nullable();
            $table->foreignIdFor(PlayerCategory::class)->nullable();
            $table->foreignIdFor(PlayerSerie::class)->nullable();
            $table->boolean('is_highlighted')->default(false);
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
        Schema::dropIfExists('agendas');
    }
};
