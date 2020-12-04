<?php namespace Hybridlab\AllItems;

use Backend;
use System\Classes\PluginBase;

/**
 * AllItems Plugin Information File
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
            'name'        => 'AllItems',
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
        return []; // Remove this line to activate

        return [
            'Hybridlab\AllItems\Components\MyComponent' => 'myComponent',
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
            'hybridlab.allitems.some_permission' => [
                'tab' => 'AllItems',
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
            'allitems' => [
                'label'       => 'AllItems',
                'url'         => Backend::url('hybridlab/allitems/items'),
                'icon'        => 'icon-leaf',
                'permissions' => ['hybridlab.allitems.*'],
                'order'       => 500,
            ],
        ];
    }
}
