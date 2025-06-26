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
        Schema::create('tbl_data', function (Blueprint $table) {
            $table->id('id_data');
            $table->unsignedBigInteger('id_rd');
            $table->string('value');
            $table->text('ket')->nullable();
            $table->timestamps();
            $table->foreign('id_rd')->references('id_rd')->on('tbl_regdev')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_data');
    }
};
