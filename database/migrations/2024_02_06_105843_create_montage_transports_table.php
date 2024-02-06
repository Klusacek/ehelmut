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
        Schema::create('montage_transports', function (Blueprint $table) {
            $table->id();
            $table->integer('orderNum');
            $table->datetime('od');
            $table->datetime('do');
            $table->integer('idDopravce');
            $table->text('poznamkaDoprava');
            $table->string('firma');
            $table->integer('ico');
            $table->string('dic');
            $table->string('jmeno');
            $table->string('prijmeni');
            $table->string('ulice');
            $table->string('mesto');
            $table->integer('psc');
            $table->integer('tel');
            $table->string('email');
            $table->text('poznamkaKontakt');
            $table->text('gps');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('montage_transports');
    }
};
