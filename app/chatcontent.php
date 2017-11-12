<?php
session_start();
//include_once('config.php');
require_once "../service/validation_service.php"; 
require_once "../service/person_service.php";
require_once "../data/data_access.php"; 
if(isset($_POST['chat']))
{
	$personId = $_GET['u_id'];
	$personId1 = $_GET['r_id'];
	echo $personId;
	 $sql = "INSERT  INTO message(c_id,u_id,r_id,message,time) VALUES(NULL,$personId,$personId1,'$_POST[chat]',now())";
         $result = executeSQL($sql);
         return $result;
	
	}

?>