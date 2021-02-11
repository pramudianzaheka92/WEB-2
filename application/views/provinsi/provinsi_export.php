<?php
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=export_data_kota.xls" );
?>

<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Provinsi</th>
			<th>Nama</th>
		</tr>
	</thead>
	<tbody>
		<!--looping data provinsi-->
		<?php foreach($data_provinsi as $provinsi):?>

		<!--cetak data per baris-->
		<tr>
			<td><?php echo $provinsi['id'];?></td>
			<td><?php echo $provinsi['nama'];?></td>
			<td><?php echo $provinsi['nama'];?></td>
		</tr>
		<?php endforeach?>		
	</tbody>
</table>