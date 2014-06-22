    <div class="pageheader">
      <h2><i class="fa fa-group"></i>Pengaturan Buka Kelas Thn Ajaran : <?php echo $tahun->tahun_ajaran?></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>setting/buka_kelas">Manage Kelas</a></li>
          <li><a href="<?php echo base_url();?>setting/buka_kelas/list_buka/<?php echo $unit->id_unit?>">
            Pengaturan Buka Kelas <?php echo $unit->unit ?> Thn Ajaran : <?php echo $tahun->tahun_ajaran ?></a></li>
          <li class="active">Buka Kelas</li>
        </ol>
      </div>
    </div>
        
    <div class="contentpanel">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="#" class="panel-close">&times;</a>
            <a href="#" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">Buka Kelas Baru <?php echo $unit->unit ?> Thn Ajaran : <?php echo $tahun->tahun_ajaran?></h4>
          <p>Buka Kelas Baru</p>
        </div>
        <form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>setting/buka_kelas/add_process">

        <input type="hidden" name="id_unit" value="<?php echo $unit->id_unit ?>">

        <div class="panel-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                <th style="width:10%;">#</th>
                <th style="width:20%;">Kelas</th>
                <th style="width:20%;">Tingkat</th>
              </thead>
              <tbody>
                                    <?php foreach ($kelass as $kelas): ?>
                                        <tr>
                                            <td><input name="chkbox<?php echo $kelas->id ?>[check]" type="checkbox"></td>
                                            <input type="hidden" name="chkbox<?php echo $kelas->id ?>[id_kelas]" value="<?php echo $kelas->id ?>">
                                            <input type="hidden" name="chkbox<?php echo $kelas->id ?>[tahun_ajaran]" value="<?php echo $tahun->tahun_ajaran ?>">
                                            <input type="hidden" name="chkbox<?php echo $kelas->id ?>[id_unit]" value="<?php echo $unit->id_unit ?>">
                                            <td><?php echo $kelas->kelas; ?></td>
                                            <td><?php echo $kelas->tingkat; ?></td>
                                        </tr>
                                    <?php endforeach ; ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->
          <br><br>
        <div class="panel-footer">
             <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                  <button class="btn btn-danger">Buka</button>&nbsp;
                  <button class="btn btn-default">Cancel</button>
                </div>
             </div>
          </div><!-- panel-footer -->
          </form>
        
      </div><!-- panel -->      
    </div><!-- contentpanel -->
    
<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/retina.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>

<script src="<?php echo base_url();?>bracket/js/jquery.autogrow-textarea.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap-fileupload.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.tagsinput.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>bracket/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/dropzone.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/colorpicker.js"></script>

<script src="<?php echo base_url();?>bracket/js/jquery.validate.min.js"></script>

<script src="<?php echo base_url();?>bracket/js/custom.js"></script>

<script type="text/javascript">
jQuery("#sasPanel").validate({
  messages: {
    menu_name : "Menu Name is required.",
    menu_url : "Menu Url is required.",    
    menu_order : "Menu Order is required.",
    menu_icon : "Menu icon is required."
  },
    highlight: function(element) {
      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    }  
});
</script>


<script>
jQuery(document).ready(function(){
    
  // Chosen Select
  jQuery(".chosen-select").chosen({'width':'100%','white-space':'nowrap'});
  
  // Tags Input
  jQuery('#tags').tagsInput({width:'auto'});
   
  // Textarea Autogrow
  jQuery('#autoResizeTA').autogrow();
  
  // Color Picker
  if(jQuery('#colorpicker').length > 0) {
     jQuery('#colorSelector').ColorPicker({
            onShow: function (colpkr) {
                jQuery(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                jQuery(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                jQuery('#colorSelector span').css('backgroundColor', '#' + hex);
                jQuery('#colorpicker').val('#'+hex);
            }
     });
  }
  
  // Color Picker Flat Mode
    jQuery('#colorpickerholder').ColorPicker({
        flat: true,
        onChange: function (hsb, hex, rgb) {
            jQuery('#colorpicker3').val('#'+hex);
        }
    });
   
  // Date Picker
  jQuery('#datepicker').datepicker();
  
  jQuery('#datepicker-inline').datepicker();
  
  jQuery('#datepicker-multiple').datepicker({
    numberOfMonths: 3,
    showButtonPanel: true
  });
  
  // Spinner
  var spinner = jQuery('#spinner').spinner();
  spinner.spinner('value', 0);
  
  // Input Masks
  jQuery("#date").mask("99/99/9999");
  jQuery("#phone").mask("(999) 999-9999");
  jQuery("#ssn").mask("999-99-9999");
  
  // Time Picker
  jQuery('#timepicker').timepicker({defaultTIme: false});
  jQuery('#timepicker2').timepicker({showMeridian: false});
  jQuery('#timepicker3').timepicker({minuteStep: 15});

  
});
</script>
