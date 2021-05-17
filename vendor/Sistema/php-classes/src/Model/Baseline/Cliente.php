<?php

namespace Sistema\Model\Baseline;
use \Sistema\DB\Sql;
use \Sistema\Model; 

class Cliente extends Model{

    public static function listaClienteAll(){
        
        $sql = new Sql();

        $clientes = $sql->select("SELECT 
        c.id_clientes,
        c.nome, 
        c.cpf,
        u.email,
        c.cep,
        c.rua,
        c.numero,
        c.complemento,
        c.cidade,
        c.estado,
        c.pais,
        c.status_usuario,
        c.tb_usuarios_id_usuario,
        u.usuario,
        
        u.tipo_usuario,
        CASE  
            WHEN c.status_usuario = 0 THEN 'Pendente de pagamento'
            WHEN c.status_usuario = 1 THEN 'Regularizado'
            WHEN c.status_usuario = 2 THEN 'Cancelado'
            END as status_usuario_correto
        
          FROM tb_clientes c 
            INNER JOIN tb_usuarios u ON (c.tb_usuarios_id_usuario = u.id_usuario)");
        $res = json_encode($clientes);

        return $res;
        

    }


    public function cadCliente(){
        $sql = new Sql();

        $results = $sql->select("CALL sp_create_user_func(
            :usuario,
            :senha,
            :email,
            :hash_usuario,	
            :tipo_usuario,
            :nome,
            :cpf,
            :telefone,
            :celular,
            :data_nascimento,
            :cep,
            :rua,
            :numero,
            :complemento,
            :cidade,
            :estado,
            :pais,
            :status_usuario,
            :hash_cliente,
            :valor,
            :periodo,
            :link_cobranca,
            :hash_pagamento,
            :situacao)", 

        array(
            ":usuario"=>$this->getusuario(),
            ":senha"=>$this->getsenha(),
            ":email"=>$this->getemail(),
            ":hash_usuario"=>$this->gethash_usuario(),	
            ":tipo_usuario"=>$this->gettipo_usuario(),
            ":nome"=>$this->getnome(),
            ":cpf"=>$this->getcpf(),
            ":telefone"=>$this->gettelefone(),
            ":celular"=>$this->getcelular(),
            ":data_nascimento"=>$this->getdata_nascimento(),
            ":cep"=>$this->getcep(),
            ":rua"=>$this->getrua(),
            ":numero"=>$this->getnumero(),
            ":complemento"=>$this->getcomplemento(),
            ":cidade"=>$this->getcidade(),
            ":estado"=>$this->getestado(),
            ":pais"=>$this->getpais(),
            ":status_usuario"=>$this->getstatus_usuario(),
            ":hash_cliente"=>$this->gethash_cliente(),
            ":valor"=>$this->getvalor(),
            ":periodo"=>$this->getperiodo(),
            ":link_cobranca"=>$this->getlink_cobranca(),
            ":hash_pagamento"=>$this->gethash_pagamento(),
            ":situacao"=>$this->gethash_pagamento()
        ));
    }
}