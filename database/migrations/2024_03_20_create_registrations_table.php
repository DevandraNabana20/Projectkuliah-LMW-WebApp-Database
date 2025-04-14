<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik', 16);
            $table->string('kontak', 13);
            $table->string('gender');
            $table->string('email')->nullable();
            $table->text('topik');
            $table->boolean('needs_companion')->default(false);
            $table->string('companion')->nullable();
            $table->date('tanggal_reservasi');
            $table->string('waktu_reservasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrations');
    }
};
