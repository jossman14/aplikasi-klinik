<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pasien', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama', 200)->nullable();
			$table->string('alamat_tetap', 200)->nullable();
			$table->char('kecamatan_tetap_id', 11)->nullable();
			$table->char('kabupaten_tetap_id', 11)->nullable();
			$table->char('provinsi_tetap_id', 11)->nullable();
			$table->string('nama_keluarga', 200)->nullable();
			$table->string('nik', 50)->nullable();
			$table->char('tempat_lahir', 11)->nullable();
			$table->dateTime('tgl_lahir')->nullable();
			$table->boolean('jenis_kelamin')->nullable();
			$table->integer('agamaId')->nullable();
			$table->string('alamat_sementara', 200)->nullable();
			$table->char('desa_smt_id', 11)->nullable();
			$table->char('kecamatan_smt_id', 11)->nullable();
			$table->char('kabupaten_smt_id', 11)->nullable();
			$table->char('provinsi_smt_id', 11)->nullable();
			$table->string('alamat_keluarga', 200)->nullable();
			$table->char('desa_klg_id', 11)->nullable();
			$table->char('kecamatan_klg_id', 11)->nullable();
			$table->char('kabupaten_klg_id', 11)->nullable();
			$table->char('provinsi_klg_id', 11)->nullable();
			$table->integer('umur')->nullable();
			$table->integer('gol_dar_id')->nullable();
			$table->dateTime('tgl_reg')->nullable();
			$table->string('pekerjaan', 200)->nullable();
			$table->string('nomor_telepon', 100)->nullable();
			$table->string('nomor_telepon_keluarga', 100)->nullable();
			$table->string('nomor_bpjs', 50)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->char('desa_tetap_id', 10)->nullable();
			$table->string('sapaan', 4)->nullable();
			$table->string('norm', 50)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pasien');
	}

}
