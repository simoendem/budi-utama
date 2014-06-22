

    <div class="pageheader">
      <h2><i class="fa fa-cogs"></i>Daftar Ulang</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li class="active">Daftar Ulang</li>
        </ol>
      </div>
    </div>
        
    <div class="contentpanel daftar-ulang">

      <?php if ($message != null ) : ?>
      <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Well done!</strong>   <?php echo $message; ?>
        </div>
      <?php endif ; ?>
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="#" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">Filter</h4>
          <p>Filter configuration for students re-registration.</p>
          <p><span class="asterisk">*</span> required</p>
        </div><!-- panel-heading -->
        <form id="daftarUlang" class="form-horizontal">
        <div class="panel-body">
	          <div class="form-group">
	            <label class="col-sm-3 control-label">Tahun Ajaran</label>
	            <div class="col-sm-2">
	              <input type="text" name="daftar_ulang[tahun-ajaran]" value="2014/2015" class="form-control" disabled/>
	            </div>
	          </div>
	          <div class="form-group">
	            <label class="col-sm-3 control-label">Nomor Induk Siswa <span class="asterisk">*</span></label>
	            <div class="col-sm-4">
	              <input type="text" name="daftar_ulang[nis]" placeholder="Masukkan NIS, contoh: 1110011" class="form-control" required/>
	            </div>
	          </div>
	           
        </div>
		<div class="panel-footer">
	        <button id="cariSiswa" class="btn btn-warning">Cari</button>
	    </div>
		</form>        
      </div><!-- panel -->      
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Students Paycheck</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive payment">
			  <table id="rekapTagihan" class="table table-hover">
	            <thead>
	              <tr>
	                <th>#</th>
	                <th>Jenis Tagihan</th>
	                <th>Nominal</th>
	              </tr>
	            </thead>
	            <tbody>
	            </tbody>
			</table>
          </div><!-- table-responsive -->
          <div class="clearfix mb30"></div>
        </div><!-- panel-body -->
		<div class="panel-footer">
	        <button id="daftarCetak" class="btn btn-success btn-lg btn-block">Daftar Ulang dan Cetak Tagihan</button>
	    </div>                
      </div><!-- panel -->
        
    </div><!-- contentpanel -->
    
<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/retina.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/chosen.jquery.min.js"></script>

<script src="<?php echo base_url();?>bracket/js/custom.js"></script>
<script>
  jQuery(document).ready(function() {
    var nomer=1;
	$('#daftarUlang').on('click', '#cariSiswa', function(){
		var valid = jQuery('#daftarUlang').valid();
		if(valid)
		{	
			var nama="SPP", currency="Rp ", nominal="1.000.000";
			$('#rekapTagihan > tbody:first').append(
				'<tr>'+
				'<td>'+nomer+'</td>'+
				'<td>'+nama+'</td>'+
				'<td>'+nominal+'</td>'+
				'</tr>');
		}
		nomer++;  
		return false;		
	});
	$('.daftar-ulang').on('click', '#daftarCetak', function(){
		alert('Daftar Ulang Berhasil!');
	});  
  });
</script>


