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
      
      <div class="panel panel-default" id="studentPay">
        <div class="panel-heading">
          <h3 class="panel-title">Students</h3>
		  <p class="text-muted">Showing 15 students of 15 students</p> 		  
        </div>
		<div class="panel-heading select-students-container">
		<form id="pembayaran" novalidate="novalidate">
			<div class="form-group">
				<div class="col-sm-2">
				  <input type="text" name="grades[tahun-ajaran]" value="2014/2015" class="form-control" disabled="">
				</div>
			</div>		
			<div class="col-sm-4">
			<select class="form-control input-sm mb15" required>
				<option>SPP</option>
				<option>Extrakulikuler</option>
				<option>Seragam</option>
				<option>dsb..</option>				
			</select>				
			</div>
			<div class="col-sm-6">
				<input type="text" placeholder="Nomor Induk Siswa" title="" data-toggle="tooltip" data-trigger="hover" class="nis form-control tooltips" data-original-title="Masukkan NIS" required>				
			</div>	
			<div class="col-sm-2">
				<button class="btn btn-warning btn-cari-bayar">Cari</button>
			</div>		
		</form>	
		</div>         
        <div class="panel-body">
            
            <div class="pull-right col-md-2">
                <div class="btn-group mr10">
	                <h4 class="panel-title">&nbsp;</h4>
				</div>
                                            
            </div><!-- pull-right --> 
                                    
            <div class="pull-right col-md-9">
                <div class="btn-group mr10">
					<h4 class="panel-title title-pembayaran">Jenis Pembayaran Terutang</h4>
               </div>
                                            
            </div><!-- pull-right -->                       
            
            <div class="ckbox ckbox-success check-all">
                <input type="checkbox" id="checkboxAll">
                <label for="checkboxAll"></label>
            </div>
            
            <div class="students-title-grades">
              
            </div>
            
            <div class="table-responsive">
                <table id="studentListPay" class="table table-grades table-email">
                  <tbody>
                  </tbody>
                </table>
            </div><!-- table-responsive -->
            
        </div><!-- panel-body -->
		<div class="panel-footer pay-all" style="display: none;">
            <button class="btn btn-large btn-success">Pay All !</button>
		</div>		      
      </div><!-- panel -->
        
    </div><!-- contentpanel -->

<div class="modal fade" id="paymentMethod" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Payment Method</h4>
      </div>
      <div class="modal-body">
      	<div class="form-group has-error">
		  <div class="radio"><label><input name="payment-method" type="radio" value="cash" required> Cash</label></div>
		  <div class="radio"><label><input name="payment-method" type="radio" value="bank" required> Bank</label></div>
      	</div>
      	<div class="banks" style="display:none;">
			<div class="form-group">
				<label class="col-sm-3 control-label select-bank">Select Bank</label>
				<div class="col-sm-3">
					<select class="form-control input-sm mb15">
	                  <option>BCA</option>
	                  <option>Mandiri</option>
	                  <option>BRI</option>
	                </select>			
				</div>
			</div>
			<div class="form-group">
              <label class="col-sm-3 control-label">Bank Account Number <span class="asterisk">*</span></label>
              <div class="col-sm-9">
                <input type="text" name="name" class="form-control" placeholder="type bank account number..." required>
              </div>
            </div>	
			<div class="form-group">
              <label class="col-sm-3 control-label">Account Name <span class="asterisk">*</span></label>
              <div class="col-sm-9">
                <input type="text" name="name" class="form-control" placeholder="account name..." required>
              </div>
            </div>	            		
      	</div>      	
      </div>
      <div class="modal-footer" style="display:none;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Pay !</button>
      </div>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div>
    
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
<script src="<?php echo base_url()?>bracket/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/custom.js"></script>
<script>
  jQuery(document).ready(function() {

	$('input:checkbox[name="payment"]').change(
    function(){
        if ($('input:checkbox[name="payment"]').is(':checked')) {
			$('.actions-button').css('display','block');
        }
        else{
			$('.actions-button').css('display','none');
        }
    });	

	$('input:radio[name="payment-method"]').click(function() {
	    $(".modal-footer").toggle(this.checked);
	});
		
	$('input:radio[name="payment-method"]').change(
    function(){
        if ($(this).is(':checked')&& $(this).val() == 'bank') {
			$('.banks').css('display','block');
        }
        else{
			$('.banks').css('display','none');
        }
    });
	  
  });
</script>
<script>  
  // Basic Form
  jQuery("#pembayaran").validate({
    highlight: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    success: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-error');
    }
  });  
  
  $('#pembayaran').on('click', '.btn-cari-bayar', function(){
      var $valid = jQuery('#pembayaran').valid();
      if(!$valid) {
        return false;
      }	
      else
      {
      	var nis = $('.nis').val();
		  $('#studentListPay > tbody:first').append(
                    '<tr class="student-row">'+
                    '<td>'+
                    '<div class="ckbox ckbox-success">'+
					'<input class="checkboxStud" type="checkbox" id="checkbox1">'+
					'<label for="checkbox1"></label>'+
					'</div>'+
                    '</td>'+
                    '<td>'+
					'<div class="media">'+
					'<div class="media-body">'+
					'<button class="pull-right btn btn-large btn-success btn-pay" data-toggle="modal" data-target="#paymentMethod">Pay</button>'+
					'<h5 class="text-default">Juli 2014</h5>'+
					'</div>'+
					'</div>'+
					'</td>'+
					'</tr>'
			);
			return false;
      }  
  });
</script>
<script>
jQuery(document).ready(function(){

    //Check
    jQuery('.ckbox input').click(function(){
        var t = jQuery(this);
        if(t.is(':checked')){
            t.closest('tr').addClass('selected');
        } else {
            t.closest('tr').removeClass('selected');
        }
    });
        
    $('#studentPay').on('click', '#checkboxAll', function(){
        if(this.checked) { // check select status
            $('.checkboxStud').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
                $(this).closest('tr').addClass('selected');
                $('.pay-all').css('display', 'block');
            });
        }else{
            $('.checkboxStud').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                $(this).closest('tr').removeClass('selected');                
                $('.pay-all').css('display', 'none');
            });         
        }
    });   
    
});
</script>



