<div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
   </div>

   <!-- Alert -->
   <div class="row">
      <div class="col">
         <?php if($this->session->flashdata('message')) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('message') ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
               </button>   
            </div>
         <?php endif ?>
      </div>
   </div>

   <!-- Content Row -->
   <div class="row">

   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
         <div class="card-body"> 
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-s font-weight-bold text-danger text-uppercase mb-1">Selamat Datang</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                     <!-- <?= $total_guru ?> -->
                  </div>
               </div>
               <div class="col-auto">
               <i class="fas fa-smile-wink fa-3x text-gray-300"></i>
               </div>
            </div>
         </div>
      </div>
	</div>
	
	<div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Banner</div>
                  <div class="h mb-0 font-weight-bold text-gray-800">
							<?= $total_banner ?>	
                  </div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-desktop fa-3x text-gray-300"></i>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-s font-weight-bold text-success text-uppercase mb-1">Fasilitas</div>
                  <div class="h mb-0 font-weight-bold text-gray-800">
							<?= $total_fasilitas ?>
                  </div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-place-of-worship fa-3x text-gray-300"></i>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
         <div class="card-body">
            <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-s font-weight-bold text-warning text-uppercase mb-1">Berita</div>
                  <div class="h mb-0 font-weight-bold text-gray-800">
							<?= $total_berita ?>
                  </div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-newspaper fa-3x text-gray-300"></i>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>

   <!-- Content Row -->

   <div class="row">

      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-12">
         <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Total Postingan Bulanan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
               <div class="chart-area">
                  <canvas id="myAreaChart" height="100vh"></canvas>
               </div>
            </div>
         </div>
      </div>

   </div>

</div>
