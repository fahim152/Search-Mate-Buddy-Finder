<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>

<hr/>
<a href="userprofile.php">HOME</a>
<?php
   // if(isset($_GET['id'])){
        $personId = trim($_GET['id']);
       // $personId1 = trim($_GET['r_id']);
        //$person = getPersonById($personId);
        //$person1 = getPersonById($personId1);
        //if(isset($person)==false){
         //   echo "<hr/>";
           // die();
       // }//
   // }
   // else{
     //   echo "<hr/>";
   //     die();
  //  }


     $persons = friendStatus($personId);
     //var_dump($persons);

    ?>
<fieldset>
<legend>FRIEND REQUESTS</legend>
    <table border="1" cellspacing="0" cellpadding="5">
                <tr>
                     <th>Request</th>
                    <th>Accept</th>
                   
                    
                    
                    
                   
                </tr>
                <?php if (count($persons) == 0) { ?>
                    <tr>
                        <td colspan="5">NO RECORD FOUND</td>
                    </tr>
                <?php } ?>

                <?php foreach ($persons as $person) { ?>
                
                
                    <tr>
                        
                        <td>

                        <?php

                       if($person['u_id'] == $personId)
                        {
                             $personId1 = $person['r_id'];
                             $person = getPersonById($personId1);
                             echo $person['name'];

                        } 

                        elseif($person['r_id'] == $personId)
                        {
                             $personId1 = $person['u_id'];
                             $person = getPersonById($personId1);
                             echo $person['name'];
                        }
                          

                        ?>


                        </td>
                        
                        
                      

                      <td><a href="detailfriend.php?u_id=<?= $personId?>&&r_id=<?=$personId1?>">View Details</a></td>
                        
                        
                   
                        

                    </tr>
              <?php }?>
     </table>  
     </fieldset>
   
   

