<?php

use \Sistema\Pages\PageDesligados;
use \Sistema\Model\Baseline\Desligados;
use Sistema\Model\Baseline\Funcionario;



$app->get('/proximos-desligados', function () {


    $novosDeslig = Desligados::verificaNovosDesligados();
    // $ultimosDeslig = Desligados::verificaDesligadosUltimos20Dias();

    // var_dump($novosDeslig);

    $page = new PageDesligados();
    $page->setTpl("menu");
    $page->setTpl("proximos-desligados", array(
        "novosDeslig" => $novosDeslig
    ));
});

$app->get('/ja-desligados', function () {


    // $novosDeslig = Desligados::verificaNovosDesligados();
    $ultimosDeslig = Desligados::verificaDesligadosUltimos20Dias();

    // var_dump($ultimosDeslig);
    $situaCAO = [];

    // var_dump($ultimosDeslig);
    // // $nome = '';

    foreach($ultimosDeslig as $value){

             
        $userAD = Desligados::ConsultarUsuarios('DC=mvrec,DC=local', $value['NOME']);
      
       
        foreach($userAD as $ValueAD){
            // var_dump($ValueAD['Status']);
            // echo 'Nome do Benner: '.$value["NOME"]. ' | Nome do AD' .$valueAD["Nome"] .'<br>';
            if($ValueAD === 'Not Found user'){


                
            // echo 'Não encontrou';
            array_push($situaCAO,[
                "NOME" => $value['NOME'],
                "CPF" => $value['CPF'],
                "CENTRO_CUSTO" => $value['CENTRO_CUSTO'],
                "CARGO" => $value['CARGO'],
                "DESCRICAO_CC" => $value['DESCRICAO_CC'],
                "FILIAL" => $value['FILIAL'],
                "EMPRESA" => $value['EMPRESA'],
                "DT_DEMISSAO_CONVERTIDA" => $value['DT_DEMISSAO_CONVERTIDA'],               
                "Status" => "0"] );
            // $situaCAO = array_merge($ultimosDeslig , [["Situação" => "Usuário Não encontrado"]]);
                // $ultimosDeslig += $ultimosDeslig[]

            }else{
                // echo "Encontrou";
            array_push($situaCAO,[
                "NOME" => $value['NOME'],
                "CPF" => $value['CPF'],
                "CENTRO_CUSTO" => $value['CENTRO_CUSTO'],
                "CARGO" => $value['CARGO'],
                "DESCRICAO_CC" => $value['DESCRICAO_CC'],
                "FILIAL" => $value['FILIAL'],
                "EMPRESA" => $value['EMPRESA'],
                "DT_DEMISSAO_CONVERTIDA" => $value['DT_DEMISSAO_CONVERTIDA'],
                "Status" => $ValueAD['Status']]);
            // $completo = array_merge($ultimosDeslig , $situaCAO);
            }
        }
        
    


    }

    //   var_dump($situaCAO);

    // // echo $nome;
    // // $user = Desligados::ConsultarUsuarios('JULIO HENRIQUE BARROS PRAGANA');





    $page = new PageDesligados();
    $page->setTpl("menu");
    $page->setTpl("ja_desligados", array(

        "ultimosDeslig" => $situaCAO
    ));
});


$app->get('/listar-usuariosAD', function(){

    $res = Desligados::ConsultarUsuarios('OU=MV,DC=mvrec,DC=local', 'Even Marinho Pedrosa do Vale de Lima');

    print_r($res);
    // $page = new PageDesligados();

    // $page->setTpl("usuariosAD", array(

    //     "usr" => $res
    // ));


});


// $app->post('/validaAD', function () {

//     $user = Desligados::ConsultarUsuarios('*');
   
// });
