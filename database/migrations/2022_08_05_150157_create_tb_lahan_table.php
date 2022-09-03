<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbLahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_lahan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kecamatan')
                ->constrained('tb_kecamatan')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->integer('luas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_lahan');
    }
}