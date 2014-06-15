

    <div class="pageheader">
      <h2><i class="fa fa-users"></i>Students</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li class="active">Students</li>
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
          <h3 class="panel-title">Students</h3>
          <p>
			  List of Budi Utama students.
          </p>
        </div>
        <div class="panel-body">
          <div class="table-responsive payment">
            <table class="table table-hover" id="table1">
                <thead>
                    <tr>
	                <th style="width:20%;"># ID</th>
	                <th style="width:40%;">Name</th>
	                <th style="width:20%;">Grade</th>
	                <th style="width:20%;">Status Monthly Payment</th>
                    </tr>
                </thead>

                <tbody>
					<tr class="gradeA odd" href="payment/details/09440">
	                    <td class="id sorting_1">090440</td>
	                    <td class=" ">Fendrik Prayogo</td>
	                    <td class=" ">Elementary School</td>
	                    <td class="center "><span class="label label-warning">2 days late</span></td>                    
					</tr>
					<tr class="gradeA even" href="payment/details/09441">
	                    <td class="id sorting_1">090441</td>
	                    <td class=" ">Raden Agoeng Bhimasta</td>
	                    <td class=" ">Elementary School</td>
	                    <td class="center "><span class="label label-warning">12 days late</span></td>	                    
					</tr>			
					<tr class="gradeA odd" href="payment/details/09442">
	                    <td class="id sorting_1">090442</td>
	                    <td class=" ">Simon Megadewandanu</td>
	                    <td class=" ">Kindergarten</td>
	                    <td class="center "><span class="label label-danger">1 month late</span>&nbsp; &nbsp;<span class="label label-default">May</span></td>	                    
					</tr>
					<tr class="gradeA even" href="payment/details/09443">
	                    <td class="id sorting_1">090443</td>
	                    <td class=" ">Albertus Satria Yudha</td>
	                    <td class=" ">Junior High School</td>
	                    <td class="center "><span class="label label-danger">1 month late</span>&nbsp; &nbsp;<span class="label label-default">May</span></td>	                    
					</tr>								
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
    jQuery('.payment tbody tr').click(function() {    
       window.open(jQuery(this).attr("href"),"payment-details", "width=960,height=600,scrollbars=yes");
    });
    // Chosen Select
    jQuery("select").chosen({
      'min-width': '100px',
      'white-space': 'nowrap',
      disable_search_threshold: 10
    });
    
  
  });
</script>


