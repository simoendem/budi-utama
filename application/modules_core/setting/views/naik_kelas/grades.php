<?php
$val = '';
$this->load->model('m_kelas');
?>



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
    <!-- <form id="daftarUlang"> -->

      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="#" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title">Filter</h4>
          <p><span class="asterisk">*</span> required</p>
        </div><!-- panel-heading -->
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
	        <!-- <input type="button" id="cariSiswa" class="btn btn-warning" value="Cari" /> -->
	    </div>
    <!-- </form> -->
      </div><!-- panel -->      

    </div><!-- contentpanel -->

  <form id="kesimpulan">

  <input type="hidden" value="0" id="jumlah_siswa">
    
   <div class="contentpanel panel-email" id="studentsList">

        <div class="row">            
            <div class="col-sm-9 col-lg-12">
                
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="pull-right" id="ksmpl">
                            <input type="button" id="saveKesimpulan" class="btn btn-warning" value="Cari" />
                        </div><!-- pull-right -->                       
                        
                        <div class="pull-right" id="graduation">
                            <div class="btn-group mr10">
                                <button class="btn btn-white tooltips disabled" type="button" data-toggle="tooltip" value="LULUS" title="Lulus"><i class="glyphicon glyphicon-ok"></i></button>
                                <button class="btn btn-white tooltips disabled" type="button" data-toggle="tooltip" value="TIDAK LULUS" title="Tidak Lulus"><i class="glyphicon glyphicon-remove-circle"></i></button>
                            </div>
                                                        
                        </div><!-- pull-right --> 
                                                
                         <!-- if jenjang = max, add 'disabled' class on each button -->
                        <div class="pull-right" id="nextLevel">
                            <div class="btn-group mr10">
                                <button class="btn btn-white tooltips disabled" type="button" data-toggle="tooltip" value="NAIK KELAS" title="Naik Kelas"><i class="glyphicon glyphicon-upload"></i></button>
                                <button class="btn btn-white tooltips disabled" type="button" data-toggle="tooltip" value="TINGGAL KELAS" title="Tinggal Kelas"><i class="glyphicon glyphicon-exclamation-sign"></i></button>
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
                            <table id="rekapTagihan" class="table table-grades table-email">
                              <tbody>

                              </tbody>
                            </table>
                        </div><!-- table-responsive -->
                        
                    </div><!-- panel-body -->
                </div><!-- panel -->
                
            </div><!-- col-sm-9 -->
            
        </div><!-- row -->
    
    </div> 
    </form>
<script src="<?php echo base_url()?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/retina.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.cookies.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.validate.min.js"></script>

<script src="<?php echo base_url()?>bracket/js/custom.js"></script>

<script type="text/javascript">
        CI_ROOT = "<?=base_url() ?>";
</script>


