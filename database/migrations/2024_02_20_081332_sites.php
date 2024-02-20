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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->text('nazev');
            $table->text('adresa_ulice');
            $table->text('adresa_mesto');
            $table->integer('adresa_psc');
            $table->text('kontakt_osoba');
            $table->text('kontakt_telefon');
            $table->text('kontakt_email');
            $table->text('otviraci_doba');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developers');
    }
};
