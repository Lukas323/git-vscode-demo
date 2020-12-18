<?php namespace Hybridlab\ShoppingList\Actions;

use Hybridlab\ShoppingList\Models\ListItem;

class PATCH_item {

    public function handle($item_id) {
        ListItem::where('id', $item_id)->first()->update(post());
        return ListItem::where('id', $item_id)->first();
    }
}
