<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - <?= $title ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Datatables -->
  <link href="<?= base_url() ?>asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<!-- Summernote -->
  <link href="<?= base_url() ?>asset/vendor/summernote/dist/summernote-bs4.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('back/layouts/_sidebar') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
    		<?php $this->load->view('back/layouts/_topbar') ?>
        </nav>
        <!-- End of Topbar -->

			<!-- Begin Page Content -->
			<?php $this->load->view('back/pages/' . $page) ?>

      </div>
      <!-- End of Main Content -->

		<!-- Footer -->
		<?php $this->load->view('back/layouts/_footer') ?>
		<!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik tombol "Logout" untuk keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

   <!-- Bootstrap core JavaScript-->
   <script src="<?= base_url() ?>asset/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url() ?>asset/vendor/popper/popper.min.js"></script>
   <script src="<?= base_url() ?>asset/vendor/bootstrap/js/bootstrap.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="<?= base_url() ?>asset/vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Datatables -->
   <script src="<?= base_url() ?>asset/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="<?= base_url() ?>asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="<?= base_url() ?>asset/js/sb-admin-2.min.js"></script>

   <!-- Page level plugins -->
   <script src="<?= base_url() ?>asset/vendor/chart.js/Chart.min.js"></script>

	 <!-- Summernote -->
   <script src="<?= base_url() ?>asset/vendor/summernote/dist/summernote-bs4.min.js"></script>

	 <!-- Sweet Alert 2 -->
   <script src="<?= base_url() ?>asset/vendor/sweetalert2/sweetalert2.js"></script>

	<script>
      $('#summernote').summernote({
         height: 300,
			toolbar: [
				// [groupName, [list of button]]
				['style', ['bold', 'italic', 'underline', 'clear', 'fontname']],
				['misc', ['undo', 'redo']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']],
				['insert', ['table', 'link', 'hr', 'fullscreen']],
			],
			placeholder: 'Masukkan konten berita disini...'
      });
   </script>

	<!-- For Datatable -->
   <?php 
      if(isset($datatable)){
         $this->load->view('back/pages/'. $datatable);
      }
   ?>

   <!-- For Chart in Dashboard -->
  <?php 
    if(isset($pageChart)){
      $this->load->view('back/layouts/'. $pageChart);
    }
  ?>

</body>

</html>
