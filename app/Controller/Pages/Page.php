<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Page{
    
    /**
     * @return string
     */
    public static function getPage($title, $content){
        return View::render('pages/index', 
        [
            'title' => $title,
            'content' => $content
        ]);
    }

}   