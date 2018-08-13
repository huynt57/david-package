<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Root path where theme Views will be located.
    | Can be outside default views path e.g.: resources/themes
    | Leave it null if you will put your themes in the default views folder
    | (as defined in config\views.php)
    |--------------------------------------------------------------------------
    */

    'themes_path' => resource_path('themes'),

    /*
    |--------------------------------------------------------------------------
    | Set behavior if an asset is not found in a Theme hierarchy.
    | Available options: THROW_EXCEPTION | LOG_ERROR | IGNORE
    |--------------------------------------------------------------------------
    */

    'asset_not_found' => 'LOG_ERROR',

    /*
    |--------------------------------------------------------------------------
    | Do we want a theme activated by default? Can be set at runtime with:
    | Theme::set('theme-name');
    |--------------------------------------------------------------------------
    */

    'default' => 'admin-lte',

    /*
    |--------------------------------------------------------------------------
    | Cache theme.json configuration files that are located in each theme's folder
    | in order to avoid searching theme settings in the filesystem for each request
    |--------------------------------------------------------------------------
    */

    'cache' => true,

    /*
    |--------------------------------------------------------------------------
    | Define available themes.
    |--------------------------------------------------------------------------
    */

    'themes' => [

        'admin-lte' => [

            /*
            |--------------------------------------------------------------------------
            | Theme to extend. Defaults to null (=none)
            |--------------------------------------------------------------------------
            */
            'extends'       => null,

            /*
            |--------------------------------------------------------------------------
            | The path where the view are stored. Defaults to 'theme-name'
            | It is relative to 'themes_path' ('/resources/views' by default)
            |--------------------------------------------------------------------------
            */
            'views-path'    => null,

            /*
            |--------------------------------------------------------------------------
            | The path where the assets are stored. Defaults to 'theme-name'
            | It is relative to laravels public folder (/public)
            |--------------------------------------------------------------------------
            */
            'asset-path'    => null,

            /*
            |--------------------------------------------------------------------------
            | Custom configuration. You can add your own custom keys.
            | Use Theme::getSetting('key') & Theme::setSetting('key', 'value') to access them
            |--------------------------------------------------------------------------
            */
            'key'           => 'value',
        ],

    ],

];