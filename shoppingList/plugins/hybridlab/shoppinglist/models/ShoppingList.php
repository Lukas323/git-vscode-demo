<?php namespace Hybridlab\ShoppingList\Models;

use Model;
use Hybridlab\ListItem\Models\ListItem;
/**
 * ShoppingList Model
 */
class ShoppingList extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $increment = 1;
    /**
     * @var string The database table used by the model.
     */
    public $table = 'hybridlab_shoppinglist_shopping_lists';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];
    protected $fillable = ['list_name', 'color'];
    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = ['items'];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    public $hasMany = [
        'items' => ListItem::class
    ];
    public function getColorOptions()
    {
        return [];
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
