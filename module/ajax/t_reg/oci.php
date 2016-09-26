<?php
require_once __DIR__ . "/../../../inc/class/Session.php";
$session = new Session();

if ($session->wes_entek()) {
    $session->end();
    header('location:/login.php');
} else {
    $conn = oci_connect('siakoff', 'ora_off_05', '192.10.10.200/SIAKDB');
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    if (isset($_POST['keywords']) and $_POST['keywords'] != '') {
        if ($_POST['golek'] == 'lapor' or $_POST['golek'] == 'reg_nama') {
            $detail = "SELECT
TO_CHAR(A.NIK) AS nik,
TO_CHAR(A.NO_KK) AS kk,
A.NAMA_LGKP,
A.JENIS_KLMIN,
CASE A.JENIS_KLMIN WHEN 1 THEN 'LAKI-LAKI' ELSE 'PEREMPUAN' END nm_jenis_klmin,
B.ALAMAT,
B.NO_RT,
B.NO_RW,
B.NO_PROP,
B.NO_KAB,
B.NO_KEC,
B.NO_KEL
FROM BIODATA_WNI A
INNER JOIN DATA_KELUARGA B ON (A.NO_KK = B.NO_KK)
WHERE TO_CHAR(A.NAMA_LGKP) like  '%" . strtoupper($_POST['keywords']) . "%'";
        } elseif ($_POST['golek'] == 'reg_nik') {
            $detail = "SELECT
TO_CHAR(A.NIK) AS nik,
TO_CHAR(A.NO_KK) AS kk,
A.NAMA_LGKP,
A.JENIS_KLMIN,
CASE A.JENIS_KLMIN WHEN 1 THEN 'LAKI-LAKI' ELSE 'PEREMPUAN' END nm_jenis_klmin,
B.ALAMAT,
B.NO_RT,
B.NO_RW,
B.NO_PROP,
B.NO_KAB,
B.NO_KEC,
B.NO_KEL
FROM BIODATA_WNI A
INNER JOIN DATA_KELUARGA B ON (A.NO_KK = B.NO_KK)
WHERE TO_CHAR(A.NIK) like  '%" . strtoupper($_POST['keywords']) . "%'";
        } elseif ($_POST['golek'] == 'reg_kk') {
            $detail = "SELECT
TO_CHAR(A.NIK) AS nik,
TO_CHAR(A.NO_KK) AS kk,
A.NAMA_LGKP,
A.JENIS_KLMIN,
CASE A.JENIS_KLMIN WHEN 1 THEN 'LAKI-LAKI' ELSE 'PEREMPUAN' END nm_jenis_klmin,
B.ALAMAT,
B.NO_RT,
B.NO_RW,
B.NO_PROP,
B.NO_KAB,
B.NO_KEC,
B.NO_KEL
FROM BIODATA_WNI A
INNER JOIN DATA_KELUARGA B ON (A.NO_KK = B.NO_KK)
WHERE TO_CHAR(A.NO_KK) like  '%" . strtoupper($_POST['keywords']) . "%'";
        }

        //  echo $detail;
        $res = oci_parse($conn, $detail);
        oci_execute($res);
        /*  echo '  <div class="panel panel-primary">
        <div class="panel-body">
        <div class="form-horizontal form-groups-bordered">
        <div class="form-group">
        <label class="col-sm-1 control-label">NIK</label>
        <div class="col-sm-3">
        <input id="NIK" placeholder="NIK" type="text" name="NIK" class="form-control">
        </div>
        <label class="col-sm-5 control-label">Kecamatan</label>
        <div class="col-sm-3">
        <input id="kecamata" placeholder="Kecamatan" type="text" name="kecamatan" class="form-control">
        </div>
        </div>

        <div class="form-group">
        <label class="col-sm-1 control-label">NO KK</label>
        <div class="col-sm-3">
        <input placeholder="NO KK" type="text" name="kk" class="form-control">
        </div>
        <label class="col-sm-5 control-label">Kelurahan</label>
        <div class="col-sm-3">
        <input id="Kelurahan" placeholder="Kelurahan" type="text" name="kelurahan" class="form-control">
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-1 control-label">Alamat</label>
        <div class="col-sm-11">
        <textarea name="kk" class="form-control"></textarea>
        </div>
        </div>
        <div class="form-group">
        <label class="col-sm-1 control-label">RT</label>
        <div class="col-sm-2">
        <input placeholder="RT" type="text" name="rt" class="form-control">
        </div>
        <label class="col-sm-1 control-label">RW</label>
        <div class="col-sm-2">
        <input placeholder    ="RW" type="text" name="rw" class="form-control">
        </div>
        <div class="col-sm-3">
        <button style="float: right;" class="btn btn-default">Cari</button>
        </div>
        </div>

        </div>*/
        echo '<hr />
			<div>
				<table class="table table-bordered  table-striped">
					<tr>
						<th>NIK</th>
						<th>KK</th>
						<th>Nama Lengkap</th>
						<th>Alamat</th>
						<th>Gender</th>
						<th>RT</th>
						<th>RW</th>
						<th>Prop</th>
						<th>Kab.</th>
						<th>Kec</th>
						<th>Kel</th>
						<th>aksi</th>
					</tr>';
        while ($row = @oci_fetch_assoc($res)) {
            echo "<tr>
					 	<td class='NIK'>" . $row['NIK'] . "</td>
					 	<td class='KK'>" . $row['KK'] . "</td>
					 	<td class ='NL'>" . $row['NAMA_LGKP'] . "</td>
					 	<td class ='ALM'>" . $row['ALAMAT'] . "</td>
					 	<td class ='JK'>" . $row['NM_JENIS_KLMIN'] . "</td>
					 	<td class ='RT'>" . $row['NO_RT'] . "</td>
					 	<td class ='RW'>" . $row['NO_RW'] . "</td>
					 	<td class ='PROP'>" . $row['NO_PROP'] . "</td>
					 	<td class ='KAB'>" . $row['NO_KAB'] . "</td>
					 	<td class ='KEC'>" . $row['NO_KEC'] . "</td>
					 	<td class ='KEL'>" . $row['NO_KEL'] . "</td>
					 	<td><button id='" . $_POST['golek'] . "' type='button' class='btn btn-blue guna'>Pilih</button></td>
					 	</tr>";
        }

        echo '</table>
			</div>
			</div>
			</div>
		</div>';
        ?>
<script>
$(".guna").click(function() {
	 var idne = (jQuery(this).attr("id"));
    var nik = $(this).closest("tr").find(".NIK").text();
    var kk = $(this).closest("tr").find(".KK").text();
    var nl = $(this).closest("tr").find(".NL").text();
    var alm = $(this).closest("tr").find(".ALM").text();
    var jk = $(this).closest("tr").find(".JK").text();
    var rt = $(this).closest("tr").find(".RT").text();
    var rw = $(this).closest("tr").find(".RW").text();
    var prop = $(this).closest("tr").find(".PROP").text();
    var kab = $(this).closest("tr").find(".KAB").text();
    var kec = $(this).closest("tr").find(".KEC").text();
    var kel = $(this).closest("tr").find(".KEL").text();
    if (idne=='lapor') {
    	$('#hasilcari').modal('hide');
    	$(".NM_LAPOR").val(nl);
    	$("#alm_lapor").val(alm);
    	$(".ID_KEC").val(kec);

    } else if ((idne =='reg_nik') || (idne=='reg_nama') || (idne=='reg_kk')) {
    	$('#hasilcari').modal('hide');
    	$(".NIK").val(nik);
    	$(".KK").val(kk);
    	$(".NAMA_REG").val(nl);
    	$("#ALM_REG").val(alm);
    	$("#"+jk).prop('checked', true);


    }
   // alert(nik);       // Outputs the answer
	});</script>
		<?php
}
}
