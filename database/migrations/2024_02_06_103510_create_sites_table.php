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
            $table->string('nazev');
            $table->string('ulice');
            $table->string('mesto');
            $table->integer('psc');
            $table->string('otviraciDoba');
            $table->string('email');
            $table->string('telefon');
            $table->string('kontaktOsoba');
            $table->string('kontaktEmail');
            $table->string('kontakTel');
            $table->boolean('active');
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
