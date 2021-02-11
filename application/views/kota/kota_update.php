<!--$data_kota_single['id'] : perlu diletakan di url agar bisa diterima/tangkap pada controller (sbg penanda id yang akan diupdate) -->
<form method="post" action="<?php echo site_url('kota/update_submit/'.$data_kota_single['id_kota']);?>">
	<table class="table table-stripped">
		<tr>
			<td>Provinsi</td>
			<!--$data_kota_single['nama'] : menampilkan data kota yang dipilih dari database -->
			<td>
				<select name="id_provinsi">
				<?php foreach($data_provinsi as $provinsi):?>
					<?php if($provinsi['id'] == $data_kota_single['id_provinsi']):?>
					<option value="<?php echo $provinsi['id'];?>" selected><?php echo $provinsi['nama'];?></option>
					<?php else:?>
					<option value="<?php echo $provinsi['id'];?>"><?php echo $provinsi['nama'];?></option>
					<?php endif;?>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nama Kota</td>
			<!--$data_kota_single['nama'] : menampilkan data kota yang dipilih dari database -->
			<td><input type="text" name="nama_kota" value="<?php echo $data_kota_single['nama_kota'];?>" required=""></td>
		</tr>
		<tr>
			<td>Penduduk</td>
			<!--$data_kota_single['nama'] : menampilkan data kota yang dipilih dari database -->
			<td><input type="text" name="penduduk" value="" required=""></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>

</body>
</html>