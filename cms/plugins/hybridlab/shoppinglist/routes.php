<?php

Route::group([
    'prefix' => 'api',
    'namespace' => 'Hybridlab\ShoppingList\Actions'], function() {

    Route::get('lists', 'GET_list@handle');
    Route::post('lists', 'POST_list@handle');
    Route::patch('lists/{list_id}', 'PATCH_list@handle');
    Route::delete('lists/{list_id}', 'DELETE_list@handle');

    Route::get('all-items/{name}', 'GET_item_option@handle');
    Route::post('all-items', 'POST_item_option@handle');
    Route::delete('all-items/{id}', 'DELETE_item_option@handle');

    Route::group(['prefix' => 'lists'], function(){
        Route::post('items', 'POST_item@handle');
        Route::patch('items/{item_id}', 'PATCH_item@handle');
        Route::delete('items/{item_id}', 'DELETE_item@handle');
        Route::delete('items/{item_id}/items', 'DELETE_list_items@handle');
    });

});
