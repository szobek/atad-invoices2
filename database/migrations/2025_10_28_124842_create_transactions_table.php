<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->string('szamlaszam')->nullable();
        $table->string('tipus')->nullable();
        $table->string('vevo')->nullable();
        $table->string('vevo_adoszama')->nullable();
        $table->string('irsz')->nullable();
        $table->string('telepules')->nullable();
        $table->string('cim')->nullable();
        $table->date('kelt')->nullable();
        $table->date('teljesites')->nullable();
        $table->string('fizetesi_mod')->nullable();
        $table->string('mennyiseg_egyseg')->nullable();
        $table->decimal('netto_egysegar', 15, 2)->nullable();
        $table->decimal('netto_ar', 15, 2)->nullable();
        $table->decimal('afa', 15, 2)->nullable();
        $table->decimal('brutto_ar', 15, 2)->nullable();
        $table->string('devizanem')->nullable();
        $table->decimal('arfolyam', 10, 4)->nullable();
        $table->string('tetel')->nullable();
        $table->string('tetel_megjegyzes')->nullable();
        $table->string('vevo_azonosito')->nullable();
        $table->string('felhasznalo')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
