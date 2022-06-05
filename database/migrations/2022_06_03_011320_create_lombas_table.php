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
        Schema::create('lombas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // created by
            $table->string('nama');
            $table->date('deadline_pendaftaran');
            $table->string('poster')->nullable();
            $table->string('kategori');
            $table->string('penyelenggara');
            $table->string('tingkat');
            $table->string('website');
            $table->longText('deskripsi');
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
        Schema::dropIfExists('lombas');
    }
};
