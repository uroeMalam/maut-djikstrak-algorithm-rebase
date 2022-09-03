<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAlternatifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_alternatif', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->foreignId('id_kecamatan')
                ->constrained('tb_kecamatan')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('id_kriteria')
                ->constrained('tb_kriteria')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->string('nilai',255);
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
        Schema::dropIfExists('tb_alternatif');
    }
}
