    <div class="pageheader">
      <h2><i class="fa fa-money"></i> School Payment</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li class="active">School Payment</li>
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
          <h3 class="panel-title">School Payment</h3>
          <p>
			  List of Budi Utama students payments.
          </p>
        </div>

    <div class="panel-heading select-students-container">
    <form id="pembayaran" novalidate="novalidate" action="<?php echo base_url(); ?>setting/payment" method="POST">
      <div class="form-group">
        <div class="col-sm-2" style="padding-top:10px;">
          <font size="4">Tahun Ajaran <?php echo ucwords(strtolower($r_ta->status)); ?></font>
        </div>
        <div class="col-sm-2">
          <input type="text" name="tahun_ajaran" value="<?php echo $r_ta->tahun_ajaran; ?>" class="form-control" disabled="" style="text-align:center;">
          <input type="hidden" name="ta_id" value="<?php echo $r_ta->id; ?>">
        </div>
      </div>    
      <div class="col-sm-4">
      <select name="cost_type" class="form-control input-sm mb15" required>
        <option value="">-- SELECT --</option>
        <?php foreach ($rs_item_type as $data) : ?>
            <option value="<?php echo $data->id; ?>" <?php if(@$cost_type==$data->id){ echo "SELECTED='SELECTED'";} ?>><?php echo $data->name; ?></option>
        <?php endforeach ; ?>        
      </select>       
      </div>
      <div class="col-sm-6">
        <input type="text" name="nama_siswa" placeholder="Nomor Induk atau Nama Siswa" title="" value="<?php echo @$nama_siswa; ?>"
        data-toggle="tooltip" data-trigger="hover" class="nis form-control tooltips" data-original-title="Masukkan NIS" required>        
      </div>  
      <div class="col-sm-2">
        <button class="btn btn-warning btn-cari-bayar">Cari</button>
      </div>    
    </form> 
    </div>   


        <div class="panel-body">
          <div class="table-responsive payment" >
            <table class="table table-hover">
                <thead>
                    <tr>
	                <th style="width:10%;">NIS</th>
	                <th style="width:30%;">Name</th>
	                <th style="width:30%;">Grade</th>
                  <th style="width:10%;">Class</th>
	                <th style="width:20%;">Status Monthly Payment</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(!empty($rs_siswa)){ ?>
					        <?php $no = 1; foreach ($rs_siswa as $siswa): ?>
                      <tr>
                          <td><?php echo $siswa->nis; ?></td>
                          <td><?php echo $siswa->nama_lengkap; ?></td>
                          <td><?php echo $siswa->unit; ?></td>
                          <td><?php echo $siswa->id_kelas; ?><?php echo $siswa->selisih; ?></td>
                          <td class="center">
                            <?php 
                              if($siswa->selisih>0){ 
                              $x=floor($siswa->selisih/30);
                              if($x>0){
                            ?>
                              <span class="label label-danger"><?php echo $x; ?> month late</span>
                            <?php }else{ ?>
                              <span class="label label-danger"><?php echo $siswa->selisih; ?> day late</span>
                            <?php } ?>                         
                            &nbsp; <span class="label label-default"><?php echo $siswa->bulan; ?></span>
                            <?php }else{ ?>
                              not yet
                            <?php } ?>                            
                          </td>
                      </tr>
                  <?php $no++; endforeach ; ?>
                <?php }else{ ?>
                      <tr><td colspan="5" style="text-align:center"> - no data - </td></tr>
                <?php } ?>
<!--
          <tr class="gradeA odd" href="payment/details/09440">
	                    <td class="id sorting_1">090440</td>
	                    <td class=" ">Fendrik Prayogo</td>
	                    <td class=" ">Elementary School</td>
                      <td class=" ">1B</td>
	                    <td class="center "><span class="label label-warning">2 days late</span></td>                    
					</tr>
					<tr class="gradeA even" href="payment/details/09441">
	                    <td class="id sorting_1">090441</td>
	                    <td class=" ">Raden Agoeng Bhimasta</td>
	                    <td class=" ">Elementary School</td>
                      <td class=" ">1C</td>
	                    <td class="center "><span class="label label-warning">12 days late</span></td>	                    
					</tr>			
					<tr class="gradeA odd" href="payment/details/09442">
	                    <td class="id sorting_1">090442</td>
	                    <td class=" ">Simon Megadewandanu</td>
	                    <td class=" ">Kindergarten</td>
	                    <td class=" ">1D</td>
                      <td class="center "><span class="label label-danger">1 month late</span>&nbsp; &nbsp;<span class="label label-default">May</span></td>	                    
					</tr>
					<tr class="gradeA even" href="payment/details/09443">
	                    <td class="id sorting_1">090443</td>
	                    <td class=" ">Albertus Satria Yudha</td>
	                    <td class=" ">Junior High School</td>
	                    <td class=" ">2E</td>
                      <td class="center "><span class="label label-danger">1 month late</span>&nbsp; &nbsp;<span class="label label-default">May</span></td>	                    
					</tr>
-->								
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


