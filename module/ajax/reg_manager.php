<?php
///include "../../inc/encryption/function.php";
include __DIR__ . "/../../inc/class/Session.php";
$session = new Session();

$table = 't_reg';

// Table's primary key
$primaryKey = 'ID_REG';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(

    array('db' => 'A.ID_REG', 'dt' => "0", 'field' => 'id_reg', 'as' => 'id_reg'),
    array('db' => 'A.TGL_REG', 'dt' => "1", 'field' => 'tgl_reg', 'as' => 'tgl_reg'),
    array('db' => 'A.NM_LAPOR', 'dt' => "2", 'field' => 'nm_lapor', 'as' => 'nm_lapor'),
    array('db' => 'A.TELP_LAPOR', 'dt' => "3", 'field' => 'telp_lapor', 'as' => 'telp_lapor'),
    array('db' => 'A.NM_REG', 'dt' => "4", 'field' => 'nm_reg', 'as' => 'nm_reg'),
    array('db' => 'A.NIK', 'dt' => "5", 'field' => 'nik', 'as' => 'nik'),
    array('db' => 'A.ID_KGIAT', 'dt' => "6", 'field' => 'id_kgiat', 'as' => 'id_kgiat'),
    array('db' => 'A.ID_KGIAT_A', 'dt' => "7", 'field' => 'id_kgiat_a', 'as' => 'id_kgiat_a'),
    array('db' => 'A.ID_KGIAT_B', 'dt' => "8", 'field' => 'id_kgiat_b', 'as' => 'id_kgiat_b'),
    array('db' => 'Z.NO_STAT', 'dt' => "9", 'field' => 'stat', 'as' => 'stat'),
    array('db' => 'A.id', 'dt' => "10", 'field' => 'id', 'as' => 'id'),

);
// SQL server connection information
$settingdatabase = parse_ini_file("../../inc/settings.ini.php");
//print_r($settingdatabse);
$sql_details = array(
    'user' => $settingdatabase['user'],
    'pass' => $settingdatabase['password'],
    'db' => $settingdatabase['dbname'],
    'host' => $settingdatabase['host'],
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require '../../inc/ssp.php';
$satker = $session->get('satker');

$joinQuery = "FROM t_reg A INNER JOIN m_kegiatan_a B ON (A.ID_KGIAT_A = B.ID_KGIAT_A) INNER JOIN m_kegiatan_b C ON (A.ID_KGIAT_B = C.ID_KGIAT_B) LEFT OUTER JOIN m_kegiatan_c D ON (A.ID_KGIAT_C = D.ID_KGIAT_C) INNER JOIN m_retribusi E ON (A.ID_RETRI = E.ID_RETRI) INNER JOIN m_kec F ON (A.ID_KEC = F.ID_KEC)LEFT OUTER JOIN T_REG_STAT Z ON (A.C_ID_REG_STAT = Z.ID_REG_STAT)";
$extraWhere = "";
echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere)
);
