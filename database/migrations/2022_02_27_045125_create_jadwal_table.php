<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jadwal', function(Blueprint $table)
		{
			$table->integer('jadwal_id', true);
			$table->integer('id_dokter')->nullable();
			$table->integer('hari')->nullable();
			$table->integer('jam_mulai')->nullable();
			$table->integer('jam_selesai')->nullable();
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
		Schema::drop('jadwal');
	}

}
