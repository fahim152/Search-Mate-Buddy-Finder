<?php require_once "../service/validation_service.php"; ?>
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
    <legend>DELETE MODERATOR</legend>
    <?php
    $check = checkModeratorToDb($personId);
        if($check = checkModeratorToDb($personId))
        {
            if(DeleteModeratorToDb($personId))
            {
                echo "Record Deleted";
            }
        }
        else
        {
            echo "MODERATOR NOT ADDED";
        }
        
    ?>
</fieldset>