<ul class="navbar-nav ml-auto">

	<!-- Nav Item - User Information -->
	<li class="nav-item dropdown no-arrow">
		<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= ucfirst($this->session->userdata('first_name')) . ' ' . ucfirst($this->session->userdata('last_name')) ?></span>
			<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
		</a>
		<!-- Dropdown - User Information -->
		<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
			<a class="dropdown-item" href="<?= base_url('auth/edit_user/' . $this->session->userdata('id')) ?>">
				<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
			Profile
			</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
				<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
			Logout
			</a>
		</div>
	</li>

</ul>
