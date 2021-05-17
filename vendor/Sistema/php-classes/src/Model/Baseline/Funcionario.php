<?php

namespace Sistema\Model\Baseline;
use \Sistema\Model\Usuario\Usuario;
use \Sistema\DB\Sql;
use \Sistema\Model; 

class Funcionario extends Model{

    public static function listaFunc(){
        $sql = new Sql();

        if($_SESSION[Usuario::SESSION]['puser'] == 1){
            $func = $sql->select("SELECT b.ID, b.NOME, left(b.CPF,7) as CPF, b.EMAIL, b.CARGO, b.area, b.FILIAL, b.DT_DEMISSAO from tb_baseline_ b WHERE b.area IS NOT NULL AND b.DT_DEMISSAO IS NULL");

            $res = json_encode($func);
            return $res;
        } else if($_SESSION[Usuario::SESSION]['puser'] == 2){
            $func = $sql->select("SELECT 
                                    b.ID,
                                    b.FILIAL,
                                    b.NOME,
                                    b.DT_ADMISSAO,
                                    b.DT_DEMISSAO,
                                    b.CPF, 
                                    b.EMAIL,
                                    b.CARGO,
                                    b.CENTRO_CUSTO,
                                    b.Descricao_Centro_Custos,
                                    b.SEXO,
                                    b.EMPRESA,
                                    b.area,
                                    b.DivisaoGCH,
                                    b.DT_NASC,
                                    b.SINDICATO
                                    from tb_baseline_ b WHERE b.area IS NOT NULL AND b.DT_DEMISSAO IS NULL");

            $res = json_encode($func);
            return $res;
        }

       

    }

    public static function listaPorArea($query){
        $sql = new Sql();

        if($_SESSION[Usuario::SESSION]['puser'] == 1){

        $func = $sql->select("SELECT b.ID, b.NOME, left(b.CPF,7) as CPF, b.EMAIL, b.CARGO, b.area, b.FILIAL, b.DivisaoGCH, b.DT_DEMISSAO
                                from tb_baseline_ b WHERE b.DivisaoGCH = :query AND b.DT_DEMISSAO IS NULL", array(
                                    ":query"=>$query
                                ));

        $res = json_encode($func);
        return $res;
    } else if($_SESSION[Usuario::SESSION]['puser'] == 2){

        $func = $sql->select("SELECT 
                                    b.ID,
                                    b.FILIAL,
                                    b.NOME,
                                    b.DT_ADMISSAO,
                                    b.DT_DEMISSAO,
                                    b.CPF, 
                                    b.EMAIL,
                                    b.CARGO,
                                    b.CENTRO_CUSTO,
                                    b.Descricao_Centro_Custos,
                                    b.SEXO,
                                    b.EMPRESA,
                                    b.area,
                                    b.DivisaoGCH,
                                    b.DT_NASC,
                                    b.SINDICATO 
                                from tb_baseline_ b WHERE b.DivisaoGCH = :query AND b.DT_DEMISSAO IS NULL", array(
                                    ":query"=>$query
                                ));

        $res = json_encode($func);
        return $res;


    }

    }

    public static function listaPorCentroCusto($query){
        $sql = new Sql();

        if($_SESSION[Usuario::SESSION]['puser'] == 1){

        $func = $sql->select("SELECT b.ID, b.NOME, left(b.CPF,7) as CPF, b.EMAIL, b.CARGO, b.area, b.FILIAL, b.DivisaoGCH, b.DT_DEMISSAO 
                                from tb_baseline_ b WHERE b.CENTRO_CUSTO = :query AND b.DT_DEMISSAO IS NULL", array(
                                    ":query"=>$query
                                ));

        $res = json_encode($func);
        return $res;
    } else if($_SESSION[Usuario::SESSION]['puser'] == 2){

        $func = $sql->select("SELECT 
                                    b.ID,
                                    b.FILIAL,
                                    b.NOME,
                                    b.DT_ADMISSAO,
                                    b.DT_DEMISSAO,
                                    b.CPF, 
                                    b.EMAIL,
                                    b.CARGO,
                                    b.CENTRO_CUSTO,
                                    b.Descricao_Centro_Custos,
                                    b.SEXO,
                                    b.EMPRESA,
                                    b.area,
                                    b.DivisaoGCH,
                                    b.DT_NASC,
                                    b.SINDICATO 
        from tb_baseline_ b WHERE b.CENTRO_CUSTO = :query AND b.DT_DEMISSAO IS NULL", array(
            ":query"=>$query
        ));

        $res = json_encode($func);
        return $res;


    }


    }

    // public static function listaPorNome($param){
    //     $sql = new Sql();
    //     $nome = $param;

    //     if($_SESSION[Usuario::SESSION]['puser'] == 1){

    //     $func = $sql->select('SELECT 
    //                             b.NC_ID,
    //                             b.COLABORADOR, 
    //                             left(b.CPF,7) as CPF, 
    //                             b.EMAIL,
    //                             b.CARGO, 
    //                             b.FILIAL 
    //                             from tb_baseline b WHERE b.COLABORADOR LIKE "%:nome%"', array(
    //                                 ":nome"=>$nome
    //                             ));

    //     $res = json_encode($func);
    //     return $res;

    // } else if($_SESSION[Usuario::SESSION]['puser'] == 2){
    //     $func = $sql->select('SELECT 
    //                             b.NC_ID,
    //                             b.COLABORADOR, 
    //                             b.CPF, 
    //                             b.EMAIL,
    //                             b.CARGO, 
    //                             b.FILIAL 
    //                             from tb_baseline b WHERE b.COLABORADOR LIKE "%:nome%"', array(
    //                                 ":nome"=>$nome
    //                             ));

    //     $res = json_encode($func);
    //     return $res;

    // }

    // }

    public static function listaFuncPorID($id){
        $sql = new Sql();

        if($_SESSION[Usuario::SESSION]['puser'] == 1){
            $func = $sql->select('SELECT 
                                    b.ID,
                                    b.FILIAL,
                                    b.NOME,
                                    b.DT_ADMISSAO,
                                    b.DT_DEMISSAO,
                                    left(b.CPF,7) as CPF, 
                                    b.EMAIL,
                                    b.CARGO,
                                    b.CENTRO_CUSTO,
                                    b.Descricao_Centro_Custos,
                                    b.SEXO,
                                    b.EMPRESA,
                                    b.area,
                                    b.DivisaoGCH,
                                    b.DT_NASC,
                                    b.SINDICATO
                                    FROM
                                    tb_baseline_ b WHERE b.ID = :id', array(
                                    "id"=> $id
            ));
            $res = json_encode($func);
            print_r($res);

        } else if($_SESSION[Usuario::SESSION]['puser'] == 2){
            $func = $sql->select('SELECT 
                                    b.ID,
                                    b.FILIAL,
                                    b.NOME,
                                    b.DT_ADMISSAO,
                                    b.DT_DEMISSAO,
                                    b.CPF, 
                                    b.EMAIL,
                                    b.CARGO,
                                    b.CENTRO_CUSTO,
                                    b.Descricao_Centro_Custos,
                                    b.SEXO,
                                    b.EMPRESA,
                                    b.area,
                                    b.DivisaoGCH,
                                    b.DT_NASC,
                                    b.SINDICATO
                                    FROM
                                    tb_baseline_ b WHERE b.ID = :id', array(
                                    "id"=> $id
            ));
            $res = json_encode($func);
            print_r($res);
            
        }
    }

}