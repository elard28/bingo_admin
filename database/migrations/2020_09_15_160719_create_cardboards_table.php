<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardboards', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('client_id');
            $table->char('item', 10)->nullable();
            $table->integer('num_cardboard')->nullable();
            $table->char('cardboard',100)->nullable();
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
        Schema::dropIfExists('cardboards');
    }
}
