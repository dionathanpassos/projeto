<div class="col-xl-4 col-md-6 mx-auto p-5">
    <div class="card ">
        <div class="card-header bg-secondary text-white text-center">
            <h2>Completar perfil</h2>
        </div>

        <div class="card-body">
            <p class="card-text">
                <small>Precisamos de maiasdasds algumas infsssormações para finalizar seu cadastro</small>
            </p>

            <form name="completar" method="POST" action="<?= URL ?>/usuarios/servicos" class="mt-4">


                <div class="form-group">
                    <ul class="list-group">
                        <li class="list-group-item"><input type="checkbox" name="idServico[]" value="1"> Cozinheira</li>
                        <li class="list-group-item"><input type="checkbox" name="idServico[]" value="2"> Diarista</li>
                        <li class="list-group-item"><input type="checkbox" name="idServico[]" value="3"> Encanador</li>
                        <li class="list-group-item"><input type="checkbox" name="idServico[]" value="4"> Eletricista</li>
                        <li class="list-group-item"><input type="checkbox" name="idServico[]" value="5"> Jardineiro</li>
                        <li class="list-group-item"><input type="checkbox" name="idServico[]" value="6"> Lavandeira</li>
                        <li class="list-group-item"><input type="checkbox" name="idServico[]" value="7"> Passadeira</li>
                        
                    </ul>
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