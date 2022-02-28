<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transaksi', function(Blueprint $table)
		{
			$table->integer('transaksi_id', true);
			$table->dateTime('waktu_transaksi')->nullable();
			$table->integer('id_daftar_periksa')->nullable();
			$table->integer('jenis_transaksi_id')->nullable();
			$table->integer('pasien_id')->nullable();
			$table->integer('sdm_id')->nullable();
			$table->integer('dokter_id')->nullable();
			$table->integer('id_input')->nullable();
			$table->integer('id_obat')->nullable();
			$table->integer('id_tindakan')->nullable();
			$table->integer('id_pengeluaran_non_medis')->nullable();
			$table->integer('total')->nullable();
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
		Schema::drop('transaksi');
	}

}
