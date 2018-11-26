<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Token extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
            // do {
            //     $token_id = makeRandomToken();
            //     $token_key = makeRandomTokenKey();
            // } while (User::where("token_id", "=", $token_id)->where("token_key", "=", $token_key)->first() instanceof User);
        Schema::create('tokens', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        
    }
}
