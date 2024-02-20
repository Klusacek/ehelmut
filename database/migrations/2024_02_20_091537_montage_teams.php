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
        $table->boolean('instalace')->default(false);
        $table->string('avatar');
        $table->string('email');
        $table->string('heslo');
        $table->integer('telefon');
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
