<?php

class Usuarios extends Controller
{

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
    }

    public function cadastrar()
    {


        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) :
            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirmar_senha' => trim($formulario['confirmar_senha']),                
                
            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['nome'])) :
                    $dados['nome_erro'] = 'Preencher o campo nome';
                endif;

                if (empty($formulario['email'])) :
                    $dados['email_erro'] = 'Preencher o campo e-mail';
                endif;

                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = 'Preencher o campo senha';
                endif;

                if (empty($formulario['confirmar_senha'])) :
                    $dados['confirmar_senha_erro'] = 'Confirmar senha';

                endif;

            else :
                if (Validar::validarNome($formulario['nome'])) :
                    $dados['nome_erro'] = 'Nome inválido';

                elseif (Validar::validarEmail($formulario['email'])) :
                    $dados['email_erro'] = 'E-mail invalido';

                elseif ($this->usuarioModel->verificar($formulario['email'])) :
                    $dados['email_erro'] = 'E-mail já cadastrado';

                elseif (strlen($formulario['senha']) < 6) :
                    $dados['senha_erro'] = 'A senha deve ter no minímo 6 caracteres';
                elseif ($formulario['senha'] != $formulario['confirmar_senha']) :
                    $dados['confirmar_senha_erro'] = 'As senhas são diferentes';

                else :
                    $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                    if ($this->usuarioModel->armazenar($dados)) :
                        $this->criarSessaoUsuario($this->usuarioModel->verificarLogin($formulario['email'], $formulario['senha']));
                        
                        

                        echo 'Cadastro realizado com sucesso';
                        header('Location: ' . URL . '/usuarios/perfil');


                    else :
                        die("Erro ao armazenar");
                    endif;

                endif;
            endif;

        else :
            $dados = [
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirmar_senha' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirmar_senha_erro' => '',
            ];
        endif;

        $this->view('usuarios/cadastrar', $dados);
    }


    public function login()
    {


        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) :
            $dados = [
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),


            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['email'])) :
                    $dados['email_erro'] = 'Preencher o campo e-mail';
                endif;

                if (empty($formulario['senha'])) :
                    $dados['senha_erro'] = 'Preencher o campo senha';
                endif;
            else :
                if (Validar::validarEmail($formulario['email'])) :
                    $dados['email_erro'] = 'E-mail invalido';
                else :
                    $usuario = $this->usuarioModel->verificarLogin($formulario['email'], $formulario['senha']);

                    if ($usuario) :
                        $this->criarSessaoUsuario($usuario);

                        if($this->usuarioModel->verificarPerfil($usuario->idUser)):
                            header('Location: '.URL.'');
                        else:
                            header('Location: ' . URL . '/usuarios/perfil');
                        endif;
                    else:
                        echo 'Senha ou usuário invalido<hr>';
                    endif;                    

                endif;
            endif;
        else :
            $dados = [

                'email' => '',
                'senha' => '',
                'email_erro' => '',
                'senha_erro' => '',

            ];
        endif;

        $this->view('usuarios/login', $dados);
    }

    private function criarSessaoUsuario($usuario)
    {
        $_SESSION['usuario_id'] = $usuario->idUser;
        $_SESSION['usuario_nome'] = $usuario->nome;
    }

    public function sair()
    {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);

        session_destroy();

        header('Location: ' . URL . '');
    }


    public function perfil()
    {

        if(!isset($_SESSION['usuario_id'])):
            header('Location: '.URL.'/usuarios/login');
        endif;
        if($this->usuarioModel->verificarPerfil($_SESSION['usuario_id'])):
            header('Location: '.URL.'');
        endif;
            

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [
                'celular' => trim($formulario['celular']),
                'cpf' => trim($formulario['cpf']),
                'nivel' => trim($formulario['nivel']),
                'idUser' => $_SESSION['usuario_id'],
                'idCidade' => trim($formulario['idCidade']),

            ];

            if (in_array("", $formulario)) :

                if (empty($formulario['celular'])) :
                    $dados['celular_erro'] = 'Preencher o campo celular';
                endif;

                if (empty($formulario['cpf'])) :
                    $dados['cpf_erro'] = 'Preencher o campo CPF';
                endif;                

                if (empty($formulario['idCidade'])) :
                    $dados['idCidade_erro'] = 'Preencher o campo celular';
                endif;

                if (empty($formulario['idUser'])) :
                    $dados['idUser_erro'] = 'Preencher o campo celular';
                endif;
               
            else :
                
                if (Validar::validarCPF($formulario['cpf'])) :
                    $dados['cpf_erro'] = 'CPF invalido';

                elseif ($this->usuarioModel->verificarCPF($formulario['cpf'])) :
                    $dados['cpf_erro'] = 'CPF já cadastrado';    
                else :  
                    $pessoa = (int)$this->usuarioModel->verificaridPessoa($_SESSION['usuario_id'])->idPessoa;                  
                   
                    if ($this->usuarioModel->completa($dados)): 
                        
                        if($formulario['nivel'] == 1):
                        
                        if($this->usuarioModel->verificarProfissional($pessoa)):
                            header('Location: '.URL.'');
                        else:
                            header('Location: ' . URL . '/usuarios/profissional');
                        endif;

                    else:                       
                            
                        echo 'Cadastro realizado com sucesso';                        
                        header('Location: ' . URL . '');

                    endif;
                    else :
                        die("Erro ao armazenar");
                    endif;
                endif;
                

            endif;
        else :
            $dados = [
                'celular' => '',
                'cpf' => '',
                'nivel' => '',
                'idCidade' => '',
                'idUser' => '',
                'genero' => '',
                'dtNasc' => '',
                'idPessoa' => '',
            ];
        endif;

        $this->view('usuarios/perfil', $dados);
    }


    public function profissional()
    {

        if(!isset($_SESSION['usuario_id'])):
            header('Location: '.URL.'/usuarios/login');
        endif;

        if($this->usuarioModel->verificaridPessoa($_SESSION['usuario_id'])):
            header('Location: '.URL.'');
        endif;

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) :
            $dados = [                
                'genero' => trim($formulario['genero']),
                'dtNasc' => trim($formulario['dtNasc']),
                'idPessoa' => (int)$this->usuarioModel->verificaridPessoa($_SESSION['usuario_id'])->idPessoa,
                
            ];            
            
            
            if ($this->usuarioModel->profissional($dados)):             
                
                
                echo 'Cadastro realizado com sucesso';                        
                header('Location: ' . URL .'/usuarios/servicos');
            else :
                die("Erro ao armazenar");
            endif;
            
            var_dump($dados);

        else :
            $dados = [                
                'genero' => '',
                'dtNasc' => '',
                'idPessoa' => '',
            ];
        endif;

        $this->view('usuarios/profissional', $dados);
    }

    public function servicos()
    {
        if(!isset($_SESSION['usuario_id'])):
            header('Location: '.URL.'/usuarios/login');
        endif;

        if($this->usuarioModel->verificaridPessoa($_SESSION['usuario_id'])):
            header('Location: '.URL.'');
        endif;

        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING, FILTER_VALIDATE_INT);        
        if (isset($formulario)):
            foreach($formulario['idServico'] as $v){
                //echo $v.'<br>';
                $dados = [
                    'idServico' => $v,
                    'idPrest' => $this->usuarioModel->verificaridPrest($_SESSION['usuario_id'])->idPrest,
            ];                
                if ($this->usuarioModel->listaServicos($dados)):
                    echo 'Cadastro realizado com sucesso';                        
                    header('Location: ' . URL . '');
                else :
                    die("Erro ao armazenar");
                endif;                
            }

        else :
            $dados = [                
                'idServico' => '',
                'idPrest' => '',                
            ];
        endif;

        $this->view('usuarios/servicos', $dados);
    }

    public function minhaConta()
    {

        if(!isset($_SESSION['usuario_id'])):
            header('Location: '.URL.'/usuarios/login');
        endif;     
        
        $dados = [
            'usuario' => $this->usuarioModel->ler($_SESSION['usuario_id'])
        ];

        //var_dump($dados);
        

        $this->view('usuarios/minhaconta', $dados);
    }







}
