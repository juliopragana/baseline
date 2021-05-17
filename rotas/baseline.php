<?php

use \Sistema\Page;
use \Sistema\Pages\PageBaseline;  


use \Sistema\Model\Baseline\Funcionario;
use \Sistema\Model\Baseline\CentroCusto;
use \Sistema\Model\Usuario\Usuario;

$app->get('/baseline', function() {
    Usuario::verificaLogin();

    $user = $_SESSION[Usuario::SESSION]['user'];
    $puser = $_SESSION[Usuario::SESSION]['puser'];
    if($puser == 0){
        header('location: /dashboard');
        exit;
    }
    $page = new PageBaseline();
    
    $cc = CentroCusto::listaGrupoCentroCusto();
    $qtd = CentroCusto::qtdtotalCentroCusto();

    // var_dump($cc);
    $page->setTpl("menu", array(
        "qtd"=>$qtd,
        "cc"=>$cc,
        "user"=>$user
    ));

    $page->setTpl("painel",array(
        "puser"=>$puser
    ));
});


$app->post('/consulta', function() {
    Usuario::verificaLogin();
    
    $resultado = Funcionario::listaFunc();
    echo $resultado;
    // sreturn $resultado;
    
});

$app->post('/consulta/:query', function($query){
    Usuario::verificaLogin();
    $resultado = Funcionario::listaPorArea($query);
    echo $resultado;

});

$app->post('/consulta/cc/:query', function($query){
    Usuario::verificaLogin();
    $resultado = Funcionario::listaPorCentroCusto($query);
    echo $resultado;

});

// $app->post('/consulta_nome', function(){
//     Usuario::verificaLogin();
//     $nome = $_POST['nome'];

//     $resultado = Funcionario::listaPorNome($nome);
//     // var_dump($nome);
//     // var_dump($resultado);
    
    
//     echo $resultado;

// });

$app->post('/consultar/info/:id', function($id){
    Usuario::verificaLogin();
    $resultado = Funcionario::listaFuncPorID($id);
    echo $resultado;
});

$app->post('/consulta/subcc/:gcc', function($query){
    Usuario::verificaLogin();
    $resultado = CentroCusto::listaSubCentroCusto($query);
    
    echo $resultado;
    

});

$app->post('/carrega_lista_cc', function(){
    Usuario::verificaLogin();
    $resultado = CentroCusto::listaCC();
    echo $resultado;
});



// $app->get('/teste/carregar', function(){
//     Usuario::verificaLogin();

//     // $user = $_SESSION[Usuario::SESSION]['user'];
//     // // $resultado = CentroCusto::listaSubCentroCusto($query);
    
//     // // var_dump($resultado);
//     // // // foreach ($resultado as $value) {
//     // // //     # code...
//     // // //     echo $value;
//     // // // }
//     // $page = new Page();
//     // $page->setTpl("menu", array(
//     //     "user"=>$user
//     // ));
//     // $page->setTpl("carrega_dados");

//     // phpinfo();
//     // $class  = class_exists('sPDO');
//     // var_dump($class);
// // }); 

// $app->post('/carrega_tabela', function(){
//     Usuario::verificaLogin();
//     libxml_disable_entity_loader(false);
//     // $planilha = $_FILES['file'][''];
//     // var_dump($planilha);
//     if(!empty($_FILES['file']['tmp_name'])){
//         $arquivo = new DOMDocument();
//         $arquivo->load('arquivo.xml');
//         var_dump($arquivo);
//     }
    
    
// });


// $app->post('/test-request', function(){

//     $dado = json_decode($_POST);

//     print_r($dado);

// });


?>