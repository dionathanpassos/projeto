<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card">
        <div class="card-header bg-secondary text-white text-center">
            <h2>Completar perfil</h2>

        </div>

        <div class="card-body">
            <p class="card-text">
                <small>Precisamos de mais algumas informações para finalizar seu cadastro</small>
            </p>

            <form name="completar" method="POST" action="<?= URL ?>/usuarios/perfil" class="mt-4">

                <div class="form-group">
                    <label for="celular">Celular: <sup class="text-danger">*</sup></label>
                    <input type="text" name="celular" id="celular" class="form-control <?= $dados['celular_erro'] ? 'is-invalid' : '' ?>" value="<?= $dados['celular'] ?>">
                    <div class="invalid-feedback"><?= $dados['celular_erro'] ?></div>
                </div>

                <div class="form-group">
                    <label for="cpf">CPF: <sup class="text-danger">*</sup></label>
                    <input type="text" name="cpf" id="nome" class="form-control <?= $dados['cpf_erro'] ? 'is-invalid' : '' ?>" value="<?= $dados['cpf'] ?>">
                    <div class="invalid-feedback"><?= $dados['cpf_erro'] ?></div>
                </div>

                <div class="form-group">
                    <label for="idCidade">cidade: <sup class="text-danger">*</sup></label>
                    <input type="text" name="idCidade" id="idCidade" class="form-control <?= $dados['idCidade_erro'] ? 'is-invalid' : '' ?>" value="<?= $dados['idCidade'] ?>">
                    <div class="invalid-feedback"><?= $dados['idCidade_erro'] ?></div>
                </div>

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
                !-->

                <div class="form-group">
                <label for="nivel">Deseja oferecer serviços?<sup class="text-danger">*</sup></label>
                <select onclick="selected(this.value)" name="nivel" id="nivel" class="form-control">
                    <option value="2" id="opt2">Não</option>               
                    <option value="1" id="opt1">Sim</option>
                    
                </select>

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