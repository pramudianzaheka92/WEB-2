<?php echo validation_errors(
	'<div class="alert alert-danger alert-dismissible fade show">',
	'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button></div>'
); ?>

<?php if ($this->session->tempdata('message') == TRUE) : ?>
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<p><?php echo $this->session->tempdata('message'); ?>
	</div>
<?php endif; ?>

<form method="post" action="<?php echo site_url('user/reset_password/');?>">
    <table class="table table-striped">
        <tr> 
            <td>Password Lama</td>
                <td><input type="password" name="password_lama" class="form-control" placeholder="Password Lama" value="" required=""></td>
        </tr>
    
        <tr> 
            <td>Password Baru</td>
            <td><input type="password" name="password_baru" class="form-control" placeholder="Password Baru" value="" required=""></td> 
        </tr>

        <tr>
            <td>Kofirmasi Ulang Password</td>
            <td><input type="password" name="konfirmasi_password" class="form-control" placeholder="Konfirmasi Ulang Password" value="" required=""></td>
        </tr>

        <tr>
		    <td>&nbsp;</td>
		    <td><input type="submit" name="submit" value="Simpan" class="btn btn-info"></td>
	    </tr>
    </table>
</form>
