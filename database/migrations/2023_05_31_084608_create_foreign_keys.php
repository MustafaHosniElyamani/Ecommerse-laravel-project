<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('color_product', function(Blueprint $table) {
			$table->foreign('color_id')->references('id')->on('colors')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('color_product', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('product_size', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('product_size', function(Blueprint $table) {
			$table->foreign('size_id')->references('id')->on('sizes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('items', function(Blueprint $table) {
			$table->foreign('color_id')->references('id')->on('colors');
		});
		Schema::table('items', function(Blueprint $table) {
			$table->foreign('size_id')->references('id')->on('sizes');
		});
		Schema::table('items', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('orders');
		});
		Schema::table('items', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products');
		});


	}

	public function down()
	{
		Schema::table('color_product', function(Blueprint $table) {
			$table->dropForeign('color_product_color_id_foreign');
		});
		Schema::table('color_product', function(Blueprint $table) {
			$table->dropForeign('color_product_product_id_foreign');
		});
		Schema::table('product_size', function(Blueprint $table) {
			$table->dropForeign('product_size_product_id_foreign');
		});
		Schema::table('product_size', function(Blueprint $table) {
			$table->dropForeign('product_size_size_id_foreign');
		});
		Schema::table('items', function(Blueprint $table) {
			$table->dropForeign('items_color_id_foreign');
		});
		Schema::table('items', function(Blueprint $table) {
			$table->dropForeign('items_size_id_foreign');
		});
		Schema::table('items', function(Blueprint $table) {
			$table->dropForeign('items_product_id_foreign');
		});
		Schema::table('items', function(Blueprint $table) {
			$table->dropForeign('items_order_id_foreign');
		});
	}
}
