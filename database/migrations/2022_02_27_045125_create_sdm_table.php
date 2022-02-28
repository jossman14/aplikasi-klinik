<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sdm', function(Blueprint $table)
		{
			$table->integer('sdm_id', true);
			$table->string('nama_sdm', 50)->nullable();
			$table->integer('alamat_sdm')->nullable();
			$table->integer('desa_sdm_id')->nullable();
			$table->integer('kecamatan_sdm_id')->nullable();
			$table->integer('kabupaten_sdm_id')->nullable();
			$table->integer('provinsi_sdm_id')->nullable();
			$table->string('nik', 50)->nullable();
			$table->string('nomor_hp', 50)->nullable();
			$table->string('jobdesk', 50)->nullable();
			$table->dateTime('tgl_lahir')->nullable();
			$table->integer('umur')->nullable();
			$table->integer('gol_darah_id')->nullable();
			$table->integer('agama_id')->nullable();
			$table->boolean('isDokter')->nullable();
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
		Schema::drop('sdm');
	}

}
