<?php
use \Sistema\Model\Usuario\Usuario;
use \Sistema\Pages\PageRateio; 
use \Sistema\Model\Rateio\Rateio;



$app->get('/rateio', function() {
    //Usuario::verificaLogin();
    $page = new PageRateio();
    
    $custoColor = 0;
    $custoPB = 0;

    $resultado = Rateio::ListarRateio();
    $totalColor =  Rateio::TotalPageColor();
    $totalPB =  Rateio::TotalPagePB();
    $totalUs = Rateio::TotalUsuarios();

    foreach ($totalColor as $value) {
        $custoColor = $value['PageColor'];
    }

    foreach ($totalPB as $value) {
        $custoPB = $value['PagePB'];
    }

    foreach ($totalUs as $value){
        $totalUs = $value['totalUsuarios'];
    }

    $valorNota = 5030.65;
    

    


    $custoColor = $custoColor * 00.59;
    $custoPB = $custoPB * 00.06;
    $custo = $custoColor + $custoPB;

    $valorPaper = $valorNota - $custoColor - $custoPB;
    $valorR = $valorPaper / $totalUs;
    $valorRateio = round($valorR, 2);


    $custoTotal = $valorNota;
    // var_dump($totalColor);
    // // print_r($resultado);

    $page->setTpl("painel", array(
        "resultado"=>$resultado,
        "totalColor"=>$totalColor,
        "custoColor"=>$custoColor,
        "custoPB"=>$custoPB,
        "custoTotal"=>$custoTotal,
        "valorRateio"=>$valorRateio,
        "valorR"=>$valorR
    ));
    
});