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
        Schema::create('montage_teams', function (Blueprint $table) {
            $table->id();
            $table->string('jmeno');
            $table->integer('kapacita');
            $table->integer('instalace');
            $table->string('avatar');
            $table->string('email');
            $table->string('telefon');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('montage_teams');
    }
};
