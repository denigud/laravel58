<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('category_id')->unsigned();

            $table->string('slug')->unique();
            $table->string('title');

            $table->text('description')->nullable();

            $table->boolean('is_active')->default(false);

            $table->bigInteger('price')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('shop_categories');

            $table->index('is_active');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_items');
    }
}
