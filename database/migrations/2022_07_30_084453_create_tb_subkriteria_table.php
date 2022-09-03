<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSubkriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_subkriteria', function (Blueprint $table) {
            $table->id();
            $table->string('kode_subkriteria');
            $table->foreignId('id_kriteria')
                ->constrained('tb_kriteria')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->string('nama_subkriteria',255);
            $table->string('nilai',255)->nullable();
            $table->integer('bobot')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('tb_subkriteria');
    }
}
