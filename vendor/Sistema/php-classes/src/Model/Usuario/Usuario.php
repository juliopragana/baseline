<?php

namespace Sistema\Model\Usuario;

use \Sistema\DB\Sql;
use \Sistema\Model;
// use \Sistema\Model\User;


class Usuario extends Model
{
    const SESSION = "User";
    const ERROR = "UserError";


    public static function login($user, $password)
    {
        $access = 0;

        if (empty($user) || empty($password)) return false;

        // active airectory server
        $ldap_host = "host";
        

        // active directory DN (base location of ldap search)
        $ldap_dn = "DC=";

        // $ldap_dn = "DC=hospidata,DC=com,DC=br";

        // active directory manager group name
        $group_tic = "G_GROUP";
        // $group_manager_gestor = "G_PORTAL_GESTOR";
        // $group_manager_gestor_gg = "G_PORTAL_GESTOR_GG";
        // $group_manager_tic = "G_PORTAL_ADMIN";

        // domain, for purposes of constructing $user
        $ldap_usr_dom = '@mvrec';
        // $ldap_usr_dom = '@hospidata';

        // connect to active directoryr
        $ldap = ldap_connect($ldap_host);

        // configure ldap params
        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

        // verify user and password
        if ($bind = @ldap_bind($ldap, $user . $ldap_usr_dom, $password)) {

            // valid
            // check presence in groups
            $filter = "(sAMAccountName=" . $user . ")";
            $attr = array("memberof");
            $result = ldap_search($ldap, $ldap_dn, $filter, $attr) or exit("Unable to search LDAP server");
            $entries = ldap_get_entries($ldap, $result);
            ldap_unbind($ldap);



            $sql = new Sql();
            
            $usuario = $sql->select("select * from user_control where usuario = :user", array(
                ":user" => $user
            ));
            foreach ($usuario as $value) {

                if ($user == $value['usuario']) {

                    $_SESSION[Usuario::SESSION]['user'] = $user;
                    $_SESSION[Usuario::SESSION]['puser'] = $value['nivel'];
                    $_SESSION[Usuario::SESSION]['permission'] = 2;
                    return $user;
                    // header('location:/painel');

                } 
            }
            if($usuario == null){
                return 'failed';
            }
        } else {
            // invalid name or password
            return "false";
            $_SESSION[Usuario::SESSION]['permission'] = 0;
            exit;
        }
    }

    public static function verificaLogin()
    {
        if (

            !isset($_SESSION[Usuario::SESSION])
            ||
            !$_SESSION[Usuario::SESSION]
            ||
            !(int)$_SESSION[Usuario::SESSION]["puser"] > 0

        ) {
            header("Location: /login");
            exit;
        }
    }

    public static function verificaAcesso()
    {

        // $permiss = $_SESSION[Usuario::SESSION]['puser'];
        // if($permiss == 0){
        //     header("Location: /deu_certo");
        // exit;
        // }
        if (isset($_SESSION[Usuario::SESSION])) {
                header("Location: /baseline");
                exit;
            } else {
                header("Location: /login");
                exit;
        }
    
    }

        //    if(!isset($_SESSION[Usuario::SESSION]['permission'])){
        //     header("Location: /login");
        //     exit;
        //    }else
        // if($_SESSION[Usuario::SESSION]['permission'] = 0){
        // header("Location: /sem_permissao");
        // exit;
        //    }

    

    public static function logout()
    {
        $_SESSION[Usuario::SESSION] = NULL;
    }

    ######################################### ERROS ###################################################

    public static function setError($msg)
    {

        $_SESSION[Usuario::ERROR] = $msg;
    }

    public static function getError()
    {

        $msg = (isset($_SESSION[Usuario::ERROR]) && $_SESSION[Usuario::ERROR]) ? $_SESSION[Usuario::ERROR] : '';

        Usuario::clearError();

        return $msg;
    }

    public static function clearError()
    {

        $_SESSION[Usuario::ERROR] = NULL;
    }


    // public static function teste(){
    //     $sql = new Sql();
    //     $user = 'julio.pragana';
    //     $usuario = $sql->select("select * from user_control where usuario = :user", array(
    //         ":user"=>$user
    //     ));
    //     foreach($usuario as $value){
    //         echo $value['usuario'];
    //     }
    //     // var_dump($usuario);

    //     // // dd($usuario);


    //     // if($usuario['usuario'] == $user){
    //     //     $_SESSION[Usuario::SESSION]['user'] = $user;
    //     //     $_SESSION[Usuario::SESSION]['puser'] = $usuario['nivel'];
    //     //     return $user;
    //     //     header('location:/painel');

    //     // }else{
    //     //     return 'false';
    //     // }
    // }



}
