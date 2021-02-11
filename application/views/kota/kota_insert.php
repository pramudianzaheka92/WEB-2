<form method="post" action="<?php echo site_url('kota/insert_submit/');?>">
	<table class="table table-striped">
		<tr>
			<td>Provinsi</td>
			<!--$data_kota_single['nama'] : menampilkan data kota yang dipilih dari database -->
			<td>
				<select name="id_provinsi">
				<?php foreach($data_provinsi as $provinsi):?>
				<option value="<?php echo $provinsi['id'];?>">
					<?php echo $provinsi['id'];?> 
					<?php echo $provinsi['nama'];?>
				</option>
				<?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Nama Kota</td>
			<td><input type="text" name="nama_kota" value="" required=""></td>
		</tr>
		<tr>
			<td>Penduduk</td>
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