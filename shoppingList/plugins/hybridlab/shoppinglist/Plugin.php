<?php namespace Hybridlab\ShoppingList;

use Backend;
use System\Classes\PluginBase;

/**
 * ShoppingList Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'ShoppingList',
            'description' => 'No description provided yet...',
            'author'      => 'Hybridlab',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            'Hybridlab\ShoppingList\Components\DisplayLists' => 'displayLists',
            'Hybridlab\ShoppingList\Components\DisplayList' => 'displayList',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'hybridlab.shoppinglist.some_permission' => [
                'tab' => 'ShoppingList',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {

        return [
            'shoppinglist' => [
                'label'       => 'ShoppingList',
                'url'         => Backend::url('hybridlab/shoppinglist/shoppinglists'),
                'icon'        => 'icon-leaf',
                'permissions' => ['hybridlab.shoppinglist.*'],
                'order'       => 500,
            ],
        ];
    }
}
