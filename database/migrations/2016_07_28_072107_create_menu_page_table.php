<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_page', function (Blueprint $table) {
            $table->increments('pivot_id');
            $table->string('title');
            $table->boolean('status')->default(1);


            $table->integer('menu_id')->unsigned()->nullable();
            $table->foreign('menu_id')->references('id')
                ->on('menus')->onDelete('cascade');

            $table->integer('page_id')->unsigned()->nullable();
            $table->foreign('page_id')->references('id')
                ->on('pages')->onDelete('cascade');

            $table->integer('parent_id')->default('0');
            $table->integer('sort_order');
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
        Schema::drop('menu_page');
    }
}
