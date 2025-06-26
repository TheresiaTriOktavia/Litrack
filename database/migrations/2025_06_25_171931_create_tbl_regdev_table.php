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
        Schema::create('tbl_regdev', function (Blueprint $table) {
             $table->id('id_rd');
             $table->string('nama_rd');

             $table->unsignedBigInteger('id_dev');
             $table->unsignedBigInteger('id_ipal');
             $table->unsignedBigInteger('id_lok');

            $table->integer('status')->default(1);
            $table->text('ket')->nullable();
            $table->timestamps();

            $table->foreign('id_dev')->references('id_dev')->on('tbl_device')->onDelete('cascade');
            $table->foreign('id_ipal')->references('id_ipal')->on('tbl_ipal')->onDelete('cascade');
            $table->foreign('id_lok')->references('id_lok')->on('tbl_lokasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_regdev');
    }
};
