<?php namespace Hybridlab\ShoppingList\Actions;

use Hybridlab\ShoppingList\Models\ShoppingList;

class DELETE_list {

    public function handle($list_id) {
        $list = ShoppingList::where('id', $list_id)->first();
        foreach($list->items as $item) {
            $item->delete();
        }
        $list->delete();
    }
}
