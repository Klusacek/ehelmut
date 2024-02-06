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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->tinytext('kod');
            $table->integer('skladVychozi');
            $table->tinytext('nazev');
            $table->integer('ico');
            $table->tinytext('dic');
            $table->text('ulice');
            $table->text('mesto');
            $table->integer('psc');
            $table->text('objednavkyJmeno');
            $table->text('objednavkyEmail');
            $table->integer('objednavkyTel');
            $table->text('zastupceJmeno');
            $table->text('zastupceEmail');
            $table->integer('zastupceTel');
            $table->text('webLink');
            $table->text('b2bLink');
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
        Schema::dropIfExists('suppliers');
    }
};
