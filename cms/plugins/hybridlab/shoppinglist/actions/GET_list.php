<?php namespace Hybridlab\ShoppingList\Actions;

use Hybridlab\ShoppingList\Models\ShoppingList;

class GET_list {

    public function handle() {
        return ShoppingList::with(['items'])->get();
    }
}
