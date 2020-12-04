<?php namespace Hybridlab\ShoppingList\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Shopping Lists Back-end Controller
 */
class ShoppingLists extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function onReorder() {
        $records = Request::input('rcd');
        $model = new Child;
        $model->setSortableOrder($records, range(1, count($records)));
    }

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Hybridlab.ShoppingList', 'shoppinglist', 'shoppinglists');
        $this->addJs("https://cdn.rawgit.com/RubaXa/Sortable/1.6.0/Sortable.min.js");
        $this->addJs('reorder.js');
    }
}

