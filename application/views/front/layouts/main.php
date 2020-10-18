<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
   <!-- Bootsrap -->
   <link rel="stylesheet" href="<?= base_url() ?>asset/vendor/bootstrap/css/bootstrap.min.css">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="<?= base_url() ?>asset/vendor/fontawesome-free/css/all.min.css">
   <!--Custom Css -->
   <link rel="stylesheet" href="<?= base_url('asset/css/style.css') ?>">
	
	

	<!-- Icon -->
	<link rel="icon" href="" type="image/png">
   <title><?= $title ?> - SMK Islam Asy Syuhada</title>
</head>
<body>

	<!-- Navbar -->
	<?php $this->load->view('front/layouts/_navbar'); ?>
   <!-- End of Navbar -->

	<!-- Content -->
	<?php $this->load->view('front/pages/' . $page); ?>
	<!-- End of Content -->
	
	<!-- Footer -->
	<?php $this->load->view('front/layouts/_footer'); ?>
   <!-- End of Footer -->


   <!-- Jquery -->
	<script src="<?= base_url() ?>asset/vendor/jquery/jquery.min.js"></script>
   <script src="<?= base_url() ?>asset/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
