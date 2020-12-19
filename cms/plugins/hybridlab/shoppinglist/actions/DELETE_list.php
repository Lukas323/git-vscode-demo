<?php namespace Hybridlab\ShoppingList\Actions;

use Hybridlab\ShoppingList\Models\ShoppingList;

class DELETE_list {

    public function handle($list_id) {
        ShoppingList::where('id', $list_id)->firstOrFail()->delete();
    }
}
