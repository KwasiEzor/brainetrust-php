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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('birthday')->nullable();
            $table->string('address');
            $table->string('city');
            $table->integer('zip_code');
            $table->string('phone');
            $table->string('profile_img')->nullable();
            $table->foreignIdFor(User::class)->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('is_member')->default(false);
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('user_infos');
    }
};
