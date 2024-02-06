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
        Schema::create('zakazky', function (Blueprint $table) {
            $table->id();
            $table->timestamp('cas');
            $table->integer('orderNum')->unique;
            $table->text('oznaceni');
            $table->tinyInteger('idKontakt');
            $table->boolean('prenosDPH');
            $table->tinyInteger('typ');
            $table->tinyInteger('druh');
            $table->tinyInteger('user');
            $table->tinyInteger('provozovna');
            $table->tinyInteger('klient');
            $table->tinyInteger('developer');
            $table->boolean('pokladna');
            $table->boolean('smlouva');
            $table->boolean('objednavky');
            $table->tinyInteger('platbyRank');
            $table->timestamp('ukonceno')->nullable();
            $table->timestamp('archiv')->nullable();
            $table->float('zisk');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zakazky');
    }
};
