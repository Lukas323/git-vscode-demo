<?php namespace Hybridlab\ShoppingList\Actions;

use Hybridlab\ShoppingList\Models\ShoppingList;

class DELETE_list_item {

    public function handle($list_id) {
        foreach(ShoppingList::where('id', $list_id)->firstOrFail()->items as $item){
            $item->delete();
        }
    }
}
