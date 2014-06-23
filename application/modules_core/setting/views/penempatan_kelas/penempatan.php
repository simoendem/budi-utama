

    <div class="pageheader">
      <h2><i class="fa fa-asterisk"></i>Penempatan Siswa</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>dashboard">Pinaple SAS</a></li>
          <li><a href="<?php echo base_url();?>setting/penempatan_kelas">Penempatan Kelas</a></li>
          <li><a href="<?php echo base_url();?>setting/penempatan_kelas/penempatan/<?php echo $unit->unit ?>/<?php echo $result->id_buka?>">Kelas <?php echo $result->kelas?></li>

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
          <h4 class="panel-title">Daftar Siswa Kelas <?php echo $result->kelas?> </h4>
          <p>tahun ajaran : <?php echo $tahun->tahun_ajaran?></p><br><br>
          <a href="<?php echo base_url(); ?>setting/penempatan_kelas/add_siswa/<?php echo $unit->id_unit?>/<?php echo $result->id_buka; ?>/<?php echo $result->tingkat; ?>" data-title="Add Data" class="tip"><i class="fa fa-plus"></i> Tambah Siswa</a>
        </div><!-- panel-heading -->
        <form id="daftarUlang" class="form-horizontal">

        <div class="panel-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                <th style="width:10%;">#</th>
                <th style="width:20%;">NIS</th>
                <th style="width:20%;">Nama Lengkap</th>
                <th style="width:20%;">Status</th>
                <th style="width:20%;">Naik/Tinggal Kelas</th>
                <th style="width:20%;"></th>
              </thead>
              <tbody>
                                    <?php $no = 1; foreach ($siswas as $siswa): ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $siswa->nis; ?></td>
                                            <td><?php echo $siswa->nama_lengkap; ?></td>
                                            <td><?php echo $siswa->status; ?></td>
                                            <td><?php echo $siswa->kesimpulan; ?></td>
                                            <td>
                                               <a href="<?php echo base_url(); ?>setting/penempatan_kelas/hapus/<?php echo $unit->id_unit; ?>/<?php echo $result->id_buka; ?>/<?php echo $siswa->id; ?>">
                                                <i class="fa fa-trash-o"></i></a>                                            
                                            </td>
                                        </tr>
                                    <?php $no++; endforeach ; ?>
              </tbody>
           </table>
          </div><!-- table-responsive -->
          <div class="clearfix mb30"></div>
        </div><!-- panel-body -->
		<div class="panel-footer">
	        <button id="cariSiswa" class="btn btn-warning">Cari</button>
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