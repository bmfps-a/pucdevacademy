<?php

require __DIR__.'/vendor/autoload.php';

// Teste temporário para verificar a inclusão manual
// require_once 'app/Controller/Pages/Home.php';

use App\Controller\Pages\Home;

echo Home::getHome();

?>