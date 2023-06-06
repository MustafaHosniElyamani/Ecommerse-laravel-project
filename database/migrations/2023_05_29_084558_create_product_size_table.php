<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizeTable extends Migration {

	public function up()
	{
		Schema::create('product_size', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('product_id')->unsigned();
			$table->integer('size_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('product_size');
	}
}
