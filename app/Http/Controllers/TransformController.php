<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\RootDocument;
class TransformController extends Controller
{
    public function transform(Request $r){
        $doc = new RootDocument($r->file('book'));
        return $doc->getHtml();
    }
}
