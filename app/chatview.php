<?php
require_once "../service/validation_service.php"; 
    require_once "../service/person_service.php";
    require_once "../data/data_access.php"; 

$personId = $_GET['u_id'];
$personId1 = $_GET['r_id'];

 $sql = "SELECT * FROM message where (u_id=$personId AND r_id = $personId1)
 OR (u_id=$personId1 AND r_id = $personId)";        
        $result = executeSQL($sql);
         
        //$persons = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $personId =  getPersonById($row['u_id']);
            echo $personId['name']." : ";

			echo $row['message']."<br>";
        }
 
        



?>