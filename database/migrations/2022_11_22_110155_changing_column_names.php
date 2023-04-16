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
        Schema::table('items', function (Blueprint $table) {
            $table->renameColumn('name', 'item_name');
        });
        Schema::table('brands', function (Blueprint $table) {
            $table->renameColumn('name', 'brand_name');
            $table->renameColumn('desc', 'brand_desc');
        });
        Schema::table('about_items', function (Blueprint $table) {
            $table->renameColumn('desc', 'about_desc');
        });
        Schema::table('category', function (Blueprint $table) {
            $table->renameColumn('name', 'cat_name');
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
};
