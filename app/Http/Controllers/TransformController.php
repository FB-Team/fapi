<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\RootDocument;
class TransformController extends Controller
{
    public function  __construct()
    {
        
    }
    public function transform(Request $r){
        //return $r->file('book');
        $validated = $r->validate(['book' => 'required|file']);
        $doc = new RootDocument($r->file('book'));
        return $doc->getHtml();
    }
}
