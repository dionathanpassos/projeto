<div class="col-xl-4 col-md-6 mx-auto p-5">
<div class="card">
    <div class="card-header bg-secondary text-white text-center">
        <h2>Acessar Conta</h2>
                
    </div>

    <div class="card-body">
        <p class="card-text">
        <small>Preencher o formulário para fazer seu cadastro</small>
        </p>

            <form name="login" method="POST" action="<?=URL?>/usuarios/login" class="mt-4">
                    

                    <div class="form-group">
                        <label for="email">E-mail: <sup class="text-danger">*</sup></label>
                        <input type="text" name="email" class="form-control <?= $dados['email_erro'] ? 'is-invalid' : ''?>" id="email" value="<?=$dados['email']?>" >
                        <div class="invalid-feedback">
                            <?=$dados['email_erro']?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha: <sup class="text-danger">*</sup></label>
                        <input type="password" name='senha' class="form-control <?= $dados['senha_erro'] ? 'is-invalid' : ''?>" id="senha" value="<?=$dados['senha']?>">
                        <div class="invalid-feedback">
                            <?=$dados['senha_erro']?>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" value="Login" class="btn btn-info btn-block">
                                                                                  
                        </div>

                        <div class="col-md-6">
                                <a href="<?= URL?>/usuarios/login">Não tem uma conta? Cadastre-se</a>                            
                        </div>
                        
                    </div>

                        
                        
            </form>
        
        
    </div>

                

        

</div>



</div>


