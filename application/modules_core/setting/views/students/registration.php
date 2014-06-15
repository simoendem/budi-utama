

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
                
                <ul class="nav nav-pills nav-justified">
                  <li><a href="#vtab1" data-toggle="tab"><span>Step 1:</span> Student Basic Info</a></li>
                  <li><a href="#vtab2" data-toggle="tab"><span>Step 2:</span> Parent Info</a></li>
                  <li><a href="#vtab3" data-toggle="tab"><span>Step 3:</span> Students Achievements</a></li>
                </ul>
                
                <form class="form" id="regisForm">  
                <div class="tab-content">

                  <!--   Basic Info      -->
                  <div class="tab-pane" id="vtab1">
					<div class="form-group">
					  <label class="col-sm-4 control-label">School Grade <span class="asterisk">*</span></label>
					  <div class="col-sm-4">
					    <select id="schoolGrade" class="form-control" required>
					      <option value="">Choose One</option>
					      <option value="Kindergarten">Kindergarten</option>
					      <option value="Elementary Shcool">Elementary School</option>
					      <option value="Junior Secondary School">Junior Secondary School</option>	                      					      
					    </select>
					    <label class="error" for="school_grade"></label>
					  </div>
					</div> 
                                        
					<div class="form-group">
					  <label class="col-sm-4 control-label">Class Grade <span class="asterisk">*</span></label>
					  <div class="col-sm-4">
					    <select id="classGrade" class="form-control" required>
					      <option value="">Choose One</option>
					      <option value="1">1</option>
					      <option value="2">2</option>
					      <option value="3">3</option>
					      <option value="4">4</option>
					      <option value="5">5</option>		                      
					      <option value="6">6</option>		                      					      
					    </select>
					    <label class="error" for="grade"></label>
					  </div>
					</div>  
					
					<div class="form-group">
					  <label class="col-sm-4 control-label">Academic Year <span class="asterisk">*</span></label>
					  <div class="col-sm-4">
					    <select id="academicYear" class="form-control" required>
					      <option value="">Choose One</option>
					      <option value="2013/2014">2013/2014</option>
					      <option value="2013/2014">2014/2015</option>
					    </select>
					    <label class="error" for="academicYear"></label>
					  </div>
					</div>  					
		                                  
                      <div class="form-group">
                        <label class="col-sm-4 control-label">School Origin <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" name="school_origin" class="form-control" required />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Tanggal Ijazah (tulung ditranslet) <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" placeholder="dd/mm/yyyy" name="tgl_ijazah" id="tglIjazah" class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nomer Ijazah (tulung ditranslet) <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="ijazah" class="form-control" required />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">NIS <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="nis" class="form-control" required />
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">NISN <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="nisn" class="form-control" required />
                        </div>
                      </div>
                      
					  <div class="form-group">
                        <label class="col-sm-4 control-label">Fullname <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" name="fullname" class="form-control" required />
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Nickname</label>
                        <div class="col-sm-4">
                          <input type="text" name="Nickname" class="form-control" />
                        </div>
                      </div>                      
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Gender <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <div class="rdio rdio-primary">
                            <input type="radio" id="male4" value="m" name="gender" required/>
                            <label for="male4">Male</label>
                          </div>
                          <div class="rdio rdio-primary">
                            <input type="radio" value="f" id="female4" name="gender"/>
                            <label for="female4">Female</label>
                          </div>
                          <label class="error" for="gender"></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Birth Place <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="birth_place" class="form-control" required/>
                        </div>
                      </div>  
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Date of Birth <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
							<input type="text" placeholder="dd/mm/yyyy" name="dob" id="dob" class="form-control" required>
                        </div>
                      </div> 
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Children Number</label>
                        <div class="col-sm-4">
							<input type="text" placeholder="e.g. 1" name="child_number" class="form-control" required/>
                        </div>
                        
                        <div class="col-sm-4">
							<input type="text" placeholder="of, e.g. 3" name="child_number_total" class="form-control" required/>
                        </div>   
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Address <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" name="address_line1" class="form-control" required/>
                        </div>                       
                      </div>  
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                          <input type="text" name="address_line2" class="form-control"/>
                        </div>                     
                      </div>    
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">City <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="city" class="form-control" required/>
                        </div>
                      </div>                        
                      
                      <div class="form-group">
					  	<label class="col-sm-4 control-label">Phone</label>
					   	<div class="col-sm-4">
					   		<div class="input-group">
						   		<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
							  <input type="text" placeholder="Phone" id="phone" class="form-control">
					   		</div>
					   	</div>
					  </div>  
					  
					   <div class="form-group">
						<label class="col-sm-4 control-label">Cellphone</label>
					   	<div class="col-sm-4">
					   		<div class="input-group">
						   		<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
						   		<input type="text" placeholder="cellphone" id="cellphone" class="form-control">
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
		                  <label class="col-sm-4 control-label">Religion</label>
		                  <div class="col-sm-4">
		                    <select id="religion" class="form-control">
		                      <option value="">Choose One</option>
		                      <option value="islam">Islam / Moslem</option>
		                      <option value="christian">Christian</option>
		                      <option value="catholic">Catholic</option>
		                      <option value="hindu">Hindu</option>
		                      <option value="budha">Budha</option>		                      
		                    </select>
		                  </div>
		                </div>                      
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Citizen <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <div class="rdio rdio-primary">
                            <input type="radio" id="ina" value="ina" name="Citizen" required/>
                            <label for="ina">Indonesia</label>
                          </div>
                          <div class="rdio rdio-primary">
                            <input type="radio" value="foreign" id="foreign" name="Citizen"/>
                            <label for="foreign">Foreigners</label>
                          </div>
                          <label class="error" for="Citizen"></label>
                        </div>
                      </div>  
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Photo <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
							<div class="fallback">
								<input name="file" type="file" />
							</div>                         
                        </div>
                      </div>                         
                                          
                  </div>
				  <!--   End Basic Info      -->
				  <!--   Parent Info      -->
                  <div class="tab-pane" id="vtab2">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">NIS</label>
                        <div class="col-sm-4">
                          <input type="text" value="001" id="readonlyNIS" class="form-control" readonly="readonly">
                        </div>
                      </div>
                      
					  <div class="form-group">
                        <label class="col-sm-4 control-label">Fullname <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" name="fullname_parents" class="form-control" required />
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Relationship <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
                          <select class="form-control" required>
                            <option value="">Choose One</option>
                            <option value="father">Father</option>
                            <option value="mother">Mother</option>
                            <option value="other">Others</option>
                          </select>
                          <label class="error" for="relationship"></label>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Gender <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <div class="rdio rdio-primary">
                            <input type="radio" id="male_p" value="m" name="gender_parents" required/>
                            <label for="male_p">Male</label>
                          </div>
                          <div class="rdio rdio-primary">
                            <input type="radio" value="f" id="female_p" name="gender_parents"/>
                            <label for="female_p">Female</label>
                          </div>
                          <label class="error" for="gender_parents"></label>
                        </div>
                      </div>                      
                    
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Birth Place <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="birth_place_p" class="form-control" required/>
                        </div>
                      </div>  
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Date of Birth <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
							<input type="text" placeholder="dd/mm/yyyy" name="dob_p" id="dobP" class="form-control" required>
                        </div>
                      </div>           
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Address <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <input type="text" name="address_line1_p" class="form-control" required/>
                        </div>                       
                      </div>  
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label"></label>
                        <div class="col-sm-8">
                          <input type="text" name="address_line2_p" class="form-control"/>
                        </div>                     
                      </div>    
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">City <span class="asterisk">*</span></label>
                        <div class="col-sm-4">
                          <input type="text" name="city_p" class="form-control" required/>
                        </div>
                      </div>                                 
                    
					  <div class="form-group">
		                  <label class="col-sm-4 control-label">Religion</label>
		                  <div class="col-sm-4">
		                    <select id="religion_p" class="form-control">
		                      <option value="">Choose One</option>
		                      <option value="islam">Islam / Moslem</option>
		                      <option value="christian">Christian</option>
		                      <option value="catholic">Catholic</option>
		                      <option value="hindu">Hindu</option>
		                      <option value="budha">Budha</option>		                      
		                    </select>
		                  </div>
		                </div>                      
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Citizen <span class="asterisk">*</span></label>
                        <div class="col-sm-8">
                          <div class="rdio rdio-primary">
                            <input type="radio" id="ina_p" value="ina" name="Citizen_p" required/>
                            <label for="ina_p">Indonesia</label>
                          </div>
                          <div class="rdio rdio-primary">
                            <input type="radio" value="foreign" id="foreign_p" name="Citizen_p"/>
                            <label for="foreign_p">Foreigners</label>
                          </div>
                          <label class="error" for="Citizen_p"></label>
                        </div>
                      </div>      
                      
					  <div class="form-group">
		                  <label class="col-sm-4 control-label">Jobs</label>
		                  <div class="col-sm-4">
		                    <select id="jobs" class="form-control" required>
		                      <option value="">Choose One</option>
		                      <option value="civil servant">Civil Servant</option>
		                      <option value="doctor">Dcotor</option>
		                      <option value="bussinesman">Bussinesman</option>
		                      <option value="others">Others</option>	                      
		                    </select>
		                    <label class="error" for="jobs"></label>
		                  </div>
		                </div>             
		                
                      <div class="form-group">
					  	<label class="col-sm-4 control-label">Phone</label>
					   	<div class="col-sm-4">
					   		<div class="input-group">
						   		<span class="input-group-addon"><i class="glyphicon glyphicon-phone-alt"></i></span>
							  <input type="text" placeholder="Phone" id="phone_p" class="form-control">
					   		</div>
					   	</div>
					  </div>  
					  
					   <div class="form-group">
						<label class="col-sm-4 control-label">Cellphone</label>
					   	<div class="col-sm-4">
					   		<div class="input-group">
						   		<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
						   		<input type="text" placeholder="cellphone" id="cellphone_p" class="form-control">
					   		</div>
					   	</div>
					  </div>  					                      
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-4">
                          <input type="email" name="email_p" placeholder="e.g. budiutama@yahoo.com" class="form-control"/>
                        </div>
                      </div> 
                      
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Earns per month</label>
                        <div class="col-sm-7">
							<div class="input-group">
			                  <span class="input-group-addon">Rp</span>
			                  <input type="text" id="earns" class="form-control" required>
			                  <span class="input-group-addon">.00</span>
			                </div>
                        </div>
                      </div>                       		                                           
                    
                  </div>
				  <!--  end Parent Info    -->
				  
                  <!-- Student Achievement -->
                  <div class="tab-pane" id="vtab3">
                      <div class="form-group">
                        <label class="col-sm-4 control-label">NIS</label>
                        <div class="col-sm-4">
                          <input type="text" value="001" id="readonlyNIS" class="form-control" readonly="readonly">
                        </div>
                      </div>
                      
					  <div class="form-group">
                        <label class="col-sm-4 control-label">Achivement Name</label>
                        <div class="col-sm-8">
                          <input type="text" name="achievement_name" class="form-control" />
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="col-sm-4 control-label">Level</label>
                        <div class="col-sm-4">
                          <input type="text" name="achievement_level" class="form-control" />
                        </div>
                      </div>
                      
					  <div class="form-group">
                        <label class="col-sm-4 control-label">Year</label>
                        <div class="col-sm-4">
                          <input type="text" id="achievement_id" name="achievement_year" class="form-control" />
                        </div>
                      </div>                      
                      
                  </div>
                  
                  
                </div><!-- tab-content -->
                </form>
                
                <ul class="pager wizard">
                    <li class="previous"><a href="javascript:void(0)">Previous</a></li>
                    <li class="next"><a href="javascript:void(0)">Next</a></li>
                  </ul>
                
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
	  var $validator = jQuery("#regisForm").validate({
	    highlight: function(element) {
	      jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
	    },
	    success: function(element) {
	      jQuery(element).closest('.form-group').removeClass('has-error');
	    }
	  });
	  
	  jQuery('#validationWizard').bootstrapWizard({
	    tabClass: 'nav nav-pills nav-justified nav-disabled-click',
	    onTabClick: function(tab, navigation, index) {
	      return false;
	    },
	    onNext: function(tab, navigation, index) {
	      var $valid = jQuery('#regisForm').valid();
	      if(!$valid) {
	        
	        $validator.focusInvalid();
	        return false;
	      }
	      jQuery("html, body").animate({ scrollTop: 0 }, "slow");
	    }
	  });	
	  
	  jQuery("#dob").mask("99/99/9999");
	  jQuery("#dobP").mask("99/99/9999");
	  jQuery("#achievement_id").mask("9999");
	  jQuery("#tglIjazah").mask("99/99/9999"); 
	  jQuery("#tglIjazah").mask("99/99/9999");
	  jQuery("#phone").mask("(999) 9999-9999");
	  jQuery("#earns").mask("999.999.999.999");
	  jQuery("#cellphone").mask("(9999) 9999-9999");
  });
</script>