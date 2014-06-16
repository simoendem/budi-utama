

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
      
    <div class="row">
        
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-btns">
                <a href="#" class="panel-close">&times;</a>
                <a href="#" class="minimize">&minus;</a>
              </div>
              <h4 class="panel-title">Students Registration</h4>
              <p><span class="asterisk">*</span> required</p>
            </div>
            <div class="panel-body panel-body-nopadding">
              
              <!-- BASIC WIZARD -->
              <div id="validationWizard" class="basic-wizard">
                
                <ul class="nav nav-pills nav-justified" id="form-regis-siswa">
                  <li class="info-siswa"><a href="#vtab1" data-toggle="tab"><span>Langkah 1:</span> Informasi Siswa</a></li>
                  <li class="asal-sekolah"><a href="#vtab2" data-toggle="tab"><span>Langkah 2:</span> Informasi Asal Sekolah</a></li>
                  <li class="info-wali"><a href="#vtab3" data-toggle="tab"><span>Langkah 3:</span> Informasi Wali</a></li>
                  <li class="prestasi"><a href="#vtab4" data-toggle="tab"><span>Langkah 4:</span> Prestasi Siswa</a></li>
                </ul>
                
                <form class="form" id="regisForm" action="">  
                <div class="tab-content">

                  <!--   Informasi Siswa   -->
                  <div class="tab-pane" id="vtab1">
					<div class="form-group">
					  <label class="col-sm-4 control-label">Jenjang Sekolah <span class="asterisk">*</span></label>
					  <div class="col-sm-3">
					    <select id="jenjangSekolah" class="form-control" required>
					     <option value="-1" selected="selected">Pilih jenjang sekolah</option>		                      					      
					    </select>
					    <label class="error" for="jenjangSekolah"></label>
					  </div>
					   <div class="col-sm-4">
					    <select id="jenjangKelas" class="form-control" required>
					      <option value="-1" selected="selected">Pilih jenjang kelas</option>		                      					      
					    </select>
					    <label class="error" for="jenjangKelas"></label>
					  </div>					  
					</div> 
                                       					
					<div class="form-group">
					  <label class="col-sm-4 control-label">Tahun Ajaran <span class="asterisk">*</span></label>
					  <div class="col-sm-3">
					    <select id="academicYear" class="form-control" required>
					      <option value="">Pilih salah satu</option>
					      <option value="2013/2014">2013/2014</option>
					      <option value="2013/2014">2014/2015</option>
					    </select>
					    <label class="error" for="academicYear"></label>
					  </div>
					</div>  					                     
                      
					  <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Lengkap <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" name="nama_lengkap" placeholder="nama lengkap siswa" class="form-control" required />
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Panggilan</label>
                        <div class="col-sm-4">
                          <input type="text" name="nama_panggilan" placeholder="nama panggilan" class="form-control" />
                        </div>
                      </div>                      
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Jenis Kelamin <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <div class="rdio rdio-primary">
                            <input type="radio" id="laki-laki" value="laki-laki" name="jk" required/>
                            <label for="laki-laki">Laki-laki</label>
                          </div>
                          <div class="rdio rdio-primary">
                            <input type="radio" value="wanita" id="wanita" name="jk"/>
                            <label for="wanita">Wanita</label>
                          </div>
                          <label class="error" for="jk"></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Tempat, Tanggal Lahir <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="tempat_lahir" placeholder="tempat lahir" class="form-control" required/>
                        </div>
                        <div class="col-sm-4">
                          <input type="text" placeholder="dd/mm/yyyy" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                        </div>
                      </div>  
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Anak ke <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
							<input type="text" placeholder="contoh: 1" name="child_number" class="form-control" required/>
                        </div>
                        
                        <div class="col-sm-4">
							<input type="text" placeholder="dari, contoh: 3" name="child_number_total" class="form-control" required/>
                        </div>   
                      </div>
                      
					   <div class="form-group">
		                  <label class="col-sm-4 control-label">Agama</label>
		                  <div class="col-sm-3">
		                    <select id="religion" class="form-control">
		                      <option value="">Pilih salah satu</option>
		                      <option value="islam">Islam</option>
		                      <option value="kristen">Kristen</option>
		                      <option value="katolik">Katolik</option>
		                      <option value="hindu">Hindu</option>
		                      <option value="budha">Budha</option>		                      
		                    </select>
		                  </div>
		                </div>                        
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Warga Negara <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <div class="rdio rdio-primary">
                            <input type="radio" id="ina" value="ina" name="warga_negara" required/>
                            <label for="ina">Indonesia</label>
                          </div>
                          <div class="rdio rdio-primary">
                            <input type="radio" value="foreign" id="foreign" name="warga_negara"/>
                            <label for="foreign">Warga Negara Asing</label>
                          </div>
                          <label class="error" for="warga_negara"></label>
                        </div>
                      </div>                        
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Alamat <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" name="alamat" placeholder="alamat tinggal siswa" class="form-control" required/>
                        </div>                       
                      </div>  
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Kota <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="kota" placeholder="kota tinggal siswa" class="form-control" required/>
                        </div>
                      </div>                        
                      
                      <div class="form-group">
					  	<label class="col-sm-4 control-label">Telepon / Handphone</label>
					   	<div class="col-sm-4">
					   		<div class="input-group">
						   	  <span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
							  <input type="text" placeholder="nomor telepon" id="telepon" class="form-control">
					   		</div>
					   	</div>
					   	<div class="col-sm-4">
					   		<div class="input-group">
						   		<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
						   		<input type="text" placeholder="nomor handphone" id="handphone" class="form-control">
					   		</div>
					   	</div>					   	
					  </div>  
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-4">
                          <input type="email" name="email" placeholder="e.g. budiutama@yahoo.com" class="form-control"/>
                        </div>
                      </div>                                                      
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Foto <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
							<div class="fallback">
								<input name="file" type="file" />
							</div>                         
                        </div>
                      </div>                         
                                          
                  </div>
				  <!--   End Informasi Siswa   -->
				  
				  <!-- Informasi Asal Sekolah -->
				  <div class="tab-pane" id="vtab2">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Ijazah</label>
                        <div class="col-sm-4">
                          <input type="text" placeholder="dd/mm/yyyy" name="tgl_ijazah" id="tglIjazah" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nomor Ijazah</label>
                        <div class="col-sm-4">
                          <input type="text" name="no_ijazah" class="form-control" />
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Sekolah Asal</label>
                        <div class="col-sm-6">
                          <input type="text" name="sekoalah_asal" class="form-control" />
                        </div>
                      </div> 				  
				  </div>
				  <!-- End Informasi Asal Sekolah -->
				  
				  <!--   Informasi Wali  -->
                  <div class="tab-pane" id="vtab3">                      
                                        
					  <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Lengkap Ayah <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" name="nama_lengkap_ayah" placeholder="nama lengkap ayah" class="form-control" required />
                        </div>
                      </div>
                      
					  <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Lengkap Ibu <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" name="nama_lengkap_ibu" placeholder="nama lengkap ibu" class="form-control" required />
                        </div>
                      </div>
                      
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Tempat, Tanggal Lahir Ayah</label>
                        <div class="col-sm-4">
                          <input type="text" name="tempat_lahir_ayah" placeholder="tempat lahir ayah" class="form-control"/>
                        </div>
                        <div class="col-sm-4">
                          <input type="text" placeholder="dd/mm/yyyy" name="tgl_lahir_ayah" id="tgl_lahir_ayah" class="form-control">
                        </div>
                      </div>                        
                      
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Tempat, Tanggal Lahir Ibu</label>
                        <div class="col-sm-4">
                          <input type="text" name="tempat_lahir" placeholder="tempat lahir ibu" class="form-control"/>
                        </div>
                        <div class="col-sm-4">
                          <input type="text" placeholder="dd/mm/yyyy" name="tgl_lahir_ibu" id="tgl_lahir_ibu" class="form-control">
                        </div>
                      </div>                        
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Alamat <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" name="alamat-wali" placeholder="alamat ayah/ibu" class="form-control" required/>
                        </div>                       
                      </div>  
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Kota <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" id="kota-wali" name="kota_p" placeholder="kota dari alamat ayah/ibu" class="form-control" required/>
                        </div>
                      </div>                                                      
                      
                      <div class="form-group">
					  	<label class="col-sm-4 control-label">Telepon / Handphone Ayah</label>
					   	<div class="col-sm-4">
					   		<div class="input-group">
						   		<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
							  <input type="text" name="telpon-ayah" placeholder="nomor telepon ayah" class="form-control">
					   		</div>
					   	</div>
					   	<div class="col-sm-4">
					   		<div class="input-group">
						   		<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
						   		<input type="text" name="hp-ayah" placeholder="nomor handphone ayah" class="form-control">
					   		</div>
					   	</div>					   	
					  </div> 					                      					   	
					  
                      <div class="form-group">
					  	<label class="col-sm-4 control-label">Telepon / Handphone Ibu</label>
					   	<div class="col-sm-4">
					   		<div class="input-group">
						   		<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
							  <input type="text" name="telepon-ibu" placeholder="nomor telepon ibu" class="form-control">
					   		</div>
					   	</div>
					   	<div class="col-sm-4">
					   		<div class="input-group">
						   		<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
						   		<input type="text" name="hp-ibu" placeholder="nomor handphone ibu" class="form-control">
					   		</div>
					   	</div>					   	
					  </div> 					                      					   						  
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Kewarganegaraan Ayah<span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <div class="rdio rdio-primary">
                            <input type="radio" value="Warga Negara Indonesia" id="wniAyah" name="wn-ayah"/>
                            <label for="wniAyah">Warga Negara Indonesia</label>
                          </div>
                          <div class="rdio rdio-primary">
                            <input type="radio" value="Warga Negara Asing" id="wnaAyah" name="wn-ayah"/>
                            <label for="wnaAyah">Warga Negara Asing</label>
                          </div>
                          <label class="error" for="wn-wali"></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Kewarganegaraan Ibu<span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <div class="rdio rdio-primary">
                            <input type="radio" value="Warga Negara Indonesia" id="wniIbu" name="wn-ibu"/>
                            <label for="wniIbu">Warga Negara Indonesia</label>
                          </div>
                          <div class="rdio rdio-primary">
                            <input type="radio" value="Warga Negara Asing" id="wnaIbu" name="wn-ibu"/>
                            <label for="wnaIbu">Warga Negara Ibu</label>
                          </div>
                          <label class="error" for="wn-wali"></label>
                        </div>
                      </div>      
                      
					  <div class="form-group">
		                  <label class="col-sm-4 control-label">Pekerjaan Ayah</label>
		                  <div class="col-sm-4">
			                  <input type="text" placeholder="pekerjaan ayah" name="pekerjaan-ayah" class="form-control">
		                  </div>
		              </div>            
		              
					  <div class="form-group">
		                  <label class="col-sm-4 control-label">Pekerjaan Ibu</label>
		                  <div class="col-sm-4">
			                  <input type="text" placeholder="pekerjaan ibu" name="pekerjaan-ibu" class="form-control">
		                  </div>
		              </div>            		              
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Penghasilan per bulan Ayah</label>
                        <div class="col-sm-7">
							<div class="input-group">
			                  <span class="input-group-addon">Rp</span>
			                  <input type="text" placeholder="Contoh : 3000000" id="penghasilan-ayah" name="penghasilan-ayah" class="form-control" required>
			                  <span class="input-group-addon">.00</span>
			                </div>
                        </div>
                      </div>                       		                                 
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Penghasilan per bulan Ibu</label>
                        <div class="col-sm-7">
							<div class="input-group">
			                  <span class="input-group-addon">Rp</span>
			                  <input type="text" placeholder="Contoh : 3000000" id="penghasilan-ibu" name="penghasilan-ibu" class="form-control" required>
			                  <span class="input-group-addon">.00</span>
			                </div>
                        </div>
                      </div>                       		                                 
                                
					  <hr/>
					  
					  <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Lengkap Wali</label>
                        <div class="col-sm-8">
                          <input type="text" name="nama_lengkap_ayah" placeholder="nama lengkap wali" class="form-control" required />
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Alamat Wali</label>
                        <div class="col-sm-8">
                          <input type="text" name="alamat-wali" placeholder="alamat wali" class="form-control" required/>
                        </div>                       
                      </div>                        
		              
                      <div class="form-group">
					  	<label class="col-sm-4 control-label">Telepon / Handphone Wali</label>
					   	<div class="col-sm-4">
					   		<div class="input-group">
						   		<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
							  <input type="text" name="telpon-ayah" placeholder="nomor telepon wali" class="form-control">
					   		</div>
					   	</div>
					   	<div class="col-sm-4">
					   		<div class="input-group">
						   		<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
						   		<input type="text" name="hp-ayah" placeholder="nomor handphone wali" class="form-control">
					   		</div>
					   	</div>					   	
					  </div> 
					  
					  <div class="form-group">
		                  <label class="col-sm-4 control-label">Pekerjaan Wali</label>
		                  <div class="col-sm-4">
			                  <input type="text" placeholder="pekerjaan wali" name="pekerjaan-wali" class="form-control">
		                  </div>
		              </div>   
		              
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Penghasilan per bulan Wali</label>
                        <div class="col-sm-7">
							<div class="input-group">
			                  <span class="input-group-addon">Rp</span>
			                  <input type="text" placeholder="Contoh : 3000000" id="penghasilan-wali" name="penghasilan-wali" class="form-control" required>
			                  <span class="input-group-addon">.00</span>
			                </div>
                        </div>
                      </div>                       		                                 		                					  					                      					   			                                
					                                            
                    <div class="clear-space"></div>                   
                  </div>
				  <!--  end Parent Info    -->
				  
                  <!-- Student Achievement -->
                  <div class="tab-pane" id="vtab4">
                      
					  <div class="form-group">
                        <label class="col-sm-4 control-label">Nama Prestasi</label>
                        <div class="col-sm-8">
                          <input type="text" placeholder="Contoh: Juara I Lomba Mewarnai" name="nama_prestasi" class="form-control" />
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="col-sm-4 control-label">Tingkat</label>
                        <div class="col-sm-4">
                          <input type="text" placeholder="Contoh : D.I.Y" name="tingkat_prestasi" class="form-control" />
                        </div>
                      </div>

					   <div class="form-group">
		                  <label class="col-sm-4 control-label">Jenis Prestasi</label>
		                  <div class="col-sm-3">
		                    <select id="jenis-prestasi" class="form-control">
		                      <option value="">Pilih salah satu</option>
		                      <option value="akademik">Akademik</option>
		                      <option value="non-akademik">Non Akademik</option>		                      
		                    </select>
		                  </div>
		                </div> 
                      
					  <div class="form-group">
                        <label class="col-sm-4 control-label">Tahun</label>
                        <div class="col-sm-4">
                          <input type="text" id="tahun_prestasi" name="tahun_prestasi" class="form-control" />
                        </div>
                      </div>    
                                       
                   <button type="submit" class="btn btn-success btn-lg btn-block submit-form-regis">Submit Form</button>    
                  </div>
                  
                </div><!-- tab-content -->
                <ul class="pager wizard">
                	<li class="previous"><a href="javascript:void(0)">Previous</a></li>
                	<li class="next"><a href="javascript:void(0)">Next</a></li>
				</ul>                
                </form>
                
              </div><!-- #validationWizard -->
              
            </div><!-- panel-body -->
          </div><!-- panel -->
        </div><!-- col-md-12 -->
        
                
    </div><!-- contentpanel -->
    
