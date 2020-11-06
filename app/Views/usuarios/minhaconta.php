<?php foreach($dados['usuario'] as $user): ?>
<?php endforeach;?>

<div class="container py-5">
      <div class="row">
        <div class="col-md-8 order-md-2">
          <h4 class="mb-3">Dados Usuário</h4>

        <form class="needs-validation" novalidate>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName" class="mb-0">Nome</label>
                <input type="text" class="form-control" id="firstName" value="<?= $user->nome?>" required>                
              </div>              
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName" class="mb-0">E-mail</label>
                <input type="text" class="form-control" id="firstName"  value="<?= $user->email?>" required>                
              </div>              
            </div>          

            
            

            
            <hr class="mb-4">
            <button class="btn btn-primary btn-sm " type="submit">Salvar informações</button>
        </form>
        </div>
      </div>


    </div>

    <!--
        <div class="container py-5">
      <div class="row">
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Dados Usuário</h4>
        <form class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="<?= $user->nome?>" required>                
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                
              </div>
            </div>

            

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">             
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>              
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            

            
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
        </form>
        </div>
      </div>


    </div>
        
    
    
    !-->