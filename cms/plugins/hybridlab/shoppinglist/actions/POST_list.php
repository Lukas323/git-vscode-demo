<?php namespace Hybridlab\ShoppingList\Actions;

use Hybridlab\ShoppingList\Models\ShoppingList;

class POST_list {

    public function handle() {
        return ShoppingList::create(post());
    }
}
