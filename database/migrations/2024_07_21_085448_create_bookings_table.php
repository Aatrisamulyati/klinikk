<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('dokter_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('tanggal');
            $table->string('jam');
            $table->enum('status', ['Booking', 'Selesai', 'Batal'])->default('Booking')->change();
            $table->string('gambar')->nullable();
            $table->string('keterangan')->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
