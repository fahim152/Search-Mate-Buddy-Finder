<?php require_once "../service/person_service.php"; ?>
<?php require_once "../service/validation_service.php"; ?>
<hr/>
<a href="admin.php">HOME</a>
<hr/>

<?php
    $name = $email = $mobile = $school = $college = $university = $facebook = $workplace = $designation = "";
    $nameErr = $emailErr = "";    
?>

<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $id=$_POST['id'];
        $name=trim($_POST['name']);
        $email=trim($_POST['email']);
        $mobile=trim($_POST['mobile']);
        $school=trim($_POST['school']);
        $college=trim($_POST['college']);
        $university=trim($_POST['university']);
        $facebook=trim($_POST['facebook']);
        $workplace=trim($_POST['workplace']);
        $designation=trim($_POST['designation']);
        
        $isValid = true;        
        if(empty($email)){
            $isValid = false;
            $emailErr = "*";
        }
        else if(isValidEmail($email)==false){
            $isValid = false;
            $emailErr = "Invalid email format";
        }
        else if(isUniquePersonEmailForUpdate($id, $email)==false){
            $isValid = false;
            $emailErr = "Email is not unique";
        }
        
        if(empty($name)){
            $isValid = false;
            $nameErr = "*";
        }
        else if(isValidPersonName($name)==false){
            $isValid = false;
            $nameErr = "At least two words required, Only letters and white space allowed";
        }
        
        if($isValid==true){
            $person['id']= $id;
            $person['name'] = $name;
            $person['email'] = $email;
            $person['mobile'] = $mobile;
            $person['school']= $school;
            $person['college'] = $college;
            $person['university'] = $university;
            $person['facebook'] = $facebook;
            $person['workplace'] = $workplace;
            $person['designation'] = $designation;


          
            if(editPerson($person)==true){
                echo "Record Updated<hr/>";
                die();
            }
            else{
                echo "Internal Error<hr/>";
                die();
            }
        }
    }
    else{
        if(isset($_GET['id'])){
            $person = getPersonById($_GET['id']);
            if(isset($person)==false){
                die();
            }
            $id=$person['id'];
            $name=$person['name'];
            $email=$person['email'];
            $mobile=$person['mobile'];
            $school=$person['school'];
            $college=$person['college'];
            $university=$person['university'];
            $facebook=$person['facebook'];
            $workplace=$person['workplace'];
            $designation=$person['designation'];
          
        }
    }
?>

<fieldset>
    <legend>UPDATE</legend>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>" />
        <table border="0" cellspacing="0" cellpadding="3">
            <tr>
                <td>NAME</td>
                <td><input name="name" value="<?= $name ?>"/></td>
                <td><?=$nameErr?></td>
            </tr>
            <tr>
                <td>EMAIL</td>
                <td><input name="email" value="<?= $email ?>"/></td>
                <td><?=$emailErr?></td>
            </tr>
             <tr>
                <td>MOBILE</td>
                <td><input name="mobile" value="<?= $mobile ?>"/></td>
                
            </tr>
             <tr>
                <td>SCHOOL</td>
                <td><input name="school" value="<?= $school ?>"/></td>
                
            </tr>
             <tr>
                <td>COLLEGE</td>
                <td><input name="college" value="<?= $college ?>"/></td>
                
            </tr>
             <tr>
                <td>UNIVERSITY</td>
                <td><input name="university" value="<?= $university ?>"/></td>
                
            </tr>
             <tr>
                <td>FACEBOOK</td>
                <td><input name="facebook" value="<?= $facebook ?>"/></td>
                
            </tr>
             <tr>
                <td>WORKPLACE</td>
                <td><input name="workplace" value="<?= $workplace ?>"/></td>
                
            </tr>
             <tr>
                <td>DESIGNATION</td>
                <td><input name="designation" value="<?= $designation ?>"/></td>
                
            </tr>

        </table>
        <hr/>
        <input type="submit" value="SAVE" />
    </form>
</fieldset>