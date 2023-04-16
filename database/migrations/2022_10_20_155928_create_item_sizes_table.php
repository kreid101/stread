<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_sizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('items_id');
            $table->unsignedBigInteger('sizes_id');
            $table->integer('quntity')->nullable();
            $table->foreign('items_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('sizes_id')->references('id')->on('sizes')->onDelete('cascade');
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
        Schema::dropIfExists('item_sizes');
    }
};
