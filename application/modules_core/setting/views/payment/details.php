<form method="POST" action="<?php echo base_url(); ?>setting/payment/payment_process">
    <div class="contentpanel">

      <?php if ($message != null ) : ?>
      <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Well done!</strong>   <?php echo $message; ?>
        </div>
      <?php endif ; ?>
      
      <div class="panel panel-default">
        <div class="panel-heading">
	      	<font size="+1"><div style="float:left;width:50%;">
	      	Payment Details for: <strong><?php echo @$r_student->nama_lengkap; ?> (<?php echo @$r_student->nis; ?>)</strong>
	      	</div>
  			<div style="float:right;width:50%;text-align:right;">
  			Tahun Ajaran: <strong><?php echo @$r_ta->tahun_ajaran; ?></strong>
  			</div></font>
        </div>

        <input type="hidden" name="nis" value="<?php echo $r_student->nis; ?>">
        <input type="hidden" name="nama_lengkap" value="<?php echo $r_student->nama_lengkap; ?>">

        <div class="panel-body">
          <div class="table-responsive payment">
            <table class="table table-hover payment-details" id="table1">
                <thead>
                    <tr>
                    <th style="width:5%;"><div class="ckbox ckbox-success"><input type="checkbox" id="checkAll" onchange="totalchange()"><label for="checkAll"></label></div></th>	
	                <th style="width:5%;">#</th>
	                <th style="width:20%;">Type</th>
	                <th style="width:17%;">Cost</th>
	                <th style="width:17%;">Scholarship</th>
	                <th class="right" style="width:16%;">Fines</th>	                
	                <th class="right" style="width:20%;">Amount to Pay</th>                	                
                    </tr>
                </thead>
                <tbody>
                <?php $total=0; $no = 1; foreach ($rs_invoices as $invo) :?>
                	<tr class="gradeA odd">
                		<input type="hidden" name="<?php echo $no;?>[invoice_id]" value="<?php echo $invo->invoice_id; ?>">
                		<input type="hidden" name="<?php echo $no;?>[invoice_item_id]" value="<?php echo $invo->id; ?>">
                		<input type="hidden" name="<?php echo $no;?>[item_type_id]" value="<?php echo $invo->item_type_id; ?>">
                		<input type="hidden" name="<?php echo $no;?>[item_name]" value="<?php echo $invo->item_name; ?>">
						<td class="">
							<div class="ckbox ckbox-success">
								<input id="<?php echo $no;?>[pay_check]" name="<?php echo $no;?>[pay_check]" class="check-pay" type="checkbox" onchange="totalchange()">
								<label for="<?php echo $no;?>[pay_check]"></label>
							</div>
						</td>		
	                    <td class="id sorting_1"><?php echo $no; ?></td>
	                    <td class="">
	                    	<?php echo $invo->item_name; ?>
	                    	<?php if(!empty($invo->bulan)){echo "(".$invo->bulan.")";} ?>
	                    </td>
	                    <td class="">Rp 
	                    	<input class="amount-price" id="<?php echo $no;?>[amount]"
	                    	readonly="true" type="text" name="<?php echo $no;?>[amount]" value="<?php echo number_format($invo->amount-$invo->paid,0,',','.'); ?>" />
	                    </td>
	                    <td class="">Rp 
	                    	<input class="amount-price" id="<?php echo $no;?>[scholarship]" 
	                    	readonly="true" type="text" name="<?php echo $no;?>[scholarship]" value="<?php echo number_format($invo->scholarship,0,',','.'); ?>" />
	                    </td>                    
	                    <td class="price">
	                    <?php $denda=0; if($invo->item_type_id==2){ ?>
	                    	Rp
	                    	<input class="amount-price" type="text" placeholder="total fines" name="<?php echo $no;?>[fines]" 
	                    	onchange="fineschange(<?php echo $no;?>)" id="<?php echo $no;?>[fines]"
	                    	value="<?php $denda=$invo->fines*$invo->selisih;
	                    	if($invo->selisih>0){echo number_format($denda,0,',','.');}else{echo '0';} ?>">
	                    <?php }else{ ?>
	                    	<input type="hidden" name="<?php echo $no;?>[fines]" id="<?php echo $no;?>[fines]"
	                    	value="<?php $denda=$invo->fines*$invo->selisih;
	                    	if($invo->selisih>0){echo number_format($denda,0,',','.');}else{echo '0';} ?>">
	                    <?php } ?>
	                    </td>
	                    <td class="price">Rp
	                    	<input class="amount-price" type="text" name="<?php echo $no;?>[jumlah]" onchange="dppchange('<?php echo $no;?>')" 
	                    	<?php if($invo->item_type_id!=1){ ?> readonly="true" <?php }else{ ?> onchange="totalchange()" <?php } ?>
	                    	id="<?php echo $no;?>[jumlah]" value="<?php $total=$total+($invo->amount-$invo->scholarship+$denda);
	                    	echo number_format($invo->amount-$invo->scholarship+$denda-$invo->paid,0,',','.'); ?>" />
	                    </td>                   
					</tr>
                <?php $no++; endforeach; ?>		
                </tbody>
                <tfoot>
					<tr class="gradeA odd">
	                    <td class="totals" colspan="6">Total</td>
	                    <td class="totals-value price">Rp
	                    <input class="amount-price" readonly="true" type="text" name="total" id="total"
	                    value="0<?php //echo number_format($total,0,',','.'); ?>" /></td>	                    
					</tr>															
				</tfoot>
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
      	<div class="text"><label>Payer Name : <input name="payer_name" type="text" value="" required></label></div>
      	<div class="form-group has-error">
		  <div class="radio"><label><input id="pay_cash" name="payment_method" type="radio" value="1" required onchange="pay_option()"> Cash</label></div>
		  <div class="radio"><label><input id="pay_bank" name="payment_method" type="radio" value="2" required onchange="pay_option()"> Bank</label></div>
      	</div>
      	<div class="banks" style="display:none;">
			<div class="form-group">
				<label class="col-sm-3 control-label select-bank">Select Bank</label>
				<div class="col-sm-3">
					<select class="form-control input-sm mb15" name="department" id="department" >
	                	<option value=""> - Pilih BANK - </option>
	                <?php foreach ($rs_bank as $bank): ?>
	               		<option value="<?php echo $bank->name;?>"><?php echo $bank->name;?></option>
	            	<?php endforeach; ?>
	                </select>			
				</div>
			</div>
			<div class="form-group">
              <label class="col-sm-3 control-label">Bank Account Number <span class="asterisk">*</span></label>
              <div class="col-sm-9">
                <input id="rekening" type="text" name="rekening" class="form-control" placeholder="type bank account number..." >
              </div>
            </div>	
			<div class="form-group">
              <label class="col-sm-3 control-label">Account Name <span class="asterisk">*</span></label>
              <div class="col-sm-9">
                <input id="atas_nama" type="text" name="atas_nama" class="form-control" placeholder="account name..." >
              </div>
            </div>	            		
      	</div>      	
      </div>
      <div class="modal-footer" style="display:none;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-primary" value='Pay Now!' />
      </div>
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div>
</form>

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
  	//checkall
    $('#table1').on('click', '#checkAll', function(){
        if(this.checked) { // check select status
            $('.check-pay').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
                $(this).closest('tr').addClass('selected');
                $('.actions-button').css('display', 'block');
            });
        }else{
            $('.check-pay').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                $(this).closest('tr').removeClass('selected');                
                $('.actions-button').css('display', 'none');
            });         
        }
        totalchange();
    });
      	
    //Check
    $('.ckbox input').click(function(){
        var t = $(this);
        if(t.is(':checked')){
            t.closest('tr').addClass('selected');
        } else {
            t.closest('tr').removeClass('selected');
        }
    });

	$('input.check-pay').change(
    function(){
        if ($('input.check-pay').is(':checked')) {
			$('.actions-button').css('display','block');
        }
        else{
			$('.actions-button').css('display','none');
        }
    });	

	$('input.check-pay').click(function() {
	    $(".modal-footer").toggle(this.checked);
	});

	$('#checkAll').click(function() {
	    $(".modal-footer").toggle(this.checked);
	});	
		
	$('input:radio[name="payment_method"]').change(
    function(){
        if ($(this).is(':checked')&& $(this).val() == '2') {
			$('.banks').css('display','block');
        }
        else{
			$('.banks').css('display','none');
        }
    });
	  
  });
