<?php namespace Hybridlab\ShoppingList\Actions;

use Hybridlab\ShoppingList\Models\Item;

class POST_item_option {

    public function handle() {
        $name = ucfirst(post()['name']);
        if(Item::where('name', $name)->first() == null ){
            Item::create(['name' => $name]);

        }
    }
}
