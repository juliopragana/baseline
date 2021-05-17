<?php

use \Sistema\Page;
use \Sistema\DB\Sql;
use \Sistema\Model\Usuario\Usuario;
use \Sistema\Model\FaciliesTerceiros\Terceiros;

$app->get('/dashboard', function() {
    Usuario::verificaLogin();
    $page = new Page();
    $page->setTpl("index");

});


$app->get('/tester', function(){
    
    $sql = new Sql();
    $result = $sql->select('select * from tb_baseline_');
    print_r($result);

});