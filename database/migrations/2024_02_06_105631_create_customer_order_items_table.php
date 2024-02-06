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
            $table->integer('idZbozi');
            $table->integer('orderNum');
            $table->string('kod');
            $table->text('popis');
            $table->integer('kus');
            $table->tinytext('dodavatelKod');
            $table->tinytext('katalog');
            $table->tinytext('rubrika');
            $table->tinytext('modelName');
            $table->tinytext('barvaDvere');
            $table->tinytext('barvaKorpus');
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
