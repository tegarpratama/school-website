<?php $this->load->view('auth/templates/header') ?>

<main class="container">
   <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
         <div class="card card-signin my-5">
            <div class="card-body">
               <h5 class="card-title text-center">Forgot Password</h5>

               <!-- Alert -->
               <div class="row">
                  <div class="col">
                     <?php if($this->session->flashdata('message')) : ?>
                        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                        <?= $this->session->flashdata('message') ?>
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                           </button>   
                        </div>
                     <?php endif ?>
                  </div>
               </div>

               <?= form_open("auth/forgot_password", ["class" => "form-signin"]) ?>
                  <div class="form-label-group">
                  <input type="text" name="identity" value="" class="form-control" id="inputEmail" placeholder="Email" required autofocus>  
                  <label for="inputEmail">Email</label>
                  </div>

                  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Submit</button>

                  <hr class="my-4">

                  <div class="text-center mt-3">
                  Have an account ? <a href="<?= base_url('auth/login') ?>">Sign In</a> 
                  </div>
               <?= form_open() ?>
            </div>
         </div>
      </div>
   </div>
</main>

<?php $this->load->view('auth/templates/footer') ?>

