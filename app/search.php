<?php
	session_start();

	
    require_once "../service/validation_service.php"; 
   require_once "../service/person_service.php"; 
   if(isset($_GET['id'])){
        $personId = trim($_GET['id']);
        
    }


    $searchKey = $searchBy = ""; 
    $searchBySelected = array("Any"=>null, "Name"=>null, "Email"=>null,"School"=>null,"College"=>null,"University"=>null,"Workplace"=>null);



    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $searchKey = trim($_POST['name']);
        $searchBy = $_POST['search_by'];
        $searchBySelected[$searchBy] = "selected";
        
        if($searchBy=="Name"){
            $persons = getPersonsByName($searchKey);
        }
        else if($searchBy=="Email"){
            $persons = getPersonsByEmail($searchKey);
        }
        else if($searchBy=="School"){
            $persons = getPersonsBySchool($searchKey);
        }
         else if($searchBy=="College"){
            $persons = getPersonsByCollege($searchKey);
        }
         else if($searchBy=="University"){
            $persons = getPersonsByUniversity($searchKey);
        }
         else if($searchBy=="Workplace"){
            $persons = getPersonsByWorkplace($searchKey);
        }
        else{
            $persons = getPersonsByNameOrEmail($searchKey);
        }
    }
    else {
        $persons = getAllPersons();
    }

   // $per = GetAllModeratorByIdToDb();
   
	
?>
<?php
    

if (isset($_POST['logout'])) {
	session_destroy();
	header('Location:login.php');
    }



?>


<html> 
<a href="userprofile.php">HOME</a>
<fieldset>
            <legend>Mate Panel</legend>


	
 <form method="post">
	SEARCH  <input name="name"/>
	<input type="submit" value="SEARCH" style="font-size:20px"/>
	<select name="search_by">
                    <option <?= $searchBySelected["Any"] ?>>Any</option>
                    <option <?= $searchBySelected["Name"] ?>>Name</option>
                    <option <?= $searchBySelected["Email"] ?>>Email</option>
                    <option <?= $searchBySelected["School"] ?>>School</option>
                    <option <?= $searchBySelected["College"] ?>>College</option>
                    <option <?= $searchBySelected["University"] ?>>University</option>
                    <option <?= $searchBySelected["Workplace"] ?>>Workplace</option>
                </select>
</form>	

<table border="1" cellspacing="0" cellpadding="5">
                <tr>
                    <th>ID</th>
		            <th>NAME</th>
		            <th>EMAIL</th>
                    <th>SCHOOL</th>
                    <th>COLLEGE</th>
                    <th>UNIVERSITY</th>
                    <th>WORKPLACE</th>
		            
		            
		            
                    <th colspan="3"></th>
                </tr>
                
                <?php if (count($persons) == 0) { ?>
                    <tr>
                        <td colspan="5">NO RECORD FOUND</td>
                    </tr>
                <?php } ?>

                <?php foreach ($persons as $person) { ?>
                    <tr>
                        <td><?= $person['id'] ?></td>
                        <td><?= $person['name'] ?></td>
                        <td><?= $person['email'] ?></td>
                        <td><?= $person['school'] ?></td>
                        <td><?= $person['college'] ?></td>
                        <td><?= $person['university'] ?></td>
                        <td><?= $person['workplace'] ?></td>
                        
                       
                      
                        <td><a href="mate_details.php?id=<?= $person['id'] ?>">details</a></td>
                         <td><a href="friendrequest.php?u_id=<?= $personId ?>&&r_id=<?= $person['id'] ?>">Send Friend Request</a></td>


                    </tr>
                <?php } ?>
     </table>  
     </fieldset>
 
	 <!--<form method="post"> <input type="submit" class="button" name="logout" value="LOGOUT" style="margin-left:1080px;font-size:20px> </form>-->
	
	 <br/>
	
	



</html>


