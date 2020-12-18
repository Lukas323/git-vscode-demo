<?php namespace Hybridlab\ShoppingList\Models;

use Model;


class Item extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'hybridlab_shoppinglist_items';

    protected $guarded = ['*'];
    protected $fillable = ['name'];

    public $rules = [];
    protected $dates = [
        'created_at',
        'updated_at'
    ];

}
