<?php namespace Hybridlab\ShoppingList\Models;

use Model;
use Hybridlab\ShoppingList\Models\ListItem;

class ShoppingList extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'hybridlab_shoppinglist_shopping_lists';
    protected $fillable = ['list_name', 'color'];
    public $rules = [];
    protected $jsonable = ['items'];
    protected $dates = [
        'created_at',
        'updated_at'
    ];


    public $hasMany = [
        'items' => ListItem::class
    ];



    public function getColorOptions()
    {
        return [
            'blue' => 'modra',
            'brown' => 'hneda',
            'red' => 'cervena',
            'green' => 'zelena',
            'orange' => 'oranzova'
        ];
    }

    public function getTypeOptions()
    {
        return [
            'Ks' => 'kusy',
            'Kg' => 'kilogramy',
            'L' => 'litre',
            'g' => 'gramy'

        ];
    }

    public function beforeDelete(){
        foreach($this->items as $item) {
            $item->delete();
        }
    }
    public function beforeSave() {
        if($this->list_name == "") {
            $this->list_name = "Nákupný zoznam";
        }

    }
    public function beforeUpdate() {
        dump('true');
    }


}
