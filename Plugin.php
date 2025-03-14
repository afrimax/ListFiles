<?php namespace NiaInteractive\ListFiles;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'ListFiles',
            'description' => 'Displays a list of files and links to files in a given directory.',
            'author' => 'Nia Interactive with Hardik Satasiya',
            'icon' => 'icon-folder-open',
            'homepage' => 'https://niainteractive.com',
        ];
    }

    public function registerComponents()
    {
        return [
            'NiaInteractive\ListFiles\Components\ListFiles' => 'listFiles' // Fixed case issue
        ];
    }

    public function registerSettings()
    {
    }

    /**
     * Filters a file path and returns the base filename.
     *
     * @param string $value
     * @return string
     */
    public function basenameFilter($value)
    {
        return basename($value);
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'basename' => [$this, 'basenameFilter'],
            ],
        ];
    }
}
