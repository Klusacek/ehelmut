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
        Schema::create('developers', function (Blueprint $table) {
            $table->id();
            $table->integer('razeni' ) ;
            $table->boolean('active' ) ;
            $table->string('nazev') ;
            $table->string('popis' ); 
            $table->string('akce' );
            $table->string('provize' );
            $table->string('voucher' );
            $table->string('link' );
            $table->string('image' );
            $table->string('pudorysy' );
            $table->string('kontakt_podpora' );
            $table->string('kontakt_podpora_tel' );
            $table->string('kontakt_podpora_email' );
            $table->string('kontakt_zamereni' );
            $table->string('kontakt_zamereni_tel' );
            $table->string('kontakt_zamereni_email' );
            $table->timestamps();
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
