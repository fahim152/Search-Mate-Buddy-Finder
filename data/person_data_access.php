<?php require_once "data_access.php"; ?>
<?php
    function addPersonToDb($person){
        $sql = "INSERT INTO registration(id, name, email,pass,mobile,school,college,university,facebook,workplace,designation,type) VALUES('$person[id]', '$person[name]', '$person[email]','$person[pass]','$person[mobile]','$person[school]','$person[college]','$person[university]','$person[facebook]','$person[workplace]','$person[designation]','$person[type]')";
        $result = executeSQL($sql);
        return $result;
    }

    function addPresonLogin($person){
         $sql = "INSERT INTO login(id, name,email,moderator) VALUES('$person[id]', '$person[name]', '$person[email]','$person[moderator]')";
        $result = executeSQL($sql);
        return $result;
    }
     function addLoginToDb($person){
         $sql = "INSERT INTO login(id, name,pass,usertype) VALUES('$person[id]', '$person[name]', '$person[pass]','$person[type]')";
        $result = executeSQL($sql);
        return $result;
    }
      function addLoginModToDb($person){
         $sql = "INSERT INTO login(id, name,pass,usertype) VALUES('$person[id]', '$person[name]', '$person[pass]','$person[moderator]')";
        $result = executeSQL($sql);
        return $result;
    }

     function addModeratorToDb($person){
         $sql = "INSERT INTO moderator(id, name,pass,usertype) VALUES('$person[id]', '$person[name]', '$person[pass]','$person[moderator]')";
         $result = executeSQL($sql);
         return $result;
    }
      function addUserToDb($person){
         $sql = "INSERT INTO login(id, name,pass,usertype) VALUES('$person[id]', '$person[name]', '$person[pass]','$person[moderator]')";
         $result = executeSQL($sql);
         return $result;
    }

     function friendRequestToDb($personId,$personId1){
         $sql = "INSERT  INTO friend_request(u_id, r_id) VALUES('$personId', '$personId1')";
         $result = executeSQL($sql);
         return $result;
    }

    function checkOnlineUser($personId)
    {

       $sql = "SELECT sum(status) as status FROM friend_request where (u_id = $personId OR r_id =$personId)";        
        $result = executeSQL($sql);
         
        //$persons = array();
             
       $person = mysqli_fetch_assoc($result);
 
        return $person;

      
  
    }
     function insertOnlineUser($personId)
    {

       $sql = "UPDATE friend_request set status = '1' where u_id = $personId  AND accept ='Accepted'";        
        $result = executeSQL($sql);
         
        //$persons = array();
             
      // $person = mysqli_fetch_assoc($result);
 
        return $result;

      
  
    }


    function checkOfflineUser($personId)
    {

       $sql = "UPDATE friend_request SET status ='0' where u_id =$personId";        
        $result = executeSQL($sql);
         
        $persons = array();
             
       //$person = mysqli_fetch_assoc($result);
 
        return $result;

      
  
    }

       function checkOnlineChat($personId)
    {

       $sql = "SELECT  *  FROM friend_request where status ='1' AND (u_id = $personId OR r_id = $personId) ";        
        $result = executeSQL($sql);
         
        $persons = array();
             
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
 
        return $persons;

      
  
    }



      function friendStatusToDb($personId){
         $sql = "SELECT * FROM friend_request where (u_id = $personId OR r_id = $personId)  AND accept = ''";
         $result = executeSQL($sql);
          $persons = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
 
        return $persons;
    }
    
      function checkAllFriendToDb($personId){
         $sql = "SELECT * FROM friend_request where accept = 'Accepted' AND (u_id = $personId OR r_id = $personId) ";
         $result = executeSQL($sql);
         $persons = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
 
        return $persons;
 
    }
       function checkfriendStatusToDb($personId,$personId1){
         $sql = "SELECT * FROM friend_request WHERE (u_id = $personId AND r_id = $personId1)
         OR (u_id = $personId1 AND r_id = $personId)";
         $result = executeSQL($sql);
         $person = mysqli_fetch_assoc($result);
 
        return $person;
    }
     function friendRequestAcceptToDb($personId,$personId1){
         $sql = "UPDATE friend_request SET accept = 'Accepted' WHERE (u_id = $personId AND r_id = $personId1) OR (u_id = $personId1 AND r_id = $personId) ";
             $result = executeSQL($sql);
         
 
        return $result;
    }
     function checkFriendRequestToDb($personId,$personId1){
        $sql = "SELECT * FROM friend_request where u_id=$personId AND r_id = $personId1";
         $result = executeSQL($sql);
         $person = mysqli_fetch_assoc($result);
 
        return $person;
    }
        function messageSendToDb($personId,$personId1,$message){
         $sql = "INSERT INTO message (u_id,r_id,message,time) VALUES ('$personId','$personId1','$message',now())";
         $result = executeSQL($sql);
         
 
        return $result;
    }
     function getMessageToDb($personId,$personId1){
        $sql = "SELECT * FROM message where (u_id = $personId AND r_id = $personId1) OR (u_id = $personId1 AND r_id = $personId) ORDER BY time";        
        $result = executeSQL($sql);
         
        $persons = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
 
        return $persons;
    }


     function DeleteModeratorToDb($personId){
         $sql = "DELETE FROM moderator WHERE id=$personId";
         $result = executeSQL($sql);
         return $result;
    }
    function DeleteUserToDb($personId){
         $sql = "DELETE FROM login WHERE id=$personId";
         $result = executeSQL($sql);
         return $result;
    }
     function GetAllModeratorToDb(){
        $sql = "SELECT * FROM moderator";        
        $result = executeSQL($sql);
        
        $persons = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $persons;
    }

    function getPersonsTypeFromDb($personId){
        $sql = "SELECT type FROM registration where id = $personId";        
        $result = executeSQL($sql);
        
       $person = mysqli_fetch_assoc($result);
 
        return $person['type'];
    }


    function checkMailFromDb($email){
        $sql = "SELECT email FROM registration where email = $email";   
         
        $result = executeSQL($sql);
        $a = false;
        $person = mysqli_fetch_array($result,is_bool($a));
 
        return $person;
    }



       function checkModeratorToDb($personId){
        $sql = "SELECT id FROM moderator where id = $personId";        
        $result = executeSQL($sql);
        
        $person = mysqli_fetch_assoc($result);
        
       
        
        return $person['id'];
    }
  
      function checkFriendToDb($personId){
        $sql = "SELECT * FROM friend_request where accept = $personId";        
        $result = executeSQL($sql);
        
        $person = mysqli_fetch_assoc($result);
        
       
        
        return $person['u_id'];
    }

    function getPersonsTypeFromDb2($personId){
        $sql = "SELECT usertype FROM moderator where id = $personId";        
        $result = executeSQL($sql);
        
        $person = mysqli_fetch_assoc($result);
        
       
        
        return $person['usertype'];
    }


     function GetAllModeratorByIdToDb($personId){
        $sql = "SELECT * FROM registration WHERE id=$personId";        
        $result = executeSQL($sql);
        
        //$person = mysqli_fetch_assoc($result);
        
        return $result;
    }
     function checkUserToDb($school){
        $sql = "SELECT school FROM registration WHERE school = $school";        
        $result = executeSQL($sql);
        
      //  $person = mysqli_fetch_assoc($result);
        //echo $personperson;
        return $result;
    } 
 


    
    function editPersonToDb($person){
        $sql = "UPDATE registration SET name='$person[name]', email='$person[email]',mobile='$person[mobile]',school='$person[school]',college='$person[college]',university='$person[university]',facebook='$person[facebook]',workplace='$person[workplace]',designation='$person[designation]' WHERE id=$person[id]";
        $result = executeSQL($sql);
        return $result;
    }
    
    function removePersonFromDb($personId){
        $sql = "DELETE FROM registration WHERE id=$personId";        
        $result = executeSQL($sql);
        return $result;
    }
    
    function getAllPersonsFromDb(){
        $sql = "SELECT * FROM registration";        
        $result = executeSQL($sql);
        
        $persons = array();
        for($i=0; $row=mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $persons;
    }


    
    function getPersonByIdFromDb($personId){
        $sql = "SELECT * FROM registration WHERE id=$personId";        
        $result = executeSQL($sql);
        
        $person = mysqli_fetch_assoc($result);
        
        return $person;
    }    
	    function getPersonByPasswordFromDb($personPassword,$personId){
        $sql = "SELECT * FROM registration WHERE pass=$personPassword AND id = $personId";        
        $result = executeSQL($sql);
        
        $person = mysqli_fetch_assoc($result);
        
        return $person;
    }   

    function getPersonsByNameFromDb($personName){
        $sql = "SELECT * FROM registration WHERE name LIKE '%$personName%'";
        $result = executeSQL($sql);
        
        $persons = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $persons;
    }
     function getPersonsBySchoolFromDb($personSchool){
        $sql = "SELECT * FROM registration WHERE school LIKE '%$personSchool%'";
        $result = executeSQL($sql);
        
        $persons = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $persons;
    }

     function getPersonsByCollegeFromDb($personCollege){
        $sql = "SELECT * FROM registration WHERE college LIKE '%$personCollege%'";
        $result = executeSQL($sql);
        
        $persons = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $persons;
    }

       function getPersonsByUniversityFromDb($personUniversity){
        $sql = "SELECT * FROM registration WHERE university LIKE '%$personUniversity%'";
        $result = executeSQL($sql);
        
        $persons = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $persons;
    }

       function getPersonsByWorkplaceFromDb($personWorkplace){
        $sql = "SELECT * FROM registration WHERE workplace LIKE '%$personWorkplace%'";
        $result = executeSQL($sql);
        
        $persons = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $persons;
    }
    
    function getPersonsByEmailFromDb($personEmail){
        $sql = "SELECT * FROM registration WHERE email LIKE '%$personEmail%'";
        $result = executeSQL($sql);
        
        $persons = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $persons;
    }
    
    function getPersonsByNameOrEmailFromDb($key){
        $sql = "SELECT * FROM registration WHERE name LIKE '%$key%' OR email LIKE '%$key%'";
        $sql = "SELECT * FROM registration WHERE name LIKE '%$key%' OR email LIKE '%$key%'";
        $result = executeSQL($sql);
        
        $persons = array();
        for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
            $persons[$i] = $row;
        }
        
        return $persons;
    }
    
?>