<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCookiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cookies', function (Blueprint $table) {
            $table->id();
            $table->string("value", 255);
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('userdata', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255)->nullable();
            $table->string("sname", 255)->nullable();
            $table->string("email", 255)->nullable();
            $table->string("date_at", 255)->nullable();
            $table->string("select", 255)->nullable();
            $table->foreignId('cookie_id');
            $table->foreign('cookie_id')
                    ->references('id')
                    ->on('cookies')
                    ->onDelete('cascade'); # категория
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
        Schema::dropIfExists('userdata');
        Schema::dropIfExists('cookies');
    }
}
