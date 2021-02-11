<!--$data_provinsi_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('provinsi/update_submit/'.$data_provinsi_single['id']);?>" enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<td>Nama</td>
			<!--$data_provinsi_single['nama'] : menampilkan data provinsi yang dipilih dari database -->
			<td><input type="text" name="nama" value="<?php echo $data_provinsi_single['nama'];?>" required="" class="form-control"></td>
		</tr>
		<tr>
			<td></td>
			<td><img src="<?php echo site_url('../ci/upload_folder/'.$data_provinsi_single['gambar'])?>" height="70" width="70">
		</tr>
		<tr>
			<td>Gambar</td>
			<td><input type="file" name="uploadfile" value="" required="" class="form-control-file"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-warning"></td>
		</tr>
	</table>
</form>