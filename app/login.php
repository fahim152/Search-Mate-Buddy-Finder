	
<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>
<html>
	<form method="POST">
			<table border="0" align="center" cellpadding="5px" cellspacing="0px">
				<tr>
					<td colspan="2"><font size="10" ><center>SEARCH MATE</center> </font></td>
				</tr>
				<tr>
					<td colspan="2"><font size="5" ><center>LOGIN PANEL </center> </font></td><tr>
				</tr>
				<tr>
					<td>ID</td>
					<td > <input  type="text" Name="id"  /> </td>
				</tr>
				<tr>
					<td >PASSWORD</td>
					<td > <input  type="password" Name="password"  /> </td>
				</tr>
				
				<tr>
					<td colspan="2" align="center"> 
					 <input  type="submit" value="LOGIN" />
					</td>
				</tr>
				<tr >
				<td colspan="2" align="center"> Not registered ? <a href="registration.php"> Signup Here. </a></td>
				</tr>
			</table>
	</form>
</html>

<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
	$id = $_POST['id'];
	$password = $_POST['password'];
	
	if(!empty($id) && !empty($password)){
		echo "";
	
	}
	else{
		echo" PLEASE ENTER ID AND PASSWORD ";
	}
	//$person['id'] = $id;
	//$person['pass'] = $password;
	
	$_SESSION["id"] = $id;
	

	if(getPersonByPasswordFromDb($password,$id)  ){

		if(getPersonsTypeFromDb($id)=="mate" && insertOnlineUser($id)){

				header('Location: userprofile.php');
			} 

		elseif(getPersonsTypeFromDb($id)=="moderator"){
			header('Location: modprofile.php');
			} 

			elseif(getPersonsTypeFromDb($id)=="admin"){
			header('Location: admin.php');
			} 

		}

		else{
			echo"Please enter valid user name and password ";
		}


	}

	







?>