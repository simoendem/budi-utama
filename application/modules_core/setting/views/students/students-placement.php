

    <div class="pageheader">
      <h2><i class="fa fa-puzzle-piece"></i>Students Placement</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>setting/students">Students</a></li>
          <li class="active">Students Placement</li>
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
				  <input type="text" name="placement[tahun-ajaran]" value="2014/2015" class="form-control" disabled/>
				</div>
			</div>	    					           
			<div class="form-group">
			  <label class="col-sm-2 control-label">Jenjang Sekolah <span class="asterisk">*</span></label>
			  <div class="col-sm-3">
			    <select style="margin-top:8px;" name="placement[siswa_jenjang]" id="jenjangSekolah" class="form-control" required>
			     <option value="" selected="selected">Pilih jenjang sekolah</option>		                      					      
			    </select>
			    <label class="error" for="jenjangSekolah"></label>
			  </div>
			   <div class="col-sm-3">
			    <select style="margin-top:8px;" name="placement[siswa_kelas]" id="jenjangKelas" class="form-control" required>
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

      
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <div class="panel-btns">
	        <a href="#" class="minimize">&minus;</a>
	      </div>
	      <h4 class="panel-title">Students List</h4>
	    </div>
	    <form id="gradesSiswa" class="form-horizontal form-bordered">
	    <div class="panel-body">
	    	<div class="row">
	    		<div class="col-md-5">
					<div class="form-group">
						<h5 class="subtitle">Siswa yang sudah terdaftar</h5>
						<div class="input-group col-sm-12">
							<select class="form-control input-sm" multiple="multiple" id="lstBox1">
								<option><span>10001 --</span> Bhimasta</option>
								<option>10002 --</span> Simon M</option>
								<option>10003 --</span> Albertus</option>
							</select>
						</div>
					</div>		    					           
	    		</div>
	    		<div class="col-md-2 action-grades">
					<input class="btn-info btn" type="button" id="btnRight" value ="  >  "/>
					<br/><input  class="btn-info btn" type="button" id="btnLeft" value ="  <  "/>
	    		</div>
	    		<div class="col-md-5">
					<div class="form-group">
						<h5 class="subtitle">Calon Siswa yang akan didaftar</h5>
						<div class="input-group col-sm-12">
							<select class="form-control input-sm" multiple="multiple" id="lstBox2">
								<option><span>10004 --</span> Raden</option>
								<option>10005 --</span> Megadewandanu</option>
								<option>10006 --</span> Satria Yudha</option>
							</select>
						</div>
					</div>		    				    		
	    		</div>		    				    		
	    	</div>
	    </div><!-- panel-body -->
		<div class="panel-footer">
	        <button id="cariSiswa" class="btn btn-success btn-block">Save</button>
	    </div>	    
	    </form>
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

<script src="<?php echo base_url();?>bracket/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.mask.min.js"></script>

<script src="<?php echo base_url()?>bracket/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/bootstrap-wizard.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/custom.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
   $('#gradesSiswa').on('click', '#btnRight', function(){
        var selectedOpts = $('#lstBox1 option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox2').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
        return false;
    });

   $('#gradesSiswa').on('click', '#btnLeft', function(){
        var selectedOpts = $('#lstBox2 option:selected');
        if (selectedOpts.length == 0) {
            alert("Nothing to move.");
            e.preventDefault();
        }

        $('#lstBox1').append($(selectedOpts).clone());
        $(selectedOpts).remove();
        e.preventDefault();
        return false;
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
        $("select#jenjangKelas").html(listItems);
    }
   
    $("select#jenjangSekolah").on('change',function(){
        var selectedMake = $('#jenjangSekolah option:selected').text();
        updateSelectSchoolBox(selectedMake);
    });    		
});
</script>