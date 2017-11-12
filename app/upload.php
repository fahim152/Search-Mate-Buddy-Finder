
<?php
require_once "../service/data_access.php";
if(isset($_POST['btn_upload']))
{

    $filetmp = $_FILES["file_img"]["tmp_name"];
    echo $filetmp;
    $filename = $_FILES["file_img"]["name"];
    //$filetype = $_FILES["file_img"]["type"];
    $filepath = "photo/".$filename;
    
    move_uploaded_file($filetmp,$filepath);
    
    $sql = "INSERT INTO registration (photo) VALUES ('$filepath')";
    $result = executeSQL($sql);
}
?>

</body>
</html>


