<?php
require_once __DIR__ . "/../../../inc/class/Session.php";
require_once __DIR__ . "/../../../inc/encryption/function.php";
$session = new Session();

if ($session->wes_entek()) {
    $session->end();

    header('location:/login.php');
} else {
    include __DIR__ . "/../../../inc/Db.class.php";
    $db = new DB();
    if (isset($_GET['id']) and $_GET['id'] != '') {
        $bayaram = $db->query("select ID_REG,N_RETRI,IS_LUNAS FROM t_reg WHERE ID_REG='$_GET[id]'");
        foreach ($bayaram as $key) {
            if ($key['N_RETRI'] == 0 or $key['IS_LUNAS'] == 1) {
                echo "no reg " . $_GET['id'] . " Sudah melunasi retribusinya, klik print untuk mencetak invoice<p>";
                echo '<a class="btn btn-primary btn-icon icon-left hidden-print"
                    href="?' . urlc('module=t_reg&act=kasir&id=' . $_GET['id']) . '">Print invoice<i class=
                    "entypo-doc-text"></i></a>';

            } else {
                echo '<form action="module/ajax/t_reg/kasir.php" method="POST" name="bayar_kasir" id="bayar_kasir">
                <input type="hidden" name="proses_bayar" value="1">
                <div class="col-md-12">
        		<div class="form-group">
        			<label class="control-label" for="noreg">No Registrasi</label>
        		  	<input class="form-control" name="noreg" id="noreg" value="' . $key['ID_REG'] . '" readonly="readonly">
        		</div>
        		<div class="form-group">
        			<label class="control-label" for="tglbyr">Tanggal Bayar</label>
        		  	<input class="form-control" name="tglbyr" id="tglbyr" value="' . date("Y/m/d") . '" readonly="readonly">
        		</div>
        		<div class="form-group">
        			<label class="control-label" for="nbyr">Nilai Bayar</label>
        		  	<input class="form-control" name="nbyr" id="nbyr" value="' . $key['N_RETRI'] . '"  readonly="readonly">
        		</div>
        		<div class="form-group">
        			<label class="control-label" for="info">Info Bayar</label>
        		  	<textarea class="form-control autogrow" name="info" id="info" rows="5" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 99px;"></textarea>
        		</div>
        		<div class="form-group"> <button id="t_bayar" type="submit" class="btn btn-primary">Kirim</button> </div>
        	</div></form>
        	';
            }
        }?>
 <script>
       $("#t_bayar").click(function(event) {
         event.preventDefault();
        var formData = $("#bayar_kasir").serialize();
        var URL = $("#bayar_kasir").attr("action");
        $.post(URL,    formData)
            .done(function(data, textStatus, jqXHR)
    {
    //   $('#modal-7').modal('hide');
    //location.reload();
//        var ulr="<?php echo urlc('module=t_reg&act=kasir&id=' . $_GET['id']); ?>";
        location.href ='?<?php echo urlc('module=t_reg&act=kasir&id=' . $_GET['id']); ?>';

     //  alert(data);
    });
    });

    </script>
        <?php
} else if (isset($_POST['proses_bayar']) and $_POST['proses_bayar'] == 1) {
        $t = date("Y/m/d");
        $us = $session->getusernmae();
        $data = $db->query("insert into t_reg_byr (ID_REG,TGL,INFO,N_BAYAR,ID_USER) value ('$_POST[noreg]','$t','$_POST[info]','$_POST[nbyr]','$us')");
        $ud = $db->query("update t_reg set IS_LUNAS='1' where ID_REG='$_POST[noreg]'");

    }
}
