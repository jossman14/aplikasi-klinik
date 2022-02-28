<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdmKontrakTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sdm_kontrak', function(Blueprint $table)
		{
			$table->integer('sdm_kontrak', true);
			$table->integer('id_sdm')->nullable();
			$table->dateTime('tgl_masuk')->nullable();
			$table->dateTime('tgl_keluar')->nullable();
			$table->boolean('isUpdate')->nullable();
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
		Schema::drop('sdm_kontrak');
	}

}
