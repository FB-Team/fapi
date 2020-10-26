<?php

namespace App\Classes;
use App\Interfaces\RootDocumentInterface;

abstract class RootDocument implements RootDocumentInterface{
    protected $output = '';
    protected $input = '';
    protected $path = '';
    protected $filename = '';
   
    public function __construct($filename, $path){
        $this->filename = $filename;
        $this->path = $path;
    }
    
    abstract public function getHtml();
    abstract protected function transform();

    public static $supportedFormats = [
        'text/plain' => 'txt',
        'application/pdf' => 'pdf',
        'octet/stream' => 'fb2',
        'application/msword' => 'word'
    ];

    public static function getClassNameFromExtension($ext){
        $className = 'BookFormatter';
        if (array_key_exists($ext, self::$supportedFormats)){
            return self::$supportedFormats[$ext];
        }
        return null;
    }
}