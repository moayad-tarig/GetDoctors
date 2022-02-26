<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcceptedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accepteds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accept_id');
            $table->string('name');
            $table->string('phone_number');
            $table->string('specialtie');
            $table->string('area');
            $table->string('note')->nullable();
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('accepteds');
    }
}
