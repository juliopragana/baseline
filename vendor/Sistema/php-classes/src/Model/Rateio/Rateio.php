<?php

namespace Sistema\Model\Rateio;
use \Sistema\DB\Sql;
use \Sistema\Model; 

class Rateio extends Model{

 public static function ListarRateio(){
    $sql = new Sql();
    $res = $sql->select('select Usuario, nome, Departamento, CENTRO_CUSTO, SUM(PaginasColoridas) AS TotalPaginasColoridas, SUM(PaginasCinza) AS TotalPaginasCinzas from rateio GROUP BY Usuario;');
    return $res;

 } 

 public static function TotalPageColor(){
   $sql = new Sql();
   $totalColor = $sql->select("select SUM(PaginasColoridas) as PageColor from rateio;");
   return $totalColor;
 }

 public static function TotalPagePB(){
   $sql = new Sql();
   $totalPB = $sql->select("select SUM(PaginasCinza) as PagePB from rateio;");
   return $totalPB;
 }

 public static function TotalUsuarios(){
   $sql = new Sql();
   $totalUser = $sql->select("select count(usuario) as totalUsuarios from rateio;");
   return $totalUser;
 }


}