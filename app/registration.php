<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>
<?php require_once "../data/data_access.php"; ?>

<script>
    function uploadImage(){
        //Returns a list of files
        var fileObj = document.getElementsByName("img")[0];
        //Picking the first one
        var file = fileObj.files[0];
        //Preparing the form data
        var formdata = new FormData();
        formdata.append("img", file);

        xhr = new XMLHttpRequest();
        xhr.open("POST", "handle.php", true);

        xhr.onreadystatechange = function(){
            if(xhr.readyState==4){
                //Displaying the image receieved from the server
                var img = document.getElementsByTagName("img")[0];
                img.src = xhr.responseText;                
            }
        }
        xhr.send(formdata);
    }
</script>





<html>
	<form  method="post" >
		<center>
			<table border="0" width=25% height=60% cellpadding="2px" cellspacing="0px">
				<tr>
					<td colspan="2"  > 
					<font size="10"><center>Signup</center></font>
					</td>
				<tr>
				<tr>
					<td >ID</td>
					<td > <input  type="text" Name="id"  /> </td>
				</tr>
				<tr>
					<td >NAME</td>
					<td > <input  type="text" Name="name"  /> </td>
				</tr>
				<tr>
					<td >EMAIL</td>
					<td > <input  type="text" Name="email"/> </td>
				</tr>
				<tr>
					<td >Password</td>
					<td > <input  type="password" Name="password"  /> </td>
				</tr>
				<tr>
					<td >Confirm Password</td>
					<td > <input  type="password" Name="conpassword"  /> </td>
				</tr>
				<tr>
					<td >Mobile</td>
					<td > <input  type="text" Name="mobile"  /> </td>
				</tr>
				<tr>
					<td >School</td>
					<td > <input  type="text" Name="school"  /> </td>
				</tr>
				
				<tr>
					<td >College</td>
					<td > <input  type="text" Name="college"  /> </td>
				</tr>
				<tr>
					<td >University</td>
					<td > <input  type="text" Name="university"  /> </td>
				</tr>
				<tr>
					<td >Facebook</td>
					<td > <input  type="text" Name="facebook"  /> </td>
				</tr>
				
				<tr>
					<td >Workplace</td>
					<td > <input  type="text" Name="workplace"  /> </td>
				</tr>
				<tr>
					<td >Designation</td>
					<td > <input  type="text" Name="designation"  /> </td>
				</tr>
				<tr>
					<!--<td><input type="file" Name="file_img" />-->
						
					
					
				</tr>
				<!--<tr>
					<td >Photo</td>
					<td > <input  type="file" Name="photo"  /> </td>
				</tr>-->
				<tr>
					<td align="right" colspan="3" > 
					  <input  type="submit" value="Submit"  />
					  <input  type="button" value="Reset" />
					</td>
				</tr>
			</table>
		</center>
	</form>
</html>


<?php
if($_SERVER['REQUEST_METHOD']=="POST")

{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$conpassword = $_POST['conpassword'];
	$id = $_POST['id'];
	$mobile = $_POST['mobile'];
	$school = $_POST['school'];
	$college = $_POST['college'];
	$university = $_POST['university'];
	$facebook = $_POST['facebook'];
//	$photo = $_FILES['photo']['name'];
	$workplace = $_POST['workplace'];
	$designation = $_POST['designation'];
	//$product_image = $_FILES['logo']['name'];
   // $tmp_dir = $_FILES['logo']['tmp_name'];
   // $imgSize = $_FILES['logo']['size'];
   // echo $product_image;
	

			 
		// $upload_dir = '../img/'; 
		// move_uploaded_file($tmp_dir, "$upload_dir$product_image");
		// $product_img_path = "../img/" . $product_image;

	/* $filetmp = $_FILES['file_img']['tmp_name'];
    echo $filetmp;
    $filename = $_FILES['file_img']['name'];
    //$filetype = $_FILES["file_img"]["type"];
    $filepath = "photo/".$filename;
    
    move_uploaded_file($filetmp,$filepath);*/
    
   


	
		
		$person['name'] = $name;
		$person['email'] = $email;
		$person['id'] = $id;
		$person['pass'] = $password;
		$person['mobile'] = $mobile;
		$person['school'] = $school;
		$person['college'] = $college;
		$person['university'] = $university;
		$person['workplace'] = $workplace;
		$person['designation'] = $designation;
		$person['facebook'] = $facebook;
		$person['type'] = "mate";
		//$person['photo'] =  $filepath;

		if(empty($name) || empty($email) || empty($password) || empty($conpassword) || empty($id) || empty($email)){
					echo "Please fill the full FORM"."</br>";
				}
			else if(empty($name) || str_word_count($name)<2){ 
					echo " Please Enter Valid and Full Name"."</br>";
				}
		
			else if($password!==$conpassword){ 
					echo "Password does not match !"."</br>";
				}
		/*	else if(!checkMail($email))
			{
				echo "Email Already Used Please try with an Unique EMAIL"."</br>";
			} */

			else if(strlen($mobile)!==11){
				echo"Please Enter Valid Phone Number"."</br>";
			}
			else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo"Please enter valid email"."</br>";
			}
			else if(strlen($password)!==8)
			{
				echo "Password Must Be Eight Digit"."</br>";
			}

		
	
	 else{
	 	if(addPerson($person) && addLogin($person)){ 

                echo "Record Added<hr/>";
                die();
            }
          
            else{
                echo "Internal Error<hr/>";
            }
	
}
}

?>

