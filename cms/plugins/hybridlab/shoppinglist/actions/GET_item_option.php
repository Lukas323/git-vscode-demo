<?php namespace Hybridlab\ShoppingList\Actions;

use Hybridlab\ShoppingList\Models\Item;

class GET_item_option {

    public function handle($name) {
        $matches = [];
        foreach(Item::all() as $index => $item) {
            if(strpos(strtolower($item->name), strtolower($name)) === 0){
                $matches[] = $item;
            }
            if (count($matches) == 3) {
                return $matches;
            }
        }
        return $matches;
    }
}
