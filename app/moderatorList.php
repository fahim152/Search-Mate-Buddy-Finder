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
    <legend>MODERATOR LIST</legend>
    <table border="1" cellspacing="0" cellpadding="5">
                <tr>
                     <th>ID</th>
                    <th>NAME</th>
                    
                    
                    
                    
                    <th colspan="3"></th>
                </tr>
        <?php
        $persons = GetAllModeratorToDb();
            foreach ($persons as $person) { ?>
                    <tr>
                        <td><?= $person['id'] ?></td>
                        <td><?= $person['name'] ?></td>
                        </tr>
                    </table>
                <?php } 
        
    ?>
</fieldset>