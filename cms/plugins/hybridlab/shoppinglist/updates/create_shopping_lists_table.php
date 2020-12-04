<?php namespace Hybridlab\ShoppingList\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateShoppingListsTable extends Migration
{
    public function up()
    {
        Schema::create('hybridlab_shoppinglist_shopping_lists', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('list_name');
            $table->string('color')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hybridlab_shoppinglist_shopping_lists');
    }
}
