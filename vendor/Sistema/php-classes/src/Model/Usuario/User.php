<?php

namespace Sistema\Model;

date_default_timezone_set('America/Cayenne');

use \Sistema\DB\Sql;
use \Sistema\Model; 

class User extends Model{

    const SESSION = "User";

    public static function login($login, $senha){

        $sql = new Sql();
        // SELECT u.*, n.*,s.* FROM usuarios u left join sistemas as s on u.AREA = s.sis_id left join nivel as n on n.nivel_cod =u.nivel WHERE u.login = :LOGIN
        $results = $sql->select("SELECT * FROM usuarios WHERE login = :LOGIN", array(
            ":LOGIN"=>$login
        ));
    
        if (count($results) === 0){
            
            throw new \Exception("Usuário inválido");
            
        }
    
        $data = $results[0];

        $senhad = md5($senha);
    
        if($senhad === $data["password"]){
        
            $user = new User();
    
            $user->setData($data);
    
            $_SESSION[User::SESSION] = $user->getValues();
    
            return $user;
    
        } else {
            throw new \Exception("Senha inválida");
            
        }
    
    }

    public static function verificaLogin()
	{
		if(

			!isset($_SESSION[User::SESSION])
			|| 
			!$_SESSION[User::SESSION]
			|| 
			!(int)$_SESSION[User::SESSION]["user_id"] > 0
			
		){
			header("Location: /login");
			exit;
		} 
	}

    public static function verificaPerfil($usuario){

        $sql = new Sql();

        return $results = $sql->select("SELECT u.*, n.*,s.* FROM usuarios u left join sistemas as s on u.AREA = s.sis_id left join nivel as n on n.nivel_cod =u.nivel WHERE u.login = :LOGIN", array(
            "LOGIN"=>$usuario
        ));

    }

    public static function logout(){
        $_SESSION[User::SESSION] = NULL;
    }


}