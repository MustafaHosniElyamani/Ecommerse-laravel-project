<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorProductTable extends Migration {

	public function up()
	{
		Schema::create('color_product', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('color_id')->unsigned();
			$table->integer('product_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('color_product');
	}
}
