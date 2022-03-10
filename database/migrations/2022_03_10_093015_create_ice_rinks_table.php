<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIceRinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ice_rinks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->softDeletes();
            $table->timestamps();

            $table
                ->foreign('image_id')
                ->references('id')->on('images')
                ->onDelete('restrict');

            $table
                ->foreign('owner_id')
                ->references('id')->on('users')
                ->onDelete('restrict');

            $table
                ->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ice_rinks');
    }
}
