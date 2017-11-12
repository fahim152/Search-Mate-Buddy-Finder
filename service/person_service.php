<?php require_once "../data/person_data_access.php"; ?>
<?php
    function addPerson($person){
        return addPersonToDb($person);
    }
     function addLogin($person){
        return addLoginToDb($person);
    }
    function addLoginMod($person){
        return addLoginModToDb($person);
    }
     function addPersonLogin($type){
        return addPersonLogin($type);
    }
     function addModerator($person){
        return addModeratorToDb($person);
    }
       function addUser($person){
        return addUserToDb($person);
    }
    function checkModerator($personId){
        return checkModeratorToDb($personId);
    }
      function DeleteModerator($personId){
        return DeleteModeratorToDb($personId);
    }
    function DeleteUser($personId){
        return DeleteUserToDb($personId);
    }
     function GetAllModerator(){
        return GetAllModeratorToDb();
    }
     function GetAllModeratorById($personId){
        return GetAllModeratorByIdToDb($personId);
    }
     function checkUser($school){
        return checkUserToDb($school);
    }
     function checkMail($email){
        return checkMailFromDb($email);
    }
     function friendRequest($personId,$personId1){
        return friendRequestToDb($personId,$personId1);
    }
       function friendStatus($personId){
        return friendStatusToDb($personId);
    }
      function checkfriendStatus($personId,$personId1){
        return checkfriendStatusToDb($personId,$personId1);
    }
      function friendRequestAccept($personId,$personId1){
        return friendRequestAcceptToDb($personId,$personId1);
    }
      function messageSend($personId,$personId1,$message){
        return messageSendToDb($personId,$personId1,$message);
    }
    function checkFriendRequest($personId,$personId1){
        return checkFriendRequestToDb($personId,$personId1);
    }
      function Message($personId,$personId1){
        return getMessageToDb($personId,$personId1);
    }
     function checkAllFriend($personId){
        return checkAllFriendToDb($personId);
    }
    
    
    
    
    
    
    
    
    function editPerson($person){
        return editPersonToDb($person);
    }
    
    function removePerson($personId){
        return removePersonFromDb($personId);
    }
    
    function getAllPersons(){
        return getAllPersonsFromDb();
    }
    
    function getPersonById($personId){
        return getPersonByIdFromDb($personId);
    }
	 function getPersonByPassword($personPassword,$personId){
        return getPersonByPasswordFromDb($personPassword,$personId);
    }
    
    function getPersonsByName($personName){
        return getPersonsByNameFromDb($personName);
    }
     function getPersonsBySchool($personSchool){
        return getPersonsBySchoolFromDb($personSchool);
    }
     function getPersonsByCollege($personCollege){
        return getPersonsByCollegeFromDb($personCollege);
    }
    function getPersonsByUniversity($personUniversity){
        return getPersonsByUniversityFromDb($personUniversity);
    }
    function getPersonsByWorkplace($personWorkplace){
        return getPersonsByWorkplaceFromDb($personWorkplace);
    }
    
    
    function getPersonsByEmail($personEmail){
        return getPersonsByEmailFromDb($personEmail);
    }
    
    function getPersonsByNameOrEmail($key){
        return getPersonsByNameOrEmailFromDb($key);
    }
      function getPersonsTypeById($personId){
        return getPersonsTypeFromDb($personId);
    }
     function getPersonsTypeById2($personId){
        return getPersonsTypeFromDb2($personId);
    }
    
    function isUniquePersonEmail($personEmail){
        $persons  = getAllPersons();
        $isUnique = true;
        foreach($persons as $person){
            if($person['email']==$personEmail){
                $isUnique = false;
                break;
            }
        }
        return $isUnique;
    }
    
    function isUniquePersonEmailForUpdate($personId, $personEmail){
        $persons  = getAllPersons();
        $isUnique = true;
        foreach($persons as $person){
            if($person['id']!=$personId && $person['email']==$personEmail)
                $isUnique = false;
                break;
        }
        return $isUnique;
    }
?>