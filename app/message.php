<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>

<hr/>
<a href="userprofile.php">HOME</a>
<?php
    if(isset($_GET['u_id'])){
        $personId = trim($_GET['u_id']);
        $personId1 = trim($_GET['r_id']);
        $person = getPersonById($personId);
        //$person1 = getPersonById($personId1);
        if(isset($person)==false){
            echo "<hr/>";
            die();
        }
    }
    else{
        echo "<hr/>";
        die();
    }


     $person = friendStatus($personId);
     

    ?>
    <form method="post">
<fieldset>
<legend>MESSAGE</legend>
    <textarea  name="text" rows="4" cols="50" >
    </textarea>
    <input type ="submit" name="submit" value="Send"/>
    </fieldset>
</form>
    <?php 
        if(isset($_POST['submit']))
        {   
            $message = $_POST['text'];
            $time = time();
            

            if(messageSend($personId,$personId1,$message))
            {
                echo "message send sucessfully";
            }

        }


    ?>
   
   

