<?php namespace Hybridlab\ListItem\Models;

use Model;
use Hybridlab\ShoppingList\Models\ShoppingList;
use October\Rain\Database\Traits\Sortable;

/**
 * ListItem Model
 */
class ListItem extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;


    public $table = 'hybridlab_listitem_list_items';
    protected $fillable = ['name', 'type', 'shopping_list_id', 'completed', 'quantity'];

    public $rules = [];
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    public $belongsTo = [
        'list' => ShoppingList::class
    ];
    public function getShoppingListIdOptions()
    {
        $values = [null => 'no list'];
        foreach(ShoppingList::all() as $list){
            $values[$list->id] = $list->list_name;
        }
        return $values;
    }


    public function getTypeOptions()
    {
        return [
            'pcs' => 'pieces',
            'kg' => 'kilogram',
            'l' => 'liters'
        ];
    }
}
