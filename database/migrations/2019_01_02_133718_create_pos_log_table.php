<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePosLogTable extends Migration {

	public function up()
	{
		Schema::create('pos_log', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('user_id');
			$table->integer('model_id');
			$table->string('model_type');
			$table->enum('operation', array('index','show','edit','update','create','store','delete'));
            $table->boolean('status');
			$table->text('note')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('pos_log');
	}
}
