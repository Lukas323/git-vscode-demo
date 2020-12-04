<?php

use Hybridlab\AllItems\Models\Item;

/*
 * Routes for AllItems
 */

Route::get('api/all-items/{name}', function($name){

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
});

Route::post('api/all-items', function(){
    $name = ucfirst(post()['name']);
    if(Item::where('name', $name)->first() == null ){
        Item::create(['name' => $name]);

    }

});

Route::delete('api/all-items/{id}', function($id) {
    Item::where('id', $id)->first()->delete();
});
