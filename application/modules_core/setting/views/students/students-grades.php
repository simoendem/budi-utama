

    <div class="pageheader">
      <h2><i class="fa fa-gavel"></i>Students Grades</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>setting/students">Students</a></li>
          <li class="active">Students Grades</li>
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
          <div class="panel-btns">
            <a href="#" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">Filter</h4>
          <p><span class="asterisk">*</span> required</p>
        </div><!-- panel-heading -->
        <form id="daftarUlang" class="form-horizontal">
        <div class="panel-body">
			<div class="form-group">
				<label class="col-sm-2 control-label">Tahun Ajaran</label>
				<div class="col-sm-2">
				  <input type="text" name="grades[tahun-ajaran]" value="2014/2015" class="form-control" disabled/>
				</div>
			</div>	    					           
			<div class="form-group">
			  <label class="col-sm-2 control-label">Jenjang Sekolah <span class="asterisk">*</span></label>
			  <div class="col-sm-3">
			    <select style="margin-top:8px;" name="grades[siswa_jenjang]" id="jenjangSekolah" class="form-control" required>
			     <option value="" selected="selected">Pilih jenjang sekolah</option>		                      					      
			    </select>
			    <label class="error" for="jenjangSekolah"></label>
			  </div>
			   <div class="col-sm-3">
			    <select style="margin-top:8px;" name="grades[siswa_kelas]" id="jenjangKelas" class="form-control" required>
			      <option value="" selected="selected">Pilih jenjang kelas</option>		                      					      
			    </select>
			    <label class="error" for="jenjangKelas"></label>
			  </div>					  			
			</div>          
        </div>
		<div class="panel-footer">
	        <button id="cariSiswa" class="btn btn-warning">Cari</button>
	    </div>
		</form>        
      </div><!-- panel -->      
        
                
    </div><!-- contentpanel -->
    
   <div class="contentpanel panel-email" id="studentsList">

        <div class="row">            
            <div class="col-sm-9 col-lg-12">
                
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <div class="pull-right" id="graduation">
                            <div class="btn-group mr10">
                                <button class="btn btn-white tooltips disabled" type="button" data-toggle="tooltip" value="Lulus" title="Lulus"><i class="glyphicon glyphicon-ok"></i></button>
                                <button class="btn btn-white tooltips disabled" type="button" data-toggle="tooltip" value="Tidak Lulus" title="Tidak Lulus"><i class="glyphicon glyphicon-remove-circle"></i></button>
                            </div>
                                                        
                        </div><!-- pull-right --> 
                                                
                         <!-- if jenjang = max, add 'disabled' class on each button -->
                        <div class="pull-right" id="nextLevel">
                            <div class="btn-group mr10">
                                <button class="btn btn-white tooltips disabled" type="button" data-toggle="tooltip" value="Naik Kelas" title="Naik Kelas"><i class="glyphicon glyphicon-upload"></i></button>
                                <button class="btn btn-white tooltips disabled" type="button" data-toggle="tooltip" value="Tinggal Kelas" title="Tinggal Kelas"><i class="glyphicon glyphicon-exclamation-sign"></i></button>
                            </div>
                                                        
                        </div><!-- pull-right -->                       
                        
                        <div class="ckbox ckbox-success check-all">
                            <input type="checkbox" id="checkboxAll">
                            <label for="checkboxAll"></label>
                        </div>
                        
                        <div class="students-title-grades">
                        	<h5 class="subtitle mb5">Students List</h5>
							<p class="text-muted">Showing 15 students of 15 students</p>                        
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-grades table-email">
                              <tbody>
                                <tr class="student-row">
                                  <td>
                                    <div class="ckbox ckbox-success">
                                        <input class="checkboxStud" type="checkbox" id="checkbox1">
                                        <label for="checkbox1"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="media">
                                        <a href="#" class="pull-left">
                                          <img alt="" src="<?php echo base_url()?>bracket/images/photos/user3.png" class="media-object">
                                        </a>
                                        <div class="media-body">
                                            <h5 class="pull-right status-siswa text-success">Naik Kelas</h5>
                                            <h5 class="text-primary">Zaham Sindilmaca</h5>
                                        </div>
                                    </div>
                                  </td>
                                </tr>
                                <tr class="student-row">
                                  <td>
                                    <div class="ckbox ckbox-success">
                                        <input class="checkboxStud" type="checkbox" id="checkbox2">
                                        <label for="checkbox2"></label>
                                    </div>
                                  </td>
                                  <td>
                                    <div class="media">
                                        <a href="#" class="pull-left">
                                          <img alt="" src="<?php echo base_url()?>bracket/images/photos/user2.png" class="media-object">
                                        </a>
                                        <div class="media-body">
                                            <h5 class="pull-right status-siswa text-danger">Tinggal Kelas</h5>
                                            <h5 class="text-primary">Nusja Nawancali</h5>
                                        </div>
                                    </div>
                                  </td>
                                </tr>                                                                
                              </tbody>
                            </table>
                        </div><!-- table-responsive -->
                        
                    </div><!-- panel-body -->
                </div><!-- panel -->
                
            </div><!-- col-sm-9 -->
            
        </div><!-- row -->
    
    </div>
        
    
