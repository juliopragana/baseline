<?php

namespace Sistema\Model\Baseline;

use DateTime;
use \Sistema\DB\Sql;
use \Sistema\Model; 

class Desligados extends Model{

    public static function verificaNovosDesligados(){
        $sql = new Sql();
        $res = $sql->select("SELECT NOME, CPF, CARGO, CENTRO_CUSTO, DESCRICAO_CC, FILIAL, EMPRESA, DT_DEMISSAO, DATE_FORMAT(DT_DEMISSAO, '%d/%m/%Y') as DT_DEMISSAO_CONVERTIDA FROM db_baseline.tb_baseline_desligados WHERE dt_demissao IS NOT null AND DT_DEMISSAO >= CURDATE() AND DT_DEMISSAO <= ADDDATE(CURDATE(), INTERVAL 20 DAY) order by DT_DEMISSAO ASC;");
        return $res;
    }

    public static function verificaDesligadosUltimos20Dias(){
        $sql = new Sql();
        $res = $sql->select("SELECT NOME, CPF, CARGO, CENTRO_CUSTO, DESCRICAO_CC, FILIAL, EMPRESA, DT_DEMISSAO, DATE_FORMAT(DT_DEMISSAO, '%d/%m/%Y') as DT_DEMISSAO_CONVERTIDA FROM db_baseline.tb_baseline_desligados WHERE dt_demissao IS NOT null AND DT_DEMISSAO < CURDATE() AND DT_DEMISSAO >= SUBDATE(CURDATE(), INTERVAL 20 DAY) order by DT_DEMISSAO DESC;");
        return $res;
    }


    public static function ConsultarUsuarios($ldapDN, $name){

        $user = "userAD";
        $password = "passAD";
        // active airectory server
        $ldap_host = "host";
        
    
        // active directory DN (base location of ldap search)
      
       
        $ldap_dn = $ldapDN;
    
        
    
        // active directory manager group name
        $group_tic = "G_GRUPO";
        
    
        // domain, for purposes of constructing $user
        $ldap_usr_dom = '@domain';
        
    
        // connect to active directoryr
        $ldap = ldap_connect($ldap_host);
    
        // configure ldap params
        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
    
        // verify user and password
        if ($bind = @ldap_bind($ldap, $user . $ldap_usr_dom, $password)) {
    
            // valid
            $listUser = [];
           
            // check presence in groups
            $filter = "(&(objectClass=user)(objectCategory=person)(displayname=".$name."))";
            $mostrar = array("displayname", "useraccountcontrol", "userprincipalname");
            // $mostrar = array("*");
            $attr = array("memberof");
            $result = ldap_search($ldap, $ldap_dn, $filter, $mostrar) or exit("Unable to search LDAP server");
            $info = ldap_get_entries($ldap, $result);
            ldap_unbind($ldap);
    
            // $r = json_encode($info);
    
            // return $r;
            foreach ($info as $Key => $Value) {
                $Name     = $info[$Key]["displayname"][0];
                $State   = $info[$Key]["useraccountcontrol"][0];
                $Mail   = $info[$Key]["userprincipalname"][0];
                
               
                // $State   = dechex($State);
                // $State     = substr($State, -1, 1); //verifica contas desabilitadas  
    
                $Value = $Name . "^" .  $State . "^" . $Mail;
    
               
    
                if ($Name != "" && $State != 2)
                    $USERs[] = $Value;
            }
    
            // var_dump($USERs);
    
            if (count($USERs) > 0)
                sort($USERs);
    
            if (count($USERs) == 0) {
                array_push($listUser, "Not Found user") ;
            }
    
            
    
            // //    Verifica todos departamentos na OU como financeiro, RH, TI...  
            for ($i = 0; $i <= count($USERs) - 1; $i++) {
                $Value  = $USERs[$i];
                $Splitted = explode("^", $Value);
                // $date = new DateTime();
                
                // $expiracao = $date->setTimestamp($Splitted[3]);
    
                array_push($listUser, ["Nome" => $Splitted[0], "Status" => $Splitted[1],"Email" => $Splitted[2]]);    
            }
    
    
            
            return $listUser;
      
    
        } else {
            // invalid name or password
           return 'Erro de conexão ao servidor';
    
            // $response->getBody()->write('false');
            exit;
        }
    }

}