<table class="table table-striped" id="datatables">
	<thead class="thead-dark">
		<tr>
			<th>ID</th>
            <th>Provinsi</th>
			<th>Nama Kota</th>
			<th>Penduduk</th>
		</tr>
	</thead>
	<tbody>	
	</tbody>
</table>

<script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>

<link href="<?php echo base_url('assets/vendor/datatables/jquery.dataTables.min.css');?>" rel="stylesheet">
<link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css');?>" rel="stylesheet">

<script type="text/javascript">
    var table;
    jQuery(document).ready(function() {
        table = $('#datatables').DataTable({ 
 
            "processing": true, 
            "serverSide": true, 
            "pageLength":5,
            "lengthChange":false,
            "order": [], 
            "ajax": {
                "url": "<?php echo site_url('kota_ajax/datatables')?>",
                "type": "POST"
            },
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
 
        });
 
    });
 
</script>