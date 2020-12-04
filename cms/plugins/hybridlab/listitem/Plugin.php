<?php namespace Hybridlab\ListItem;

use Backend;
use System\Classes\PluginBase;

/**
 * ListItem Plugin Information File
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
            'name'        => 'ListItem',
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
            'Hybridlab\ListItem\Components\MyComponent' => 'myComponent',
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
            'hybridlab.listitem.some_permission' => [
                'tab' => 'ListItem',
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
            'listitem' => [
                'label'       => 'ListItem',
                'url'         => Backend::url('hybridlab/listitem/listitems'),
                'icon'        => 'icon-leaf',
                'permissions' => ['hybridlab.listitem.*'],
                'order'       => 500,
            ],
        ];
    }
}
