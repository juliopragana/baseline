<?php

namespace Sistema\Model\FaciliesTerceiros;
use \Sistema\DB\Sql;
use \Sistema\Model;
use Sistema\Model\Baseline\Funcionario;

class Terceiros extends Model{


public static function listarTerceiros(){
    $sql = new Sql();
    $result = $sql->select('select * from tb_baseline_');
    return $result;


}


}