<script>
jQuery(document).ready(function(){

<<<<<<< HEAD
  //Check
=======
<<<<<<< HEAD
    //Check
=======
  //Check
>>>>>>> naik kelas, sebagian daftar ulang, ganti db
>>>>>>> generate lanjut, ceken mbok menowo ono sing kerewrite
    $('#rekapTagihan').on('click', '.checkboxStud', function(){
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
            <?php $no = 1; foreach ($ls_unit as $unit) : ?>
                {"modelMakeID" : "<?php echo $unit->jenjang ?>","modelMake" : "<?php echo $unit->unit ?>"},
            <?php $no++; endforeach ; ?>
        ]};

var modelTypeJsonList = {

  //ambil kelas aktif yang ada

    <?php $no = 1; foreach ($ls_unit as $unit): ?>

      "<?php echo $unit->unit ?>" :
        [
            //setiap yang unitnya sama
            <?php $kelass = $this->m_kelas->get_kelas_buka_by_unit_tahun($unit->id_unit,$tahun->tahun_ajaran) ?>
            <?php $count = COUNT($kelass) ?>
            <?php $nos = 1; foreach ($kelass as $kelas) : ?>
                {"modelTypeID" : "<?php echo $kelas->id_buka ?>","modelTypeJenjang" : "<?php echo $kelas->tingkat ?>","modelType" : "<?php echo $kelas->kelas ?>"}
                //setiap kelas ditampilkan
                <?php if ($nos < $count) : ?>
                  ,
                <?php endif ?>
                <?php $nos++ ?>
            <?php endforeach; ?>
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
            listItems+= "<option value='" + modelTypeJsonList[make][i].modelTypeID + "' id='" + modelTypeJsonList[make][i].modelTypeJenjang + "'  >" + modelTypeJsonList[make][i].modelType + "</option>";
        }
        $("#jenjangKelas").html(listItems);

                
        query_siswa();

    }

    function query_siswa() {
                var item = {};
                var number = 1;
                var val = $("#jenjangKelas option:selected").attr('value');
                item[number] = {};
                item[number]['id_buka'] = val;
                console.log(val);
                
                $.ajax({
                  type: "POST",
                  url: CI_ROOT+"setting/naik_kelas/daftar_siswa",
                  data: item,
                   success: function(data)
                   {

                      var table = $("#rekapTagihan");
                      table.find("tr").remove();

                      console.log(data);
                      var index;
                      var nama; var status;
                      for (index = 0; index < data.length; ++index) {
                          id = data[index]['id'];
                          nis = data[index]['nis'];
                          nama = data[index]['nama_lengkap'];
                          kesimpulan = data[index]['kesimpulan'];
                          if ((kesimpulan === 'LULUS') || (kesimpulan === 'NAIK KELAS') ) {
                          $('#rekapTagihan > tbody:first').append(
                            '<tr class="student-row-'+index+'">'+
                            '<td>'+
                            '<div class="ckbox ckbox-success">'+
                            '<input class="checkboxStud" type="checkbox" id="checkbox'+index+'" name="checkbox'+nis+'[nis]">'+
                            '<label for="checkbox'+index+'"></label>'+
                            '</div>'+
                            '<div class="input-hidden">'+
                            '<input class="id'+index+'" type="hidden" name="checkbox'+index+'[id]" value="'+id+'">'+
                            '<input class="simpul'+index+' sim" type="hidden" name="sim" value="'+kesimpulan+'">'+                            
                            '</div>'+
                            '</td>'+
                            '<td>'+
                            '<div class="media">'+
                            '<div class="media-body">'+
                            '<h5 class="pull-right status-siswa text-success">'+kesimpulan+'</h5>'+
                            '<h5 class="text-primary">'+nama+'</h5>'+
                            '</div>'+
                            '</div>'+
                            '</td>'+
                            '</tr>'); 
                          }
                          else {
                          $('#rekapTagihan > tbody:first').append(
                            '<tr class="student-row-'+index+'">'+
                            '<td>'+
                            '<div class="ckbox ckbox-success">'+
                            '<input class="checkboxStud" type="checkbox" id="checkbox'+index+'" name="checkbox'+nis+'[nis]">'+
                            '<label for="checkbox'+index+'"></label>'+
                            '</div>'+
                            '<div class="input-hidden">'+                            
                            '<input class="id'+index+'" type="hidden" name="checkbox'+index+'[id]" value="'+id+'">'+
                            '<input class="simpul'+index+' sim" type="hidden" name="sim" value="'+kesimpulan+'">'+                            
                            '</div>'+                            
                            '</td>'+
                            '<td>'+
                            '<div class="media">'+
                            '<div class="media-body">'+
                            '<h5 class="pull-right status-siswa text-danger">'+kesimpulan+'</h5>'+
                            '<h5 class="text-primary">'+nama+'</h5>'+
                            '</div>'+
                            '</div>'+
                            '</td>'+
                            '</tr>'); 
                          }
      
                            console.log('berhasil');
                      } //end of for
                            var maxJenjang = $("#jenjangSekolah option:selected").attr('value');
                            console.log('max jenjang : ' + maxJenjang);

                            var val = $("#jenjangKelas option:selected").attr('value');
                            console.log('id_buka : ' + val);

                            var jenj = $("#jenjangKelas option:selected").attr('id');
                            console.log('jenjang kelas : ' + jenj);
                      if (index != 0)
                      {
                        if(maxJenjang == jenj)
                        {
                          $('#graduation button').removeClass('disabled');      
                          $('#nextLevel button').addClass('disabled');        
                        }
                        else
                        {
                          $('#nextLevel button').removeClass('disabled');
                          $('#graduation button').addClass('disabled');
                        }
                      }
                      else 
                      {
                          $('#graduation button').addClass('disabled');      
                          $('#nextLevel button').addClass('disabled');        
                      }


                   },

                   error: function (jqXHR, textStatus, errorThrown)
                   {
                      console.log('gagal');
                   }
                });      
    }

    $("select#jenjangSekolah").on('change',function(){
        var selectedMake = $('#jenjangSekolah option:selected').text();
        updateSelectSchoolBox(selectedMake);
        $('#graduation button').addClass('disabled');      
        $('#nextLevel button').addClass('disabled');        
    }); 


    $("select#jenjangKelas").on('change',function(){
        query_siswa();
    }); 


    //ganti
    $('#studentsList').on('click', 'button', function(){
		var status = $(this).attr('value');

		if ((status == "LULUS") || (status == "NAIK KELAS"))
		{
			$('tr.selected .status-siswa').replaceWith('<h5 class="pull-right status-siswa text-success">'+status+'</h5>');
      $('tr.selected .sim').attr('value',status);
      //update nilai dari input yang dipilih
		}
		
		if ((status == "TIDAK LULUS") || (status == "TINGGAL KELAS"))
		{
			$('tr.selected .status-siswa').replaceWith('<h5 class="pull-right status-siswa text-danger">'+status+'</h5>');
      $('tr.selected .sim').attr('value',status);
		}					  		                	
    });   	


    var nomer = 1;
    $('#daftarUlang').on('click', '#cariSiswa', function(){
      console.log('berhasil');
      var valid = $('#daftarUlang').valid();
      if(valid)
      { 
        query_siswa();
      }
      nomer++;  
      return false;   
    });

    $('#kesimpulan').on('click', '#saveKesimpulan', function(){
      var item = {};
      var jumlah_siswa = 0;
      var number = 1;
      var val = $("#jenjangKelas option:selected").attr('value');
      item[number] = {};
      item[number]['id_buka'] = val;
      console.log(val);
      
      //get jumlah
      $.ajax({
        type: "POST",
        url: CI_ROOT+"setting/naik_kelas/daftar_siswa",
        data: item,
         success: function(data)
         {
            console.log(data);
            var jumlah_siswa = data.length;
            console.log('jumlah siswa : ' + jumlah_siswa);

            var items = {};
            for (var number = 0; number < jumlah_siswa; number++) {
                  // form    = 'tr .student-row-'+number;
              items[number] = {};
              items[number]['id']            = $('.id'+number).attr('value');
              items[number]['kesimpulan']    = $('.simpul'+number).attr('value');
              console.log(items[number]);
            };

            $.ajax({
            type: "POST",
            url: CI_ROOT+"setting/naik_kelas/update_kesimpulan",
            data: items,
             success: function(data)
             {
                console.log(data);
                alert('date berhasil diupadate');
             },
             error: function (data)
             {
                console.log('gagal');
             } //end of for
            }); 
         },
         error: function (data)
         {
            console.log('gagal');
         }
      });     

    });

 
});
</script>
