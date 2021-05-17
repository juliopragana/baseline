<?php

namespace Sistema\Model\Baseline;
use \Sistema\DB\Sql;
use \Sistema\Model; 

class CentroCusto extends Model{

    public static function qtdtotalCentroCusto(){
        $sql = new Sql();

        $qtdt = $sql->select("SELECT DISTINCT DivisaoGCH, DT_DEMISSAO, COUNT(DivisaoGCH) AS QTD FROM tb_baseline_ WHERE DT_DEMISSAO IS NULL ORDER BY DivisaoGCH ASC");
    
        return $qtdt;
    }

    public static function listaGrupoCentroCusto(){
        $sql = new Sql();

        $cc = $sql->select("SELECT DISTINCT DivisaoGCH , DT_DEMISSAO, upper(DivisaoGCH) AS DivisaoGCHUPPER, count(DivisaoGCH) AS QTD FROM tb_baseline_ WHERE DivisaoGCH IS NOT NULL AND DT_DEMISSAO IS NULL GROUP BY DivisaoGCH ORDER BY DivisaoGCH ASC");
    
        return $cc;
    }

    

    public static function listaSubCentroCusto($gch){
        $sql = new Sql();
        
        $ncc = $sql->select("SELECT DISTINCT Descricao_Centro_Custos, CENTRO_CUSTO FROM tb_baseline_ WHERE divisaoGCH = :gch GROUP BY CENTRO_CUSTO ORDER BY Descricao_Centro_Custos ASC;;", array(
            ":gch"=>$gch
        ));
        // $ncc = $sql->select("SELECT DISTINCT NOME_CC FROM tb_baseline WHERE GRUPO_CENTRO_CUSTOS = 'DCAF' GROUP BY CENTRO_CUSTO ORDER BY NOME_CC ASC;");   
        
        $resul = json_encode($ncc);
        print_r($resul);
       
        
    }

    public static function listaCC(){
        $sql = new Sql();
        $cc = $sql->select('select DISTINCT b.Descricao_Centro_Custos, b.CENTRO_CUSTO, b.DivisaoGCH from tb_baseline_ b WHERE Descricao_Centro_Custos IS NOT NULL ORDER BY b.Descricao_Centro_Custos ASC;');

        $res = json_encode($cc);
        return $res;

    }

   

}

?>