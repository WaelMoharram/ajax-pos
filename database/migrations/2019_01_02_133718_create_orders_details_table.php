<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersDetailsTable extends Migration {

	public function up()
	{
		Schema::create('orders_details', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('order_id');
			$table->integer('item_id');
			$table->decimal('price');
			$table->decimal('amount');
		});
	}

	public function down()
	{
		Schema::drop('orders_details');
	}
}