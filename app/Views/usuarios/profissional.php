<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-header bg-secondary text-white text-center">
            <h2>Completar perfil</h2>

        </div>

        <div class="card-body">
            <p class="card-text">
                <small>Precisamos de mais algumas informações para finalizar seu cadastro</small>
            </p>

            <form name="completar" method="POST" action="<?= URL ?>/usuarios/profissional" class="mt-4">

                

                <!--
                <div class="form-group">
                    <label for="nivel">Deseja oferecer serviços? <sup class="text-danger">*</sup></label>
                    <label for="nivel">Sim</label>
                    <input type="radio" name="nivel" id="nivel" value="1" class="form-control<?= $dados['nivel_erro'] ? 'is-invalid' : '' ?>" />
                    <label for="nivel">Não</label>
                    <input type="radio" name="nivel" id="nonivel" value="0" class="form-control<?= $dados['nivel_erro'] ? 'is-invalid' : '' ?>" checked/>
                    <div class="invalid-feedback"><?= $dados['nivel_erro'] ?></div>
                </div>
                

                <div class="form-group">
                    <label for="nivel">Deseja oferecer serviços? <sup class="text-danger">*</sup></label>
                    <input type="checkbox" name="nivel" id="nivel" class="form-contro" />
                    
                </div>

                 
                <div class="form-group">
                    <label for="genero">genero: <sup class="text-danger">*</sup></label>
                    <input type="text" name="genero" id="genero" class="form-control">
                    
                </div>
                

                


                <div class="che">
                    <div class="form-group">
                        <label for="idPessoa">IdPessoa: <sup class="text-danger">*</sup></label>
                        <input type="text" name="idPessoa" id="idPessoa" class="form-control">

                    </div>
!-->


                    <!--Formulario para inserir os dados do prestador de servilo
                !-->

                    <div class="form-group">
                        <label for="genero">Selecione o genero:<sup class="text-danger">*</sup></label>
                        <select name="genero" id="genero">
                            <option value="F">Feminino</option>
                            <option value="M">Masculino</option>
                        </select>

                    </div>



                    <div class="form-group">
                        <label for="dtNasc">Data de nascimento:<sup class="text-danger">*</sup></label>
                        <input type="date" name="dtNasc" id="dtNasc" class="form-control" />

                    </div>

                </div>




        </div>
        <div class="row">
            <div class="col-md-6">
                <input type="submit" value="Finalizar" class="btn btn-info btn-block">

            </div>



        </div>



        </form>


    </div>





</div>



</div>