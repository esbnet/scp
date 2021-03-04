<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5" style="margin-top: 10rem !important">
        <div class="card-body p-0">

          <div class="card-header ">
            <h1 class="h4 text-gray-900 text-center">Carência e Provimento</h1>
          </div>
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">

              <div class="p-5">
                <!-- <div class="text-center">
                  <p class="text-gray-800 mb-4">Seja bem vindo!</p>
                </div> -->
                <form name="form_index" class="user" action="<?php echo base_url('login/auth') ?>" method="POST">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="user" placeholder="Entre com seu e-mail...">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password" placeholder="Entre com sua senha">
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">Entrar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>