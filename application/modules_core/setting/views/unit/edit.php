    <div class="pageheader">
      <h2><i class="fa fa-group"></i> Manage Portal</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>setting/unit">Manage Unit</a></li>
          <li class="active">Setup Unit</li>
        </ol>
      </div>
    </div>

    <form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>setting/unit/edit_process" enctype="multipart/form-data">
    
    <div class="contentpanel">

      <?php if ($message != null ) : ?>
      <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message; ?>
        </div>
      <?php endif ; ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="#" class="panel-close">&times;</a>
            <a href="#" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">Setup Unit</h4>
          <p>Please give Tahun Ajaran information</p>
        </div>
        <div class="panel-body panel-body-nopadding">
          
           <div class="form-group">
              <label class="col-sm-3 control-label">ID Unit *</label>
              <div class="col-sm-2">
                <input disabled class="form-control" maxlength="9" type="type" value="<?php echo $result->id_unit; ?>" required />
                <input name="id_unit" class="form-control" maxlength="9" type="hidden" value="<?php echo $result->id_unit; ?>" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Parent</label>
              <div class="col-sm-4">
              <select class="form-control input-sm mb15" name="id_parent">
                 <option value="">-- SELECT --</option>
                    <?php foreach ($rs_parent as $data) : ?>
                        <option <?php if($result->id_parent==$data->id_unit){ echo "selected='selected'";}?>
                        value="<?php echo $data->id_unit; ?>"><?php echo $data->id_unit." | ".$data->unit; ?></option>
                    <?php endforeach ; ?>
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Nama Unit *</label>
              <div class="col-sm-4">
                <input name="unit" type="text" class="form-control" maxlength="50" value="<?php echo $result->unit;?>" required/>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-3 control-label">Kategori *</label>
              <div class="col-sm-3">
                <select class="form-control input-sm mb15" name="kategori" required>
                    <option value="">-- SELECT --</option>
                    <option <?php if($result->kategori=="AKADEMIS"){ echo "selected='selected'";}?> value="AKADEMIS">AKADEMIS</option>
                    <option <?php if($result->kategori=="NON AKADEMIS"){ echo "selected='selected'";}?> value="NON AKADEMIS">NON AKADEMIS</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Jenjang *</label>
              <div class="col-sm-1">
                <input name="jenjang" type="text" class="form-control" maxlength="1" value="<?php echo $result->jenjang;?>" required/>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-3 control-label">Logo</label>
              <div class="col-sm-7">
                 <input name="unitfile" class="form-control"  class="span5" type="file" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Kepala Unit</label>
              <div class="col-sm-4">
              <select class="form-control input-sm mb15" name="nama_kepala">
                 <option value="">-- SELECT --</option>
                    <?php foreach ($rs_kepala as $data) : ?>
                        <option <?php if($result->nama_kepala==$data->nik){ echo "selected='selected'";}?>
                        value="<?php echo $data->nik; ?>"><?php echo $data->nama_lengkap; ?></option>
                    <?php endforeach ; ?>
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">No. Registrasi</label>
              <div class="col-sm-3">
                <input name="no_registrasi" type="text" class="form-control" maxlength="10" value="<?php echo $result->no_registrasi;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">No. Telpon</label>
              <div class="col-sm-3">
                <input name="no_telpon" type="text" class="form-control" maxlength="15" value="<?php echo $result->no_telpon;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-4">
                <input name="email" type="text" class="form-control" maxlength="50" value="<?php echo $result->email;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Alamat</label>
              <div class="col-sm-4">
                <input name="alamat" type="text" class="form-control" maxlength="50" value="<?php echo $result->alamat;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Kota</label>
              <div class="col-sm-3">
                <input name="kota" type="text" class="form-control" maxlength="30" value="<?php echo $result->kota;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Kecamatan</label>
              <div class="col-sm-3">
                <input name="kecamatan" type="text" class="form-control" maxlength="30" value="<?php echo $result->kecamatan;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Kelurahan</label>
              <div class="col-sm-3">
                <input name="kelurahan" type="text" class="form-control" maxlength="30" value="<?php echo $result->kelurahan;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">No. Fax</label>
              <div class="col-sm-3">
                <input name="no_fax" type="text" class="form-control" maxlength="15" value="<?php echo $result->no_fax;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Website</label>
              <div class="col-sm-4">
                <input name="website" type="text" class="form-control" maxlength="50" value="<?php echo $result->website;?>"/>
              </div>
            </div>

        </div><!-- panel-body -->
        
        <div class="panel-footer">
             <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                  <button class="btn btn-primary">Submit</button>&nbsp;
                  <button class="btn btn-default" onclick="history.go(-1);">Cancel</button>
                </div>
             </div>
        </div><!-- panel-footer -->

        
      </div><!-- panel -->            
    </div><!-- contentpanel -->

          </form>
 


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

<script src="<?php echo base_url();?>bracket/js/wysihtml5-0.3.0.min.js"></script> 
<script src="<?php echo base_url();?>bracket/js/bootstrap-wysihtml5.js"></script> 
<script src="<?php echo base_url();?>bracket/js/ckeditor/ckeditor.js"></script> 
<script src="<?php echo base_url();?>bracket/js/ckeditor/adapters/jquery.js"></script> 

<script src="<?php echo base_url();?>bracket/js/jquery.validate.min.js"></script>

<script src="<?php echo base_url();?>bracket/js/custom.js"></script>

<script type="text/javascript">
jQuery("#sasPanel").validate({
  messages: {
    id_unit : "ID Unit is required.",
    unit : "Unit is required.",    
    jenjang : "Jenjang is required."
    kategori: "Kategori is required."
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
  jQuery('#datepicker_mulai').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altField: '#h_mulai' ,
      altFormat: 'yy-mm-dd'
    });

  jQuery('#datepicker_akhir').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altField: '#h_akhir' ,
      altFormat: 'yy-mm-dd'
    });
  
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

  // HTML5 WYSIWYG Editor
  jQuery('#wysiwyg').wysihtml5({color:true,html:true});
  
  // CKEditor
  jQuery('#ckeditor').ckeditor();
  
});
</script>


