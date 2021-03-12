<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentRecordsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('payment_records', function (Blueprint $table) {
			$table->engine = "MyISAM";
			$table->increments('id');
			$table->morphs('table');
			$table->integer('payment_method_id')->unsigned();
			$table->foreign('payment_method_id')
				->references('id')
				->on('payment_methods')
				->onDelete('cascade');
			$table->integer('status_option_id')->unsigned()->default(1);
			$table->foreign('status_option_id')
				->references('id')
				->on('status_options')
				->onDelete('cascade');
			$table->string('payment_id');
			$table->float('sub_total');
			$table->float('tax');
			$table->float('total');
			$table->string('other');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('payment_records');
	}
}
