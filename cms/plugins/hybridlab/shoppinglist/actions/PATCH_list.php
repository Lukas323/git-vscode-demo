<?php namespace Hybridlab\ShoppingList\Actions;

use Hybridlab\ShoppingList\Models\ShoppingList;

class PATCH_list
{

    public function handle($list_id)
    {
        $list = ShoppingList::where('id', $list_id)->firstOrFail();
        $list->update(post());
        return $list;
    }
}
