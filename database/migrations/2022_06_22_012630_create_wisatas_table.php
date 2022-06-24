<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id');
            $table->string('name');
            $table->string('alamat');
            $table->text('desc');
            $table->text('nohp');
            $table->bigInteger('harga');
            $table->enum('satuan', ['Orang', 'Rombongan']);
            $table->string('media_code')->nullable();
            $table->text('map');
            $table->string('cover');
            $table->double('lat');
            $table->double('lng');
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
        Schema::dropIfExists('wisatas');
    }
}
