<?php
    session_start(); 
    include "connection/connect.php";
    $con_obj = new connection();
    include 'classes/experiment.php';
    $usr_obj = new users($con_obj);

	$val = $_GET["val"];
    $res = explode(" ",$val);
    $v1 = $res[0];
    $v2 = $res[1];
    $hl = $res[2];
    $rix = $res[3];
    $riy = $res[4];
    $t = $res[5];
    $flag = '0';
    $eid = $_SESSION['eid'];
    date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d H:i:s');

    $usr_obj->insertvalue($eid,$v1,$v2,$hl,$rix,$riy,$t,$flag);
?>
	

