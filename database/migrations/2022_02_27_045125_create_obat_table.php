<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('obat', function(Blueprint $table)
		{
			$table->integer('obat_besar_id', true);
			$table->integer('obat_id')->nullable();
			$table->integer('satuan')->nullable();
			$table->integer('jenis_obat')->nullable();
			$table->integer('stock_total')->nullable();
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
		Schema::drop('obat');
	}

}
