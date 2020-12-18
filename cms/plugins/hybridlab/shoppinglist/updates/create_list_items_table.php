<?php namespace Hybridlab\ShoppingList\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateListItemsTable extends Migration
{
    public function up()
    {
        Schema::create('hybridlab_shoppinglist_list_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('quantity');
            $table->string('type');
            $table->boolean('completed');
            $table->integer('sort_order')->default(0);
            $table->integer('shopping_list_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hybridlab_shoppinglist_list_items');
    }
}
