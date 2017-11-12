<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>

<hr/>
<a href="userprofile.php">HOME</a>
<?php
   
        $personId = trim($_GET['u_id']);
        $personId1 = trim($_GET['r_id']);
       // $person = getPersonById($personId);
      //  $person1 = getPersonById($personId1);
       // if(isset($person)==false){
          //  echo "<hr/>";
         ///   die();
       // }
  

    $person = checkfriendStatus($personId,$personId1);
    //var_dump($person);
   // echo $personId;
   // echo $personId1;
   // $id = $person['id'];
    //$name = $person['name'];
   // $password = $person['pass'];
   // $moderator = "moderator";
    //$name = $person['name'];

   // $person['id'] = $id;
    //$person['name'] = $name;
   // $person['pass'] = $password;
    //$person['type'] = $moderator;

//if($person['accept'] == "Accepted")
 //{
    if ($person['accept'] == "Accepted") {
        echo "AlREADY FRIEND";
       
    }
    elseif(friendRequestAccept($personId,$personId1))
    {
        echo "Friend Request Accepted";
    }
    else
    {
        echo "Not Send";
    }
//}
    



?>