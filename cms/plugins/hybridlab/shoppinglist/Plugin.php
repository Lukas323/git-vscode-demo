<?php namespace Hybridlab\ShoppingList;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name' => 'ShoppingList',
            'description' => 'No description provided yet...',
            'author' => 'Hybridlab',
            'icon' => 'icon-leaf'
        ];
    }

    public function registerNavigation()
    {

        return [
            'shoppinglist' => [
                'label' => 'Lists',
                'url' => Backend::url('hybridlab/shoppinglist/shoppinglists'),
                'icon' => 'icon-files-o',
                'permissions' => ['hybridlab.shoppinglist.*'],
                'order' => 500,
                'sideMenu' => [
                    'listItems' => [
                        'label' => 'List items',
                        'url' => Backend::url('hybridlab/shoppinglist/listitems'),
                        'icon' => 'icon-list-alt',
                        'permissions' => ['hybridlab.shoppinglist.*'],
                        'order' => 500,
                    ],
//                    'allItems' => [
//                        'label' => 'All items',
//                        'url' => Backend::url('hybridlab/shoppinglist/items'),
//                        'icon' => 'icon-list-alt',
//                        'permissions' => ['hybridlab.shoppinglist.*'],
//                        'order' => 500,
//                    ]
                ],
            ]
        ];
    }
}
