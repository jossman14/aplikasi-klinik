<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarPeriksaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('daftar_periksa', function(Blueprint $table)
		{
			$table->integer('daftar_periksa', true);
			$table->dateTime('waktu_daftar_periksa')->nullable();
			$table->integer('id_pasien')->nullable();
			$table->integer('id_dokter')->nullable();
			$table->integer('id_poli')->nullable();
			$table->integer('check_awal')->nullable();
			$table->integer('hasil_check_awal')->nullable();
			$table->integer('diagnosa')->nullable();
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
		Schema::drop('daftar_periksa');
	}

}
