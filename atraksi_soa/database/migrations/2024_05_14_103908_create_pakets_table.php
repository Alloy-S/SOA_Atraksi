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
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('atraksi_id');
            $table->foreignId('type_id');
            $table->string('title');
            $table->text('deskripsi');
            $table->text('fasilitas');
            $table->text('cara_penukaran');
            $table->text('syarat_dan_ketentuan');
            $table->double('harga');
            $table->double('harga_discount');
            $table->integer('masa_berlaku');
            $table->integer('kuota');
            $table->boolean('is_refundable');
            $table->timestamps();
            $table->foreign('atraksi_id')->references('id')->on('atraksis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};
