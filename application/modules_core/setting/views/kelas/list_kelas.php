    <div class="pageheader">
      <h2><i class="fa fa-group"></i> Manage Kelas </h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>setting/extrakurikuler">Manage Kelas</a></li>
          <li class="active">Manage untuk Kelas <?php echo $unit->unit ?> </li>
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

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Manage Kelas dalam Unit <?php echo $unit->unit ?></h3>
          <p>
        Don't Touch this data unless you're confident. <br><br>
	            <a href="<?php echo base_url(); ?>setting/kelas/add/<?php echo $unit->id_unit; ?>" data-title="Add Data" class="tip"><i class="fa fa-plus"></i> Add new kelas</a>
          </p>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                <th style="width:10%;">#</th>
                <th style="width:20%;">Kelas</th>
                <th style="width:20%;">Tingkat</th>
                <th style="width:20%;"></th>
              </thead>
              <tbody>
                                    <?php $no = 1; foreach ($kelass as $kelas): ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $kelas->kelas; ?></td>
                                            <td><?php echo $kelas->tingkat; ?></td>
                                            <td>
                                               <a href="<?php echo base_url(); ?>setting/kelas/edit/<?php echo $unit->id_unit; ?>/<?php echo $kelas->id; ?>">
                                                <i class="fa fa-pencil"></i></a>
                                                &nbsp;&nbsp;
                                               <a href="<?php echo base_url(); ?>setting/kelas/delete/<?php echo $unit->id_unit; ?>/<?php echo $kelas->id; ?>">
                                                <i class="fa fa-trash-o"></i></a>                                            
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
