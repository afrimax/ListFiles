<?php
namespace NiaInteractive\ListFiles\Components;

class ListFiles extends \Cms\Classes\ComponentBase
{

    public $fileList = 'lol';


    public function componentDetails()
    {
        return [
            'name' => 'List Files',
            'description' => 'Displays list of files for given directory.'
        ];
    }


    public function defineProperties()
    {
        return [
            'directoryPath' => [
                 'title'             => 'Folder Path',
                 'description'       => 'This folder\'s files will be listed',
                 'default'           => '/',
                 'required'          => true,
                 'type'              => 'string',
                 'validationMessage' => 'Please add path its required.'
            ]
        ];
    }


    public function onRender()
    {

        $folder = $this->property('directoryPath');
        $mediaLib = \System\Classes\MediaLibrary::instance();

        // it will return us MediaLibraryItem instance
        $this->fileList = $mediaLib->listFolderContents($folder);

        // dd($this->fileList);
        // This code will be executed before the default component
        // markup is rendered on the page or layout.

        // $this->page['var'] = 'Maximum items allowed: ' . ;
    }


}
