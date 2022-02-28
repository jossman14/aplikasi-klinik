<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntrianTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('antrian', function(Blueprint $table)
		{
			$table->integer('antrian_id', true);
			$table->dateTime('waktu_antrian')->nullable();
			$table->integer('nomor_antrian')->nullable();
			$table->integer('jenis_antrian')->nullable();
			$table->string('tmp_ambl_antrian', 20)->nullable();
			$table->boolean('isPeriksa')->nullable();
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
		Schema::drop('antrian');
	}

}