</script>
<script>
	function totalchange(){
		var cost,scholar,fine,jmlh,ttl = 0;
		var pc,ac,as,af,aj = '';
		for (i = 1; i < <?php echo $no; ?>; i++) {
			pc=i+'[pay_check]';
			if(document.getElementById(pc).checked){

	    		aj=i+'[jumlah]';
				jmlh = document.getElementById(aj).value;
	    		jmlh = Number(jmlh.replace(/\D/g,''));
	    		document.getElementById(aj).value = jmlh.formatMoney(0, ',', '.');

	    	}else{jmlh=0;}
			ttl=ttl+jmlh;			
		}
		//alert(ttl);
		document.getElementById('total').value = ttl.formatMoney(0, ',', '.');
	}

	function fineschange(no){
		var ac,as,af,aj='';
		var cost,scholar,fine,jmlh=0;

		ac=no+'[amount]';
		cost = document.getElementById(ac).value;
		cost = Number(cost.replace(/\D/g,''));
		
		as=no+'[scholarship]';
		scholar = document.getElementById(as).value;			
		scholar = Number(scholar.replace(/\D/g,''));
		
		af=no+'[fines]';
		fine = document.getElementById(af).value;
		fine = Number(fine.replace(/\D/g,''));
		document.getElementById(af).value=fine.formatMoney(0, ',', '.');

		aj=no+'[jumlah]';
		jmlh = document.getElementById(aj).value;
		jmlh = Number(jmlh.replace(/\D/g,''));

		document.getElementById(aj).value=(cost-scholar+fine).formatMoney(0, ',', '.');
		totalchange();
	}

	function dppchange(no){
		var ac,as,af,aj='';
		var cost,scholar,fine,jmlh=0;

		ac=no+'[amount]';
		cost = document.getElementById(ac).value;
		cost = Number(cost.replace(/\D/g,''));
		
		as=no+'[scholarship]';
		scholar = document.getElementById(as).value;			
		scholar = Number(scholar.replace(/\D/g,''));
		
		af=no+'[fines]';
		fine = document.getElementById(af).value;
		fine = Number(fine.replace(/\D/g,''));

		aj=no+'[jumlah]';
		jmlh = document.getElementById(aj).value;
		jmlh = Number(jmlh.replace(/\D/g,''));

		if(jmlh>cost-scholar+fine){
			alert("amount to pay can't more than calculation of DPP amount");
			document.getElementById(aj).value=(cost-scholar+fine).formatMoney(0, ',', '.');
		}else{
			document.getElementById(aj).value=jmlh.formatMoney(0, ',', '.');
		}
		totalchange();
	}

	function pay_option(){
		if(document.getElementById('pay_bank').checked) {
  			$("#department").attr('required', '');
  			$("#rekening").attr('required', '');
  			$("#atas_nama").attr('required', '');
		}else{
			$("#department").removeAttr('required');
			$("#rekening").removeAttr('required');
			$("#atas_nama").removeAttr('required');
		}
	}

	Number.prototype.formatMoney = function(c, d, t){
	var n = this, 
	    c = isNaN(c = Math.abs(c)) ? 2 : c, 
	    d = d == undefined ? "." : d, 
	    t = t == undefined ? "," : t, 
	    s = n < 0 ? "-" : "", 
	    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
	    j = (j = i.length) > 3 ? j % 3 : 0;
	   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	 };
</script>