<?php require_once "../service/person_service.php"; ?>
<hr/>
<a href="admin.php">HOME</a>
<?php
    if(isset($_GET['id'])){
        $personId = trim($_GET['id']);
        $person = getPersonById($personId);
        if(isset($person)==false){
            echo "<hr/>";
            die();
        }
    }
    else{
        echo "<hr/>";
        die();
    }
?>
<a href="update.php?id=<?= $person['id'] ?>">EDIT</a>
<a href="delete.php?id=<?= $person['id'] ?>">DELETE</a>
<hr/>
<fieldset>
    <legend>DETAIL</legend>
    <table border="0" cellspacing="0" cellpadding="3">
        <tr>
            <td>ID</td>
            <td>:</td>
            <td><?= $person['id'] ?></td>
        </tr>
        <tr>
            <td>NAME</td>
            <td>:</td>
            <td><?= $person['name'] ?></td>
        </tr>
         <tr>
            <td>EMAIL</td>
            <td>:</td>
            <td><?= $person['email'] ?></td>
        </tr> 
         <tr>
            <td>MOBILE</td>
            <td>:</td>
            <td><?= $person['mobile'] ?></td>
        </tr>
         <tr>
            <td>SCHOOL</td>
            <td>:</td>
            <td><?= $person['school'] ?></td>
        </tr>
         <tr>
            <td>COLLEGE</td>
            <td>:</td>
            <td><?= $person['college'] ?></td>
        </tr>
         <tr>
            <td>UNIVERSITY</td>
            <td>:</td>
            <td><?= $person['university'] ?></td>
        </tr> 
         <tr>
            <td>FACEBOOK</td>
            <td>:</td>
            <td><?= $person['facebook'] ?></td>
        </tr>
         <tr>
            <td>WORKPLACE</td>
            <td>:</td>
            <td><?= $person['workplace'] ?></td>
        </tr>
         <tr>
            <td>DESIGNATION</td>
            <td>:</td>
            <td><?= $person['designation'] ?></td>
        </tr>
    </table>
</fieldset>