<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/retina.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>

<script src="<?php echo base_url();?>bracket/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.mask.min.js"></script>

<script src="<?php echo base_url()?>bracket/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/bootstrap-wizard.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/dropzone.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/custom.js"></script>
<script>
  jQuery(document).ready(function() {
    
	  // With Form Validation Wizard
/*
	  var $validator = jQuery("#regisForm").validate({
	    highlight: function(element) {
	      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
	    },
	    success: function(element) {
	      jQuery(element).closest('.form-group').removeClass('has-error');
	    }
	  });
*/
	  
	  jQuery('#validationWizard').bootstrapWizard({
	    tabClass: 'nav nav-pills nav-justified nav-disabled-click',
	    onTabClick: function(tab, navigation, index) {
	      return false;
	    },
	    onNext: function(tab, navigation, index) {
/*
	      var $valid = jQuery('#regisForm').valid();
	      if(!$valid) {
	        
	        $validator.focusInvalid();
	        return false;
	      }
*/
	      jQuery("html, body").animate({ scrollTop: 0 }, "slow");
	    }
	  });	
	  
	  jQuery("#tgl_lahir").mask("99/99/9999");
	  jQuery("#tgl_lahir_wali").mask("99/99/9999");
	  jQuery("#achievement_id").mask("9999");
	  jQuery("#tglIjazah").mask("99/99/9999"); 
	  jQuery("#tglIjazah").mask("99/99/9999");
	  jQuery("#telepon").mask("(999) 9999-9999");
	  jQuery("#handphone").mask("(9999) 9999-9999");
	  jQuery("#penghasilan").mask("999.999.999.999");	  
  });
