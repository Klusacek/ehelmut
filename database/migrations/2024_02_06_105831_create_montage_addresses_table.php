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
        Schema::create('montage_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('idKontakt');
            $table->tinytext('firma');
            $table->integer('ico');
            $table->tinytext('dic');
            $table->tinytext('jmeno');
            $table->tinytext('prijmeni');
            $table->tinytext('ulice');
            $table->tinytext('mesto');
            $table->integer('psc');
            $table->integer('tel');
            $table->tinytext('email');
            $table->text('poznamkaKontakt');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('montage_addresses');
    }
};
