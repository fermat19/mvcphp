<div class="auth-form-light text-left py-5 px-4 px-sm-5">
   <div class="brand-logo">
      <img src="<?= APP_PUBLIC ?>assets/images/logo/cc-logo.png" alt="logo">
   </div>
   <h4>Hola! bienvenido de vuelta a <strong><?= strtoupper(APP_NAME) ?></strong></h4>
   <h6 class="fw-light">Inicie sesi&oacute;n para continuar.</h6>
   <form class="pt-3">
      <div class="form-group">
         <input type="text" class="form-control form-control-lg" id="usuario" name="usuario" placeholder="Correo Electr&oacute;nico / Usuario">
      </div>
      <div class="form-group">
         <input type="password" class="form-control form-control-lg" id="clave" name="clave" placeholder="Contrase&ntilde;a de acceso">
      </div>
      <div class="mt-3">
         <button class="btn btn-block btn-primary font-weight-medium auth-form-btn" type="submit">
            INICIAR SESI&Oacute;N
         </button>
      </div>

   </form>
</div>