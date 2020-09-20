<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->char('name', 100);
            $table->char('dni', 20);
            $table->char('email', 50);
            $table->char('cellphone', 20);
            $table->integer('num_card_purchase');
            $table->char('payment_institution', 30);
            $table->char('voucher', 100)->nullable();
            $table->boolean('validated');
            $table->dateTime('validated_timestamp', 0)->nullable();
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
        Schema::dropIfExists('clients');
    }
}
