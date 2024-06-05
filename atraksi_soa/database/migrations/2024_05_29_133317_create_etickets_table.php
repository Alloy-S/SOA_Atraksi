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
        Schema::create('etickets', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code');
            $table->string('ticket_code')->unique();
            $table->foreignId('paket_id');
            $table->string('jenis');
            $table->date('valid_until');
            $table->dateTime('check_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etickets');
    }
};
