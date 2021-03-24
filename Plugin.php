<?php namespace NiaInteractive\ListFiles;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
	    public function pluginDetails()
    {
        return [
            'name' => 'ListFiles',
            'description' => 'Displays list of and link to files in a given directory.',
            'author' => 'Nia Interactive with Hardik Satasiya',
            'icon' => 'icon-folder-open',
            'homepage' => 'https://niainteractive.com',
        ];
    }
    
    public function registerComponents()
    {
        return [
            'NiaInteractive\ListFiles\Components\LIstFiles' => 'listFiles'
        ];
    }

    public function registerSettings()
    {
    }

    /**
     * @var string $value
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
                // A global function, i.e str_plural()
                'basename' => [$this, 'basenameFilter'],
            ],
        ];
    }
}
