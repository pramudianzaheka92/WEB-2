<!--link tambah data-->
<a href="<?php echo site_url('provinsi/insert');?>" class="btn btn-primary">Tambah</a>
<br /><br />

<table class="table table-striped" id="datatables" width="100%" data-page-length='5' data-length-change='false'>
	<thead class="thead-dark">
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>Gambar</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data provinsi-->
		<?php foreach($data_provinsi as $provinsi):?>

		<!--cetak data per baris-->
		<tr>
			<td><?php echo $provinsi['id'];?></td>
			<td><?php echo $provinsi['nama'];?></td>
			<td><img src="<?php echo base_url('upload_folder/'.$provinsi['gambar'])?>" alt="" width="70px" height="70px"></td>
			<td>
				<!--link ubah data (menyertakan id per baris untuk dikirim ke controller)-->
				<a href="<?php echo site_url('provinsi/update/'.$provinsi['id']);?>" class="btn btn-warning">
				Ubah
				</a>
				|

				<!--link hapus data (menyertakan id per baris untuk dikirim ke controller)-->
				<a href="<?php echo site_url('provinsi/delete/'.$provinsi['id']);?>" class="btn btn-danger" onClick="return confirm('Apakah anda yakin?')">
				Hapus
				</a>
				|
				
				<!--link export data library-->
				<a href="<?php echo site_url('provinsi/export_kota/'.$provinsi['id']);?>" class="btn btn-success">
				Export Kota
				</a>	
			</td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>