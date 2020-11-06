<nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?=URL?>">TCC</a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
      aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=URL?>/paginas/sobre">Sobre</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item" href="#">Cozinheira</a>
                            <a class="dropdown-item" href="#">Diarista</a>
                            <a class="dropdown-item" href="#">Encanador</a>
                            <a class="dropdown-item" href="#">Eletricista</a>
                            <a class="dropdown-item" href="#">Jardineiro</a>
                            <a class="dropdown-item" href="#">Lavadeira</a>
                            <a class="dropdown-item" href="#">Passadeira</a>
                            
                            
                        </div>
                    </li>
                </ul>
                
                
                
                    <?php if(isset($_SESSION['usuario_id'])) : ?> 
                                    
                        <p class="text-light nav mr-sm-2">Olá, <?= $_SESSION['usuario_nome'] ?></p>
                        <a href="<?=URL?>/usuarios/minhaconta" class="btn btn-sm bg-light mr-sm-2">Minha Conta</a>
                        <a href="<?=URL?>/usuarios/sair" class="btn btn-sm btn-danger mr-sm-2">Sair</a>
                        
                    <?php else: ?>
            
                        <a href="<?=URL?>/usuarios/login" class="btn mr-sm-4 bg-light">ENTRAR</a></li>
                        <a href="<?=URL?>/usuarios/cadastrar" class="btn mr-sm-4 bg-light">CADASTRE-SE</a></li>
                            
                    <?php endif; ?>

                
            </div>            
    
    </nav>
    

    
