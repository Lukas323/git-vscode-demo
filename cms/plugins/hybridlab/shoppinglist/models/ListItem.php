<?php namespace Hybridlab\ShoppingList\Models;

use Model;
use Hybridlab\ShoppingList\Models\ShoppingList;


class ListItem extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;


    public $table = 'hybridlab_shoppinglist_list_items';
    protected $fillable = ['name', 'type', 'shopping_list_id', 'completed', 'quantity'];

    public $rules = [
        'quantity' => 'numeric'
    ];
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    public $belongsTo = [
        'list' => ShoppingList::class
    ];
    public function getShoppingListIdOptions()
    {
        return ShoppingList::pluck('list_name', 'id');
    }


    public function getTypeOptions()
    {
        return [
            'ks' => 'kusy',
            'kg' => 'kilogramy',
            'L' => 'litre',
            'g' => 'gramy'
        ];
    }


}
