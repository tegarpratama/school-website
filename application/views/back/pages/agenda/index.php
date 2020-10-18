<div class="container">
	<div class="row">
		<div class="col">
			<h2>Agenda Sekolah</h2>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?= $this->session->flashdata('success') ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>   
            </div>
         <?php endif ?>
		</div>
	</div>

	<div class="row mt-4">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Foto</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<a href="<?= base_url('img/agenda/' . $content->photo) ?>" target="_blank"><img src="<?= base_url('img/agenda/' . $content->photo) ?>" class="img-responsive" style=" max-width:400px";/></a>
							</td>
							<td>
								<a href="<?= base_url('jadwal/edit/' . $content->id); ?>" class="btn btn-warning btn-sm text-light">
									<i class="fas fa fa-pencil-alt"></i>
								</a>
							</td>
						</tr>			
					</tbody>
				</table>
			</div>	
		</div>
	</div>
</div>
