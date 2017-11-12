<?php require_once "../service/validation_service.php"; ?>
<?php require_once "../service/person_service.php"; ?>

<hr/>
<a href="userprofile.php">HOME</a>
<?php
    if(isset($_GET['u_id'])){
        $personId = trim($_GET['u_id']);
        $personId1 = trim($_GET['r_id']);
        $person = getPersonById($personId);
        $person1 = getPersonById($personId1);
        if(isset($person)==false){
            echo "<hr/>";
            die();
        }
    }
    else{
        echo "<hr/>";
        die();
    }

   // echo $personId;
   // echo $personId1;
    $id = $person['id'];
    $name = $person['name'];
    $password = $person['pass'];
    $moderator = "moderator";
    //$name = $person['name'];

    $person['id'] = $id;
    $person['name'] = $name;
    $person['pass'] = $password;
    $person['type'] = $moderator;

    if(checkFriendRequest($personId,$personId1))
    {
        echo "ALREADY REQUEST SEND";
    }
    elseif(friendrequest($personId,$personId1))
    {
        echo "Friend Request Send";
    }
    else
    {
        echo "Not Send";
    }

    



?>