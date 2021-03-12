<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_settings', function (Blueprint $table) {
        	$table->engine = "MyISAM";
            $table->increments('id');
	        $table->integer('mail_option_id')->unsigned();
	        $table->foreign('mail_option_id')
		        ->references('id')
		        ->on('mail_options')
		        ->onDelete('cascade');
	        $table->string('to');
	        $table->string('from');
	        $table->text('cc');
	        $table->string('from_sender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_settings');
    }
}
