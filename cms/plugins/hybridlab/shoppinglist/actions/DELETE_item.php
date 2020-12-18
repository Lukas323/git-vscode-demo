<?php namespace Hybridlab\ShoppingList\Actions;

use Hybridlab\ShoppingList\Models\ListItem;

class DELETE_item {

    public function handle($item_id) {
        ListItem::where('id', $item_id)->first()->delete();
    }
}
