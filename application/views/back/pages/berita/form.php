<div class="container">
	<div class="row mb-4">
		<div class="col">
			<h3>Form <?= $title ?></h3>
		</div>
	</div>

	<?= form_open_multipart($form_action) ?>
		<?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

		<div class="form-group row">
			<label for="title" class="col-sm-2 col-form-label">Judul Berita</label>
			<div class="col-sm-10">
				<input type="text" name="title" id="title" value="<?= $input->title ?>" required class="form-control">
				<?= form_error('title', '<small class="form-text text-danger">', '</small>') ?>
			</div>
		</div>

		<div class="form-group row">
			<label for="content" class="col-sm-2 col-form-label">Isi Berita</label>
			<div class="col-sm-10">
				<textarea name="content" id="summernote" rows="8" class="form-control"><?= $input->content ?></textarea>
				<!-- <?= form_textarea('content', $input->content, ['row' => 4, 'class' => 'form-control', 'id' => 'summernote']); ?> -->
				<?= form_error('content', '<small class="form-text text-danger">', '</small>') ?>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label" id="label-photo">Foto</label>
			<div class="col-sm-8">
				<?php if(!empty($input->photo)) : ?>
					<img src="<?= base_url("img/berita/thumbs/$input->photo") ?>" alt="">
				<?php else: ?>
					<p>No Photo</p>
				<?php endif; ?>
				<br> 
				<small><span class="text-danger">*</span>	Maksimal ukuran gambar adalah 3 MB</small>
				<br> <br>
				<input name="photo" type="file" class="form-control-file">
				<?php if($this->session->flashdata('image_error')) :  ?>
                <small class="form-text text-danger">
                  <?= $this->session->flashdata('image_error') ?>
                </small>
				<?php endif ?>
			</div>
		</div>

		<div class="form-group row">
			<label for="is_active" class="col-sm-2 col-form-label">Aktif</label>
			<div class="col-sm-2">
				<select class="form-control" id="is_active" name="is_active">
					<option value="Y" <?php if($input->is_active == "Y"){ print ' selected'; }?>>Ya</option> 
					<option value="N" <?php if($input->is_active == "N"){ print ' selected'; }?>>Tidak</option>
				</select>
				<?= form_error('is_active', '<small class="form-text text-danger">', '</small>') ?>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-10 offset-2">
				<a href="<?= base_url('berita') ?>" class="btn btn-sm btn-secondary"><i class="fas fa-angle-left mr-1"></i>Kembali</a>
				<button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-check mr-1"></i> Simpan</button>
			</div>
		</div>
	<?= form_close() ?>
</div>
