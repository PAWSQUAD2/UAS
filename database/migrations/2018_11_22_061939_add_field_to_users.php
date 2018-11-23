<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('role')->default('anggota baru');
            $table->string('npm');
            $table->dateTime('birthDay');
            $table->string('bornPlace');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('phone');
            $table->string('photoUrl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('role')->default('anggota baru');
            $table->string('npm');
            $table->dateTime('birthDay');
            $table->string('bornPlace');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('phone');
            $table->string('photoUrl');
        });
    }
}
