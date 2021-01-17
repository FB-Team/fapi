<?php

namespace App\Classes\Books;

use App\Classes\RootDocument;
use App\Interfaces\RootDocumentInterface;

class txtBookFormatter extends RootDocument implements RootDocumentInterface{
    public function getHtml(){
        return $this->transform();
    }
    protected function transform(){
        return $this->input;
    }
}