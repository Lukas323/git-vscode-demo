<?php namespace Hybridlab\ShoppingList\Actions;

use Hybridlab\ShoppingList\Models\ListItem;

class POST_item {

    public function handle() {
        return ListItem::create(post());
    }
}
