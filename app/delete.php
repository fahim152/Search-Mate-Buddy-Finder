<?php require_once "../service/person_service.php"; ?>
<hr/>
<a href="admin.php">HOME</a>
<hr/>
<?php
    if(isset($_GET['id'])){
        $personId = trim($_GET['id']);
    }
    else{
        die();
    }
?>
<fieldset>
    <legend>DELETE</legend>
    <?php
        if(removePerson($personId)==true){
            echo "Record Deleted";
        }
        else{
            echo "Internal Error";
        }
    ?>
</fieldset>