<?php

namespace App\Classes\Books;

use App\Classes\RootDocument;
use PhpOffice;
class wordBookFormatter extends RootDocument {
    public function getHtml(){
        $this->transform();
        return $this->output;
    }
    protected function transform(){
        $word = \PhpOffice\PhpWord\IOFactory::load($this->path);
        $html = new \PhpOffice\PhpWord\Writer\HTML($word);
        $html->save('storage\public\output.html');
        $this->output = file_get_contents('storage\public\output.html');
    }
}