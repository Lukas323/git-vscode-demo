<?php namespace Hybridlab\ListItem\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * List Items Back-end Controller
 */
class ListItems extends Controller
{
    /**
     * @var array Behaviors that are implemented by this controller.
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    /**
     * @var string Configuration file for the `FormController` behavior.
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string Configuration file for the `ListController` behavior.
     */
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Hybridlab.ListItem', 'listitem', 'listitems');

    }
}
