<?php
use \Sistema\Model\Usuario\Usuario;
use \Sistema\Page;  

$app->get('/', function() {
    $page = new Page();
    $page->setTpl("redirect");
    
});

$app->get('/login', function() {
    $page = new Page([
        "header"=>false,
        "footer"=>false
    ]);
    $page->setTpl('login');
    
});

$app->post('/login', function() {
   $res = Usuario::login($_POST['user'], $_POST['pass']);
    // header("Location: /painel");
    // exit;
    if($res == "false"){
        echo "unauthorized access";
    }else if($res == "failed"){
        echo "without permission";
    }
});

$app->get('/logout', function() {
    Usuario::logout();
    header("Location: /login");
    exit;
    
});

$app->get('/controller', function() {
   
    Usuario::verificaAcesso();

 });
 

// $app->get('/testes', function(){
//     Usuario::teste();
// });