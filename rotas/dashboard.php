<?php

use \Sistema\Page;
use \Sistema\Model\Usuario\Usuario;

$app->get('/dashboard', function() {
    Usuario::verificaLogin();
    $page = new Page();
    $page->setTpl("index");

});