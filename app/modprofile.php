<?php 
 require_once "../service/validation_service.php"; 
 require_once "../service/person_service.php"; 
session_start();
$id = $_SESSION['id'];
    if(isset($_SESSION['id'])==false){
        header("location: login.php");
    }

//echo $id;

	/*if($conn){
		$query="SELECT * FROM registration WHERE id = $id";
		$result = mysqli_query($conn,$query);		
		while($row=mysqli_fetch_assoc($result)){
		$id = $row['id'];
		$name = $row['name'];
		$pass =	$row['pass'];
		$email = $row['email'];
		$mobile = $row['mobile'];
		$school = $row['school'];
		$college = $row['college'];
		$university = $row['university'];
		$workplace = $row['workplace'];
		$designation = $row['designation'];
		$facebook = $row['facebook'];
		
		}
	}*/
	

	$person = getPersonByIdFromDb($id);
	$peson1 = getAllPersons();


?>


<html>
	<form method="post">
			<table border="1" width=70% height=90% align="center" cellpadding="5px" cellspacing="0px">
				<tr>
					<td colspan="2"><font size="10" ><center>Profile</center> </font></td>
				</tr>
				<tr>
				
					<td rowspan="2"><center>***IMAGE<center></td>
					<td><font size="7" >Name : <?php echo $person['name']; ?></font></td><tr> 
					<td>ID : <?php echo $person['id']; ?></td>
				</tr>
				<tr>
					<td>TYPE</td>
					<td><?php echo 'moderator'; ?></td>
				</tr>
				<tr>
					<td>MOBILE</td>
					<td><?php echo $person['mobile']; ?></td>
				</tr>
				<tr>
					<td>EMAIL</td>
					<td><?php echo $person['email']; ?></td>
				</tr>
				<tr>
					<td>SCHOOL</td>
					<td><?php echo $person['school']; ?></td>
				</tr>
				<tr>
					<td>COLLEGE</td>
					<td><?php echo $person['college'];?></td>
				</tr>
				<tr>
					<td>UNIVERSITY</td>
					<td><?php echo $person['university']; ?></td>
				</tr>
				<tr>
					<td>WORKPLACE</td>
					<td><?php echo $person['workplace']; ?></td>
				</tr>   
					<td>DESGNATION</td>
					<td><?php echo $person['designation']; ?></td>
				</tr>
				<tr>
					<td>FACEBOOK</td>
					 <td><?php echo $person['facebook']; ?></td>
				</tr>
				<tr>
					<td><input type="submit" value="Logout" name="logout"/></td>
					<td><a href="request.php?id=<?= $person['id'] ?>">Request For Authentication</a><br/>
					
					</td>

				</tr>
			</table>
			
	</form>

	<table>
		
			<tr></tr>
		
	</table>


	<?php
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        
        header('Location:login.php');
    }
    ?>


	
</html>