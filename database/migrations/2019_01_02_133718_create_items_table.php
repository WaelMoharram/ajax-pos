<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration {

	public function up()
	{
		Schema::create('items', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->string('image');
			$table->decimal('price');
			$table->text('note')->nullable();
			$table->integer('category_id');
		});
	}

	public function down()
	{
		Schema::drop('items');
	}
}