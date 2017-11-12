<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>

<hr/>
<a href="userprofile.php">HOME</a>
<?php
    //if(isset($_GET['u_id'])){
        $personId = trim($_GET['u_id']);
        $personId1 = trim($_GET['r_id']);
        $person = getPersonById($personId);
        $person1 = getPersonById($personId1);

        //var_dump($person);
        //var_dump($person1);
        //$person1 = getPersonById($personId1);
       // if(isset($person)==false){
        //    echo "<hr/>";
           // die();
       // }
    //}
   // else{
     //   echo "<hr/>";
    //    die();
   // }


     $persons = Message($personId,$personId1);
     $persons1 = Message($personId1,$personId);
    //$personId2 = $persons['u_id'];
     //echo $personId2;
    // $person2 = getPersonById($persons['u_id']);
   // var_dump($persons);
     // var_dump($persons1);
     

    ?>
    <form method="">
<fieldset>
<legend>CONVERSATION</legend>
   
 
    <?php 
        //if(isset($_POST['submit']))
       // {   
          //  $message = $_POST['text'];
            //$time = time();
            

           // if(messageSend($personId,$personId1,$message))
           // {
               // echo "message send sucessfully";
          //  }

       // }

    if (count($persons) == 0) { ?>
                    <tr>
                        <td colspan="5">NO RECORD FOUND</td>
                    </tr>
                <?php } 

                foreach ($persons as $person) { 

                $personId2 = $person['u_id'];
                $persons = getPersonById($personId2);
                echo $persons['name']." : ".$person['message']."</br>";
            }
             

         //echo  $persons['u_id']." : ".$persons['message']."<br/>";

     

    ?>
   
      </fieldset>
</form>

