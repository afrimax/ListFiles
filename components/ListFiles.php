<?php
namespace NiaInteractive\ListFiles\Components;

use Cms\Classes\ComponentBase;
use Media\Classes\MediaLibrary; // Import MediaLibrary

class ListFiles extends ComponentBase
{
    public $sections = [];

    public function componentDetails()
    {
        return [
            'name' => 'List Files',
            'description' => 'Displays list of files for given directories with titles.'
        ];
    }

    public function defineProperties()
    {
        return [
            'sections' => [
                'title'             => 'Sections',
                'description'       => 'List of sections with titles and directory paths',
                'type'              => 'array',
                'default'           => [
                    ['title' => 'Gallery', 'directoryPath' => 'gallery']
                ],
                'required'          => true,
                'validationMessage' => 'Please add at least one section with a valid title and path.'
            ]
        ];
    }

    public function onRender()
    {
        $sections = $this->property('sections');
        $mediaLib = MediaLibrary::instance();

        foreach ($sections as $section) {
            $folder = $section['directoryPath'];
            $title = $section['title'];

            if ($mediaLib->folderExists($folder)) {
                $this->sections[] = [
                    'title' => $title,
                    'files' => $mediaLib->listFolderContents($folder)
                ];
            } else {
                $this->sections[] = [
                    'title' => $title,
                    'files' => []
                ];
            }
        }
    }
}