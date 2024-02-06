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
            $table->string('nazev');
            $table->text('popis');
            $table->text('akce');
            $table->string('provize');
            $table->string('voucher');
            $table->string('webLink');
            $table->string('img');
            $table->string('pudorysLink');
            $table->string('podporaJmeno');
            $table->string('podporaEmail');
            $table->string('podporaTel');
            $table->string('zamereniJmeno');
            $table->tinytext('zamereniEmail');
            $table->integer('zamereniTel');
            $table->boolean('active');
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
