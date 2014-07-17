    <div class="pageheader">
      <h2><i class="fa fa-group"></i> Daftar Ulang untuk tahun ajaran <?php echo $tahun->tahun_ajaran?></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li class="active">Daftar Ulang untuk tahun ajaran <?php echo $tahun->tahun_ajaran?><li>
        </ol>
      </div>
    </div>
        
    <div class="contentpanel">
      
      <?php if ($message != null ) : ?>
      <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Well done!</strong>   <?php echo $message; ?>
        </div>
      <?php endif ; ?>
      <?php if ($message_error != null ) : ?>
      <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Error!</strong>   <?php echo $message_error; ?>
        </div>
      <?php endif ; ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Daftar Ulang untuk tahun ajaran <?php echo $tahun->tahun_ajaran?></h3>
          <p>
        Daftar siswa yang belum melakukan daftar ulang. 
          </p>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                <th style="width:10%;">NIS</th>
                <th style="width:20%;">Nama</th>
                <th style="width:20%;"></th>
              </thead>
              <tbody>
                  <?php $no = 1; foreach ($siswas as $siswa): ?>
                      <tr>
                          <td><?php echo $siswa->nis; ?></td>
                          <td><?php echo $siswa->nama_lengkap; ?></td>
                          <td>
                             <!--<a href="<?php echo base_url(); ?>setting/daftar_ulang/add_process/<?php echo $siswa->nis; ?>">
                             Daftar Ulang</a>-->
                             <a href="#" onclick="daftar_ulang('<?php echo $siswa->nis ?>','<?php echo $siswa->id_unit ?>','<?php echo $siswa->nama_lengkap ?>')">
                             Daftar Ulang</a>
                          </td>
                      </tr>
                  <?php $no++; endforeach ; ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->
          <div class="clearfix mb30"></div>
        </div><!-- panel-body -->
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

<script src="<?php echo base_url()?>bracket/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/chosen.jquery.min.js"></script>

<script src="<?php echo base_url();?>bracket/js/custom.js"></script>
<script>
  jQuery(document).ready(function() {
    
    jQuery('#table1').dataTable();
    
    // Chosen Select
    jQuery("select").chosen({
      'min-width': '100px',
      'white-space': 'nowrap',
      disable_search_threshold: 10
    });
    
  
  });
</script>
<script type="text/javascript" language="javascript">
  function daftar_ulang(no,unit,nama){
    //if(confirm('Daftar Ulang akan men-Generate Invoice untuk '+nama+'?'))
      window.location = "<?php echo base_url(); ?>setting/daftar_ulang/add_process/"+no+"/"+unit;
  }
</script>