<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObatDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('obat_detail', function(Blueprint $table)
		{
			$table->integer('obat_id', true);
			$table->string('nama_obat', 50)->nullable();
			$table->integer('satuan')->nullable();
			$table->integer('jenis_obat')->nullable();
			$table->integer('min_stock')->nullable();
			$table->integer('max_stock')->nullable();
			$table->integer('stock')->nullable();
			$table->dateTime('tgl_beli')->nullable();
			$table->dateTime('expire')->nullable();
			$table->string('batch', 50)->nullable();
			$table->integer('penyedia')->nullable();
			$table->integer('harga_beli')->nullable();
			$table->integer('harga_jual')->nullable();
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
		Schema::drop('obat_detail');
	}

}
