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
        Schema::create('atraksis', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->text('info_penting');
            $table->text('highlight');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('provinsi_name');
            $table->string('kota');
            $table->string('kota_name');
            $table->string('negara');
            $table->string('gps_location');
            $table->double('lowest_price')->default(0);
            $table->boolean('is_active')->default(false);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atraksis');
    }
};
