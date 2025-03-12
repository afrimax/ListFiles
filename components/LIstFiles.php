<?php
namespace NiaInteractive\ListFiles\Components;

use Cms\Classes\ComponentBase;
use Media\Classes\MediaLibrary; // Import MediaLibrary

class ListFiles extends ComponentBase
{
    public $fileList = [];

    public function componentDetails()
    {
        return [
            'name' => 'List Files',
            'description' => 'Displays list of files for a given directory.'
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
                'validationMessage' => 'Please add a valid path, it is required.'
            ]
        ];
    }

    public function onRender()
    {
        $folder = $this->property('directoryPath');
        $mediaLib = MediaLibrary::instance(); // Corrected class name

        // Ensure the directory exists before fetching files
        if ($mediaLib->folderExists($folder)) {
            $this->fileList = $mediaLib->listFolderContents($folder);
        } else {
            $this->fileList = [];
        }
    }
}
