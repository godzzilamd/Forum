<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanctionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanction_user', function (Blueprint $table) {
            $table->unsignedBigInteger('sanction_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('sanction_id')->references('id')->on('sanctions');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanction_user');
    }
}