<script src="<?php echo base_url()?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/retina.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.cookies.js"></script>

<script src="<?php echo base_url()?>bracket/js/custom.js"></script>

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
        
    $('#studentsList').on('click', '#checkboxAll', function(){
        if(this.checked) { // check select status
            $('.checkboxStud').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
                $(this).closest('tr').addClass('selected');
            });
        }else{
            $('.checkboxStud').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                $(this).closest('tr').removeClass('selected');                
            });         
        }
    });   
    
});
</script>
<script type="text/javascript">
$( document ).ready(function() {
    var modelMakeJsonList = {"modelMakeTable" : 
        [
            {"modelMakeID" : "0","modelMake" : "Pilih jenjang sekolah"},        
            <?php $no = 1; foreach ($ls_unit as $unit): ?>
                {"modelMakeID" : "<?php echo $no ?>","modelMake" : "<?php echo $unit->unit ?>"},
            <?php $no++; endforeach ; ?>
        ]};
var modelTypeJsonList = {

    <?php $no = 1; foreach ($ls_unit as $unit): ?>

      "<?php echo $unit->unit ?>" :
        [
            <?php for ($i = 1; $i <= $unit->jenjang; $i++) : ?>
                {"modelTypeID" : "<?php echo $unit->id_unit ?>","modelType" : "<?php echo $i ?>"}
              <?php if ($i + 1 <= $unit->jenjang) : ?>
              ,
              <?php endif; ?>
            <?php endfor; ?>
        ],
    <?php $no++; endforeach ; ?>		
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
        $("#jenjangKelas").html(listItems);
		var maxJenjang = $("#jenjangKelas option").length;

	    $("select#jenjangKelas").on('change',function(){
			var selectedClass = $('#jenjangKelas option:selected').text();
			if(maxJenjang == selectedClass)
			{
				$('#graduation button').removeClass('disabled');			
				$('#nextLevel button').addClass('disabled');				
			}
			else
			{
				$('#nextLevel button').removeClass('disabled');
				$('#graduation button').addClass('disabled');
			}
	    });    		
    }
   
   
    $("select#jenjangSekolah").on('change',function(){
        var selectedMake = $('#jenjangSekolah option:selected').text();
        updateSelectSchoolBox(selectedMake);
        
    }); 
    
    $('#studentsList').on('click', 'button', function(){
		var status = $(this).attr('value');
		
		if ((status == "Lulus") || (status == "Naik Kelas"))
		{
			$('tr.selected .status-siswa').replaceWith('<h5 class="pull-right status-siswa text-success">'+status+'</h5>');
		}
		
		if ((status == "Tidak Lulus") || (status == "Tinggal Kelas"))
		{
			$('tr.selected .status-siswa').replaceWith('<h5 class="pull-right status-siswa text-danger">'+status+'</h5>');
		}					  		                	
		
    });   	

 
});
</script>