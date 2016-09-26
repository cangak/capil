<?php
require_once __DIR__ . "/../../../inc/class/Session.php";
$session = new Session();
if ($session->wes_entek()) {
    $session->end();

    header('location:/login.php');
} else {
    include __DIR__ . "/../../../inc/Db.class.php";
    $db = new DB();
    if (isset($_GET['id']) and $_GET['id'] != '') {
        $lev = $session->getlevel();
        $data = $db->query("SELECT t_reg.status,t_reg_stat.`INFO` FROM t_reg LEFT JOIN t_reg_stat ON (t_reg.`ID_REG`=t_reg_stat.`ID_REG`) WHERE t_reg.ID_REG='" . $_GET['id'] . "' ORDER BY t_reg_stat.`id` DESC LIMIT 1");
        if ($lev == 4) {
            if ($data[0]['status'] == 'panding') {
                echo '<form action="module/ajax/t_reg/proses.php" method="POST" name="proses_operator" id="proses_operator">
        <input type="hidden" name="proses_status" value="1">
        <input type="hidden" name="id_reg" value="' . $_GET['id'] . '">';
                echo '<div class="col-md-12">
             <div class="form-group">
              <label class="control-label" for="status">Status Data</label>
              <select id="status" name="status" class="form-control">
              <option value="panding" ' . ($data[0]['status'] == "panding" ? "selected" : "") . '>Pending</option>
              <option value="proses" ' . ($data[0]['status'] == "proses" ? "selected" : "") . '>Proses</option>
                       </select></div></div>
                <div class="col-md-12">
                 <div class="form-group">
                  <label class="control-label" for="status">Info</label>
                  <textarea style=" resize: none;" id="info" name="info" class="form-control">' . ($data[0]['INFO'] != "" ? $data[0]['INFO'] : "") . '</textarea></div>
              <div class="form-group"> <button id="kirim_proses" type="submit" class="btn btn-primary">Kirim</button> </div></div></form>';
            } else if ($data[0]['status'] != 'panding') {
                echo $data[0]['status'];
            }
        } else {

            echo '<form action="module/ajax/t_reg/proses.php" method="POST" name="proses_operator" id="proses_operator">
        <input type="hidden" name="proses_status" value="1">
        <input type="hidden" name="id_reg" value="' . $_GET['id'] . '">';
            echo '<div class="col-md-12">
        		 <div class="form-group">
        		  <label class="control-label" for="status">Status Data</label>
        		  <select id="status" name="status" class="form-control">
        		  <option value="panding" ' . ($data[0]['status'] == "panding" ? "selected" : "") . '>panding</option>
        		  <option value="proses" ' . ($data[0]['status'] == "proses" ? "selected" : "") . '>Proses</option>
        		  <option value="selesai" ' . ($data[0]['status'] == "selesai" ? "selected" : "") . '>Selesai</option>
              </select></div></div>
                <div class="col-md-12">
                 <div class="form-group">
                  <label class="control-label" for="status">Info</label>
                  <textarea style=" resize: none;" id="info" name="info" class="form-control">' . ($data[0]['INFO'] != "" ? $data[0]['INFO'] : "") . '</textarea></div>
              <div class="form-group"> <button id="kirim_proses" type="submit" class="btn btn-primary">Kirim</button> </div></div></form>';
        }?>
       <script>
       $("#kirim_proses").click(function(event) {
         event.preventDefault();
        var formData = $("#proses_operator").serialize();
        var URL = $("#proses_operator").attr("action");
        $.post(URL,    formData)
            .done(function(data, textStatus, jqXHR)
    {
       $('#modal-7').modal('hide');
            location.reload();

       // alert(data);
    });
    });

    </script>
  <?php

    } elseif (isset($_POST['proses_status']) and $_POST['proses_status'] == 1) {
        $t = date("d/m/Y");
        $us = $session->getusernmae();
        $data = $db->query("insert into t_reg_stat (ID_REG,TGL,INFO,ID_USER) value ('$_POST[id_reg]','$t','$_POST[info]','$us')");
        $ud = $db->query("update t_reg set status='$_POST[status]' where ID_REG='$_POST[id_reg]'");
    }
}
