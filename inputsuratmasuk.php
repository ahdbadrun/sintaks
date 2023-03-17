<!DOCTYPE html>
<?php
session_start();
include "login/ceksession.php";
?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Sistem Informasi Arsip Surat Ahli Waris</title>

    <!-- Bootstrap -->
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../assets/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/icon.png">

    <!-- Custom Theme Style -->
    <link href="../assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- Profile and Sidebarmenu -->
        <?php
        include("sidebarmenu.php");
        ?>
        <!-- /Profile and Sidebarmenu -->

        <!-- top navigation -->
        <?php
        include("header.php");
        ?>
        <!-- /top navigation -->   

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Surat Masuk</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Surat Ahli Waris Masuk ><small>Tambah Surat</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="proses/proses_inputsuratmasuk.php"  name="formsuratmasuk" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Masuk <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker4'>
                            <input type='text' id="tanggalmasuk_arsipmasuk" name="tanggalmasuk_arsipmasuk" required="required" class="form-control" required="required" readonly="readonly" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
						<?php include '../koneksi/koneksi.php';
                          $sql2 		= "SELECT * FROM tb_arsipmasuk ORDER BY nomorurut_arsipmasuk DESC LIMIT 1" ;  
                          $query2  	= mysqli_query($db, $sql2);
                          $data     = mysqli_fetch_array($query2);
                          $jumlah   = mysqli_num_rows($query2);
                          $nomor = $data['nomorurut_arsipmasuk'];
                          
                          
                          if ($jumlah =0){
                            $nomorbaru = "0001";
                          } else {
                            $nomormax = substr($nomor,0,4);
                            $nomorbaru = intval($nomormax)+1;
                            }

                            ?>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Urut <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo "$nomorbaru" ?>" type="text" onkeyup="validAngka(this)" id="nomorurut_arsipmasuk" name="nomorurut_arsipmasuk" required="required" maxlength="4" placeholder="Masukkan Nomor Urut Surat" class="form-control col-md-7 col-xs-12">
                          <br>Nomor Urut harus 4 Digit (Pastikan Lihat Nomor Sebelumnya)</br>
                        </div>
                      </div>
						<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Register <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="nomor_regis" name="nomor_regis" required="required" maxlength="35" placeholder="Masukkan Nomor Register" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><p>(Pemberi Kuasa)</p>Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea id="pemberi_kuasa_nama" name="pemberi_kuasa_nama" required="required" class="form-control" rows="3" placeholder='Masukkan Nama Keluarga Pemberi Kuasa'></textarea>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><p>(Pemberi Kuasa)</p>Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea id="alamat" name="alamat" required="required" class="form-control" rows="3" placeholder='Masukkan Alamat Pemberi Kuasa'></textarea>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><p>(Pemberi Kuasa)</p>Hubungan Keluarga <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea id="pemberi_kuasa_hub" name="pemberi_kuasa_hub" required="required" class="form-control" rows="3" placeholder='Masukkan Hub Keluarga Pemberi Kuasa'></textarea>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><p>(Penerima Kuasa)</p>Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="ahli_waris_nama" name="ahli_waris_nama" required="required" placeholder="Masukkan Nama Pemberi Kuasa" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"><p>(Penerima Kuasa)</p>Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea id="penerima_kuasa_alamat" name="penerima_kuasa_alamat" required="required" class="form-control" rows="3" placeholder='Masukkan Alamat Penerima Kuasa'></textarea>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><p>(Penerima Kuasa)</p>Hubungan Keluarga <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="penerima_kuasa_hub" name="penerima_kuasa_hub" required="required" placeholder="Masukkan Nama Pemberi Kuasa" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"><p>(Keterangan Kematian)</p>Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="penerima_kuasa_nama" name="penerima_kuasa_nama" required="required" placeholder="Masukkan Nama Penerima Kuasa" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Kematian <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" id="nomor_kematian" name="nomor_kematian" required="required" maxlength="35" placeholder="Masukkan Nomor Surat" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Kematian <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                                <input type="text" class="form-control has-feedback-left" id="single_cal3" name="tanggal_kematian" placeholder="" aria-describedby="inputSuccess2Status3" required="required">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </fieldset>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">File Surat<span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                         <input name="file_suratmasuk" accept="application/pdf" type="file" id="file_suratmasuk" class="form-control" autocomplete="off"/> *max 10mb 
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kelurahan <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea id="kelurahan" name="kelurahan" required="required" class="form-control" rows="3" placeholder='Masukkan Kelurahan'></textarea>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea id="keterangan" name="keterangan" required="required" class="form-control" rows="3" placeholder='Masukkan Keterangan'></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Operator </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input value="<?php echo $_SESSION['nama'];?>" type="text" id="operator" name="operator"  readonly="readonly" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Disposisi </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select name="disposisi1" class="select2_single form-control" tabindex="-1">
                            <option></option>
                                <?php include '../koneksi/koneksi.php';
                                $sql  		= "SELECT nama_bagian FROM tb_bagian";                        
                                $query  	= mysqli_query($db, $sql);
                                while ($data = mysqli_fetch_array($query)){
                                      echo '<option value="'.$data['nama_bagian'].'">'.$data['nama_bagian'].'</option>';
                                      } 
                                ?> 
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Disposisi </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class='input-group date' id='myDatepicker'>
                            <input type='text' id="tanggal_disposisi1" name="tanggal_disposisi1" class="form-control"/>
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="datasuratmasuk.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Batal</a>
                          <button type="submit" name="input" value="Simpan" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Simpan</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../assets/vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../assets/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../assets/vendors/moment/min/moment.min.js"></script>
    <script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../assets/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../assets/vendors/select2/dist/js/select2.full.min.js"></script>
        <script src="../assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Parsley -->
    <script src="../assets/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../assets/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../assets/vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../assets/build/js/custom.min.js"></script>
	 <!-- Initialize datetimepicker -->
<script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
<script language='javascript'>
function validAngka(a)
{
	if(!/^[0-9.]+$/.test(a.value))
	{
	a.value = a.value.substring(0,a.value.length-1000);
	}
}
</script>
  </body>
</html>
