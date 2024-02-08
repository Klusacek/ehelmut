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
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->datetime('cas');
            $table->integer('orderNum');
            $table->text('oznaceni');
            $table->integer('idKontakt');
            $table->boolean('prenosDPH');
            $table->integer('typ');
            $table->integer('druh');
            $table->integer('user');
            $table->integer('provozovna');
            $table->integer('klient');
            $table->integer('developer');
            $table->boolean('pokladna');
            $table->boolean('smlouva');
            $table->boolean('objednavky');
            $table->integer('platbyRank');
            $table->datetime('ukonceno');
            $table->datetime('archiv');
            $table->float('zisk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_orders');
    }
};
