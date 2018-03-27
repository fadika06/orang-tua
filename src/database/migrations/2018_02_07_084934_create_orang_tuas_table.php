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
			 $table->bigInteger('nomor_un')->unique();
			 $table->bigInteger('no_kk')->unique();
			 $table->text('alamat_ortu');
			 $table->string('nama_ayah');
			 $table->string('nama_ibu');
			 $table->text('kerja_ayah');
			 $table->text('pendidikan_ayah');
			 $table->text('kerja_ibu');
			 $table->text('pendidikan_ibu');
			 $table->bigInteger('no_telp')->unique();
			 $table->Integer('user_id')->unique();
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
