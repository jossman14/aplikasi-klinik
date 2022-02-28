<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaranNonMedisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengeluaran_non_medis', function(Blueprint $table)
		{
			$table->integer('pengeluaran_non_medis_id', true);
			$table->integer('nama_pengeluaran_non_medis')->nullable();
			$table->integer('nilai_besaran')->nullable();
			$table->integer('pengeluaran_berulang')->nullable();
			$table->integer('jangka_waktu')->nullable();
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
		Schema::drop('pengeluaran_non_medis');
	}

}
