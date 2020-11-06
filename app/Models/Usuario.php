<?php

class Usuario {
    private $db;

    public function __construct() {
        $this->db = new DataBase();
    }

    //verificar email
    public function verificar($email) {
        $this->db->query("SELECT email FROM db_user WHERE email = :e");
        $this->db->bind(":e",$email);

        if($this->db->resultado()):
            return true;
        else:
            return false;
        endif;
    }

    //verifica se CPF existe no banco

    public function verificarCPF($cpf) {
        $this->db->query("SELECT cpf FROM db_pessoa WHERE cpf = :e");
        $this->db->bind(":e",$cpf);

        if($this->db->resultado()):
            return true;
        else:
            return false;
        endif;
    }

    public function armazenar($dados) {
        $this->db->query("INSERT INTO db_user(nome, email, senha) VALUES (:nome, :email, :senha)");
        $this->db->bind("nome",$dados['nome']);
        $this->db->bind("email",$dados['email']);
        $this->db->bind("senha",$dados['senha']);

        if($this->db->executa()):
            return true;
        else:
            return false;
        endif;


    }

    public function completa($dados) {
        $this->db->query("INSERT INTO db_pessoa(celular, cpf, nivel, idUser, idCidade) VALUES (:celular, :cpf, :nivel, :idUser, :idCidade)");
        $this->db->bind("celular",$dados['celular']);
        $this->db->bind("cpf",$dados['cpf']);
        $this->db->bind("nivel",$dados['nivel']);
        $this->db->bind("idUser",$dados['idUser']);
        $this->db->bind("idCidade",$dados['idCidade']);
        

        if($this->db->executa()):
            return true;
        else:
            return false;
        endif;
    }

    public function listaServicos($dados) {
        $this->db->query("INSERT INTO db_listaservico(idServico, idPrest) VALUES (:idServico, :idPrest)");
        $this->db->bind("idServico",$dados['idServico']);
        $this->db->bind("idPrest",$dados['idPrest']); 
        

        if($this->db->executa()):
            return true;
        else:
            return false;
        endif;
    }

    public function profissional($dados) {
        $this->db->query("INSERT INTO db_prestservico(genero, dtNasc, idPessoa) VALUES (:genero, :dtNasc, :idPessoa)");
        $this->db->bind("genero",$dados['genero']);
        $this->db->bind("dtNasc",$dados['dtNasc']);
        $this->db->bind("idPessoa",$dados['idPessoa']);

        if($this->db->executa()):
            return true;
        else:
            return false;
        endif;


    }
    

    public function verificarLogin($email, $senha) {
        $this->db->query("SELECT * FROM db_user WHERE email = :e");
        $this->db->bind(":e",$email);        

        if($this->db->resultado()):
            $resultado = $this->db->resultado();
            if(password_verify($senha, $resultado->senha)):
                return $resultado;
            else:
                return false;
            endif;
        else :
            return false;
        endif;
    }

    //tentativa de popular o select com os dados do banco
    public function cidade() {
        $this->db->query("SELECT * FROM db_cidade ");
        $resultado = $this->db->resultados();

        return $resultado;

        
    }

    

    public function verificarPerfil($id) {
        $this->db->query("SELECT * FROM db_pessoa WHERE idUser = :e");
        $this->db->bind(":e",$id);        

        if($this->db->resultado()):
            return true;            
        else :
            return false;
        endif;
    }

    public function ler($id) {
        $this->db->query("SELECT * FROM db_user WHERE idUser = :e");
        $this->db->bind(":e",$id);        

        $resultado = $this->db->resultados();

        return $resultado;
    }

    public function verificarProfissional($id) {
        $this->db->query("SELECT * FROM db_prestservico WHERE idPessoa = :e");
        $this->db->bind(":e",$id);        

        if($this->db->resultado()):
            return true;            
        else :
            return false;
        endif;
    }

    public function verificarPrestServico($id) {
        $this->db->query("SELECT * FROM db_prestservico WHERE idPessoa = :e");
        $this->db->bind(":e",$id);        

        if($this->db->resultado()):
            return true;            
        else :
            return false;
        endif;
    }

    public function verificaridPessoa($id) {
        $this->db->query("SELECT idPessoa FROM db_pessoa WHERE idUser = :e");
        $this->db->bind(":e",$id);        

        $resultado = $this->db->resultado();
            return $resultado;            
        

    }

    public function verificaridPrest($id) {
        $this->db->query("SELECT * FROM db_prestservico, db_pessoa WHERE db_pessoa.idUser = :e");
        $this->db->bind(":e",$id);        

        $resultado = $this->db->resultado();
            return $resultado;  
    }





}