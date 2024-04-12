<?php

namespace App\Controller\Pages;

use App\Utils\View;

class Home extends Page{
    
    /**
     * @return string
     */
    public static function getHome(){
        $content = View::render('pages/index', 
        [
            'name' => 'Pedro Felix',
            'descripition' => 'Eu sou gay'
        ]);
        return parent::getPage('Teste', $content);
    }
}   