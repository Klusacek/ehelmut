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
        Schema::create('customer_order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('orderNum');
            $table->string('kod');
            $table->string('popis');
            $table->integer('kus');
            $table->string('dodavatelKod');
            $table->string('katalog');
            $table->string('rubrika');
            $table->string('modelName');
            $table->string('barvaDvere');
            $table->string('barvaKorpus');
            $table->integer('nakupKd');
            $table->integer('nakupReal');
            $table->integer('prodej');
            $table->integer('prodejDph');
            $table->integer('objednavka');
            $table->integer('faktura');
            $table->integer('dodak');
            $table->integer('idSklad');
            $table->datetime('vykladnenoDate');
            $table->integer('idPoznamka');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_order_items');
    }
};