</script>
<script type="text/javascript">
$( document ).ready(function() {
    var modelMakeJsonList = {"modelMakeTable" : 
        [
                {"modelMakeID" : "0","modelMake" : "Pilih jenjang sekolah"},        
                {"modelMakeID" : "1","modelMake" : "KB"},
                {"modelMakeID" : "2","modelMake" : "TK"},
        		{"modelMakeID" : "3","modelMake" : "SD"},
        		{"modelMakeID" : "4","modelMake" : "SMP"}
        ]};
var modelTypeJsonList = {
		"KB" : 
        [
                {"modelTypeID" : "1","modelType" : "KB A"},
                {"modelTypeID" : "2","modelType" : "KB B"}
        ],
        "TK" : 
        [
                {"modelTypeID" : "1","modelType" : "TK A - Kecil"},
                {"modelTypeID" : "2","modelType" : "TK B - Besar"}
		],
        "SD" : 
        [
                {"modelTypeID" : "1","modelType" : "Kelas 1"},
                {"modelTypeID" : "2","modelType" : "Kelas 2"},
                {"modelTypeID" : "3","modelType" : "Kelas 3"},
                {"modelTypeID" : "4","modelType" : "Kelas 4"},
                {"modelTypeID" : "5","modelType" : "Kelas 5"},
                {"modelTypeID" : "6","modelType" : "Kelas 6"}
        ],
        "SMP" : 
        [
                {"modelTypeID" : "1","modelType" : "Kelas 1"},
                {"modelTypeID" : "2","modelType" : "Kelas 2"},
                {"modelTypeID" : "3","modelType" : "Kelas 3"}
        ],        
		
		};
    console.log( "ready!" );
	//Now that the doc is fully ready - populate the lists   
	//Next comes the make
      var ModelListItems= "";
      for (var i = 0; i < modelMakeJsonList.modelMakeTable.length; i++){
        ModelListItems+= "<option value='" + modelMakeJsonList.modelMakeTable[i].modelMakeID + "'>" + modelMakeJsonList.modelMakeTable[i].modelMake + "</option>";
      }
      $("#jenjangSekolah").html(ModelListItems);
    
    var updateSelectSchoolBox = function(make) {
        console.log('updating with',make);
        var listItems= "";
        for (var i = 0; i < modelTypeJsonList[make].length; i++){
            listItems+= "<option value='" + modelTypeJsonList[make][i].modelTypeID + "'>" + modelTypeJsonList[make][i].modelType + "</option>";
        }
        $("select#jenjangKelas").html(listItems);
    }
   
    $("select#jenjangSekolah").on('change',function(){
        var selectedMake = $('#jenjangSekolah option:selected').text();
        updateSelectSchoolBox(selectedMake);
    });    		
});
</script>