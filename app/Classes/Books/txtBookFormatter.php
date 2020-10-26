<?php

namespace App\Classes\Books;

use App\Classes\RootDocument;

class txtBookFormatter extends RootDocument {
    public function getHtml(){
        return $this->transform();
    }
    protected function transform(){
        return $this->input;
    }
}