

    <div class="contentpanel">

      <?php if ($message != null ) : ?>
      <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Well done!</strong>   <?php echo $message; ?>
        </div>
      <?php endif ; ?>
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Payment Details : <?php echo $id_students?></h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive payment">
            <table class="table table-hover payment-details" id="table1">
                <thead>
                    <tr>
                    <th style="width:5%;"><div class="checkbox block"><label><input type="checkbox"></label></div></th>	
	                <th style="width:5%;">#</th>
	                <th style="width:15%;">Type</th>
	                <th class="right" style="width:20%%;">Cost</th>
	                <th class="right" style="width:15%;">Scholarship</th>
	                <th style="width:15%;">Fines</th>	                
	                <th class="right" style="width:25%;">Amounts</th>                	                
                    </tr>
                </thead>
				<tfoot>
					<tr class="gradeA odd">
	                    <td class="totals" colspan="6">Totals</td>
	                    <td class="totals-value price">Rp 850.000</td>	                    
					</tr>															
				</tfoot>
                <tbody>
					<tr class="gradeA odd">
						<td class=""><div class="checkbox block"><label><input name="payment" class="check-pay" type="checkbox"></label></div></td>		
	                    <td class="id sorting_1">1</td>
	                    <td class=" ">Juni Monthly Fees</td>
	                    <td class="price">Rp 500.000</td>
	                    <td class="price ">0</td>                    
	                    <td class=" "><input type="text" placeholder="total fines" class="pay-fines form-control"></td>
	                    <td class="price">Rp 500.000</td>                   
					</tr>								
					<tr class="gradeA even">
						<td class=""><div class="checkbox block"><label><input name="payment" class="check-pay" type="checkbox"></label></div></td>		
	                    <td class="id sorting_1">2</td>
	                    <td class=" ">Books</td>
	                    <td class="price">Rp 200.000</td>
	                    <td class="price ">0</td>                    
	                    <td class=" "><input type="text" placeholder="total fines" class="pay-fines form-control"></td>
	                    <td class="price">Rp 200.000</td>                   
					</tr>					
					<tr class="gradeA odd">
						<td class=""><div class="checkbox block"><label><input name="payment" class="check-pay" type="checkbox"></label></div></td>		
	                    <td class="id sorting_1">3</td>
	                    <td class=" ">Extracurriculare</td>
	                    <td class="price">Rp 150.000</td>
	                    <td class="price ">0</td>                    
	                    <td class=" "><input type="text" placeholder="total fines" class="pay-fines form-control"></td>
	                    <td class="price">Rp 150.000</td>                   
					</tr>					
                </tbody>


           </table>
          </div><!-- table-responsive -->
          <div class="clearfix mb30"></div>
        </div><!-- panel-body -->
		<div class="panel-footer actions-button" style="display:none;">
			<div class="row">
				<div class="col-sm-12 col-sm-offset-5">
					<button onclick="window.close();" class="btn btn-white btn-sm">Cancel</button>
					<button class="btn btn-success btn-sm" id="payThis" data-toggle="modal" data-target="#myModal">Proceed</button>                      
				</div>
			</div>
		</div>        
      </div><!-- panel -->
        
    </div><!-- contentpanel -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<!-- <script src="<?php echo base_url();?>bracket/js/custom.js"></script> -->
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


