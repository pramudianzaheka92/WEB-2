<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $judul?></title>
</head>

<form method="post" action="<?php echo site_url('provinsi/insert_submit/');?>"  enctype="multipart/form-data">
	<table class="table table-striped">
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" value="" required="" class="form-control"></td>
		</tr>
		<tr>
			<td>Gambar</td>
			<td><input type="file" name="uploadfile" value="" required="" class="form-control-file"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" name="submit" value="Simpan" class="btn btn-primary"></td>
		</tr>
	</table>
</form>