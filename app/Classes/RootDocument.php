<?php

namespace App\Classes;
use App\Interfaces\RootDocumentInterface;
use App\Classes\Books\txtBookFormatter;
use App\Classes\Books\wordBookFormatter;
use Error;

class RootDocument implements RootDocumentInterface{
    protected $output = '';
    protected $input = '';
    protected $path = '';
    protected $filename = '';
    protected $file = null;
    private $trans = null;
   
    public function __construct($file){
        $this->file = $file->path();
        $this->path = '';
        $className = $this->getClassNameFromExtension($this->file->getClientOriginalExtension());
        $this->trans = new $className($file);
    }
    public function getHtml()
    {
        return $this->trans->getHtml();
    }
    public function transform()
    {
        
    }
    public static $supportedFormats = [
        'text/plain' => 'txt',
        'application/pdf' => 'pdf',
        'octet/stream' => 'fb2',
        'application/msword' => 'word'
    ];

    public static function getClassNameFromExtension($ext){
        $className = 'BookFormatter';
        if (array_key_exists($ext, self::$supportedFormats)){
            $className =  self::$supportedFormats[$ext] . $className;
            if (class_exists($className)){
                return $className;
            }else{
                throw new \Error("Cannot find the class name for the current extension!");
            }        
        }else{
            throw new \Error("Not supported extension!");
        }
        
    }
}