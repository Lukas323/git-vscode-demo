<?php namespace Hybridlab\ShoppingList\Actions;

use Hybridlab\ShoppingList\Models\Item;

class DELETE_list_option {

    public function handle($id) {
        Item::where('id', $id)->firstOrFail()->delete();
    }
}
