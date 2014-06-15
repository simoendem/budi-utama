    <div class="pageheader">
      <h2><i class="fa fa-group"></i> Manage Portal</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>setting/unit">Manage Guru & Karyawan</a></li>
          <li class="active">Setup Guru & Karyawan</li>
        </ol>
      </div>
    </div>

    <form id="sasPanel" class="form-horizontal form-bordered" method="POST" action="<?php echo base_url(); ?>setting/guru_karyawan/edit_process" enctype="multipart/form-data">
    
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
          <h4 class="panel-title">Setup Guru & Karyawan</h4>
          <p>Please give Guru & Karyawan information</p>
        </div>
        <div class="panel-body panel-body-nopadding">
          
           <div class="form-group">
              <label class="col-sm-3 control-label">NIK *</label>
              <div class="col-sm-2">
                <input class="form-control" maxlength="20" type="text" value="<?php echo $result->nik; ?>" disabled/>
                <input name="nik" class="form-control" maxlength="20" type="hidden" value="<?php echo $result->nik; ?>" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Nama Lengkap *</label>
              <div class="col-sm-4">
                <input name="nama_lengkap" class="form-control" maxlength="50" type="text" value="<?php echo  $result->nama_lengkap; ?>" required />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Nama Panggilan</label>
              <div class="col-sm-2">
                <input name="nama_panggilan" class="form-control" maxlength="20" type="text" value="<?php echo  $result->nama_panggilan; ?>" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Jenis Kelamin *</label>
              <div class="col-sm-2">
                <select class="form-control input-sm mb15" name="jenis_kelamin" required>
                    <option value="">-- SELECT --</option>
                    <option value="L" <?php if($result->jenis_kelamin=="L"){ echo "selected='selected'"; }?> >Laki-Laki</option>
                    <option value="P" <?php if($result->jenis_kelamin=="P"){ echo "selected='selected'"; }?> >Perempuan</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Tempat Lahir</label>
              <div class="col-sm-3">
                <input name="tempat_lahir" type="text" class="form-control" maxlength="30" value="<?php echo  $result->tempat_lahir;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal Lahir</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" maxlength="10" placeholder="dd/mm/yyyy" id="datepicker_lahir"
                value="<?php echo date("d-m-Y",strtotime($result->tanggal_lahir));?>" />
                <input type="hidden" name="tanggal_lahir" id="h_lahir" value="<?php echo $result->tanggal_lahir; ?>">
                <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Agama</label>
              <div class="col-sm-2">
                <input name="agama" type="text" class="form-control" maxlength="15" value="<?php echo  $result->agama;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Kewarganegaraan *</label>
              <div class="col-sm-2">
                <select class="form-control input-sm mb15" name="warga_negara" required>
                    <option value="">-- SELECT --</option>
                    <option value="WNI" <?php if($result->warga_negara=="WNI"){ echo "selected='selected'"; }?> >WNI</option>
                    <option value="WNA" <?php if($result->warga_negara=="WNA"){ echo "selected='selected'"; }?> >WNA</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Telpon HP</label>
              <div class="col-sm-3">
                <input name="telpon_hp" type="text" class="form-control" maxlength="15" value="<?php echo $result->telpon_hp;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Telpon Rumah</label>
              <div class="col-sm-3">
                <input name="telpon_rumah" type="text" class="form-control" maxlength="15" value="<?php echo $result->telpon_rumah;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-4">
                <input name="email" type="text" class="form-control" maxlength="50" value="<?php echo $result->email;?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Jabatan</label>
              <div class="col-sm-2">
              <select class="form-control input-sm mb15" name="jabatan">
                 <option value="">-- SELECT --</option>
                  <!--
                    <?php foreach ($rs_jabatan as $data) : ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->jabatan; ?></option>
                    <?php endforeach ; ?>
                  -->
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Golongan</label>
              <div class="col-sm-2">
              <select class="form-control input-sm mb15" name="golongan">
                 <option value="">-- SELECT --</option>
                  <!--
                    <?php foreach ($rs_golongan as $data) : ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->golongan; ?></option>
                    <?php endforeach ; ?>
                  -->
              </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Foto</label>
              <div class="col-sm-7">
                 <input name="ugkfile" class="form-control"  class="span5" type="file" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal Mulai *</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" maxlength="10" placeholder="dd/mm/yyyy" id="datepicker_mulai" 
                value="<?php echo date("d-m-Y",strtotime($result->tgl_mulai));?>" />
                <input type="hidden" name="tgl_mulai" id="h_mulai" value="<?php echo $result->tgl_mulai;?>">
                <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Tanggal Keluar</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" maxlength="10" placeholder="dd/mm/yyyy" id="datepicker_keluar" 
                value="<?php echo date("d-m-Y",strtotime($result->tgl_keluar));?>"/>
                <input type="hidden" name="tgl_keluar" id="h_keluar" value="<?php echo $result->tgl_keluar;?>">
                <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Keterangan Keluar</label>
              <div class="col-sm-7 panel-body">
                <textarea name="keterangan_keluar" placeholder="Enter text here..." class="form-control" rows="10"><?php echo $result->keterangan_keluar; ?></textarea> 
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
    nik : "NIK is required.",
    nama_lengkap : "Nama Lengkap is required.",    
    jenis_kelamin : "Jenis Kelamin is required."
    warga_negara: "Kewarganegaraan is required."
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
  jQuery('#datepicker_lahir').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altField: '#h_lahir' ,
      altFormat: 'yy-mm-dd'
    });

  jQuery('#datepicker_mulai').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altField: '#h_mulai' ,
      altFormat: 'yy-mm-dd'
    });

  jQuery('#datepicker_keluar').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altField: '#h_keluar' ,
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
  
});
</script>


