<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTindakanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tindakan', function(Blueprint $table)
		{
			$table->integer('tindakan_id', true);
			$table->integer('nama_tindakan')->nullable();
			$table->integer('jenis_tindakan')->nullable();
			$table->integer('harga_total')->nullable();
			$table->integer('jasa_dokter')->nullable();
			$table->integer('jasa_perawat')->nullable();
			$table->integer('jasa_klinik')->nullable();
			$table->integer('alat')->nullable();
			$table->integer('bahan')->nullable();
			$table->integer('lainnya')->nullable();
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
		Schema::drop('tindakan');
	}

}
