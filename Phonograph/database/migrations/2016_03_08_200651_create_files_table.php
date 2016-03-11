<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('files', function(Blueprint $table){
						/* File ID */
						$table->increments('id');
						/* Artists ID */
						$table->integer('created_by');
						/* Genre ID */
						$table->integer('genre_id');
						/* File NAME */
						$table->string('name');
						/* File Price */
						$table->double('price', 15, 2);
						/* File SIZE
						$table->string('file_size',10);
						/* File MIME
						$table->string('file_mime',50);
						/* File PATH */
						$table->string('file_path');
						/* File cover PATH */
						$table->string('cover');
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
		Schema::drop('files');
	}

}
