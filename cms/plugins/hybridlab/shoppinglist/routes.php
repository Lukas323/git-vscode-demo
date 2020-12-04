<?php

use Hybridlab\ShoppingList\Models\ShoppingList;
use Hybridlab\ListItem\Models\ListItem;

/*
 * Routes for ShoppingList
 */
// Get all lists
Route::get('api/lists', function() {
    return ShoppingList::with(['items'])->get();
});
// Create new list
Route::post('api/lists', function(){
    return ShoppingList::create(post());
});
// Update whole list
Route::patch('api/lists/{list_id}', function($list_id){
    ShoppingList::where('id', $list_id)->first()->update(post());
    return ShoppingList::with('items')->where('id', $list_id)->first();
});
// Delete whole list
Route::delete('api/lists/{list_id}', function($list_id){
    $list = ShoppingList::where('id', $list_id)->first();
    foreach($list->items as $item) {
        $item->delete();
    }
    $list->delete();
});



/*
 * Routes fo ListItem
 */

// Get all items from list
Route::get('api/lists/{list_id}/items', function($list_id) {
    return ShoppingList::where('id', $list_id)->first()->items;
});

// Create item
Route::post('api/lists/items', function(){
    return ListItem::create(post());
});

// Update item from list
Route::patch('api/lists/items/{item_id}', function($item_id){
    ListItem::where('id', $item_id)->first()->update(post());
    return ListItem::where('id', $item_id)->first();
});

// Delete item from list
Route::delete('api/lists/items/{item_id}', function($item_id){
    ListItem::where('id', $item_id)->first()->delete();
});

// Delete all items from list
Route::delete('api/lists/{list_id}/items', function($list_id){
    foreach(ShoppingList::where('id', $list_id)->first()->items as $item){
        $item->delete();
    }
});




