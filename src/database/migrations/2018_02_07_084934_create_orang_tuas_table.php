<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Carbon\Carbon;

class CreateOrangTuasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('orangtuas', function (Blueprint $table) {
			 $table->increments('id');
			 $table->integer('siswa_id');
			 $table->text('alamat_ortu');
			 $table->string('nama_ayah');
			 $table->string('nama_ibu');
			 $table->string('kerja_ayah');
			 $table->string('pendidikan_ayah');
			 $table->string('kerja_ibu');
			 $table->string('pendidikan_ibu');
			 $table->string('no_telp');
			 $table->integer('user_id');
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
		Schema::drop('orangtuas');
	}
}
