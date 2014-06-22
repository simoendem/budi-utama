    <div class="pageheader">
      <h2><i class="fa fa-group"></i>Pengaturan Buka Kelas Thn Ajaran : <?php echo $tahun->tahun_ajaran?></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li class="active">Pengaturan Buka Kelas Thn Ajaran : <?php echo $tahun->tahun_ajaran?></li>
        </ol>
      </div>
    </div>
        
    <div class="contentpanel">
      


      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Pengaturan Buka Kelas Untuk Tahun Ajaran : <?php echo $tahun->tahun_ajaran?></h3>
          <p>
        Menu ini digunakan untuk melakukan pengaturan kelas-kelas yang digunakan pada tahun ajaran <?php echo $tahun->tahun_ajaran?>
          </p>
        </div>
        
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                <th style="width:10%;">#</th>
                <th style="width:20%;">Unit</th>
                <th style="width:20%;"></th>
              </thead>
              <tbody>
                                    <?php $no = 1; foreach ($ls_unit as $unit): ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $unit->unit; ?></td>
                                            <td>
                                               <a href="<?php echo base_url(); ?>setting/buka_kelas/list_buka/<?php echo $unit->id_unit; ?>">
                                               Buka Kelas</a>
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
