<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>

<hr/>
<a href="userprofile.php">HOME</a>
<?php
   // if(isset($_GET['id'])){
       global $personId;
        $personId = trim($_GET['id']);
        //echo $personId;
       // $personId1 = trim($_GET['r_id']);
        //$person = getPersonById($personId);
        //$person1 = getPersonById($personId1);
       // if(isset($person)==false){
         //   echo "<hr/>";
           /// die();
      //  }
   // }
    //else{
     ///   echo "<hr/>";
     //   die();
   // }


     $persons = checkAllFriend($personId);
    // $personId = $persons['u_id'];
   //  $person = getPersonById($persons['u_id']);
     //var_dump($persons);

     global $personId1;
     global $personId2;
    ?>
<fieldset>
<legend>FRIEND LIST</legend>
    <table border="1" cellspacing="0" cellpadding="5">
                <tr>
                     <th>Friends</th>
                    <th>Send Message</th>
                    <th>View Message</th>
                    
                    
                    
                    <th colspan="3"></th>
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

                       if($person['u_id'] == $personId )

                       {
                          global $personId1;
                        $personId1 = $person['r_id'];
                        $personId2 = $person['u_id'];
                        $personId2;
                        $person = getPersonById($personId1);
                        echo $person['name'];
                        //var_dump($person);


                       }
                       elseif($person['r_id'] == $personId)
                       {
                         $personId1 = $person['u_id'];
                        $person = getPersonById($personId1);
                        echo $person['name'];

                       }

                       // else
                      //  {
                            //echo $person['u_id'];
                      //  }
//
                        ?>



                        </td>
                        
                        
                       
                      
                        <td><a href="message.php?u_id=<?= $personId?>&&r_id=<?=$personId1?>">Send Message</a></td>
                        <td><a href="view message.php?u_id=<?= $personId?>&&r_id=<?=$personId1?>">View Message</a></td>
                        
                        
                        

                    </tr>
               <?php } ?>
     </table>  
     </fieldset>
   
   

