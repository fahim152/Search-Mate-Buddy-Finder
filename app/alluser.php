


<html>
	<form >
			
			<?php
    $conn = mysqli_connect("127.0.0.1:3306","root", "", "search_mate");
    if($conn){
        $query="SELECT * FROM registration";
         $result = mysqli_query($conn,$query);
            echo '<table width=90% border="1" align="center" cellpadding="5px" cellspacing="0px">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>PASSWORD</th>
            <th>EMAIL</th>
            <th>MOBILE</th>
            <th>SCHOOL</th>
            <th>COLLEGE</th>
            <th>UNIVERSITY</th>
            <th>WORKPLACE</th>
            <th>DESIGNATION</th>
            <th>FACEBOOK</th>
            
        </tr>';
            while($row=mysqli_fetch_assoc($result)){
                $id = $row['id'];
				$name = $row['name'];
				$pass =	$row['pass'];
				$email = $row['email'];
				$mobile = $row['mobile'];
				$school = $row['school'];
				$college = $row['college'];
				$university = $row['university'];
				$workplace = $row['workplace'];
				$designation = $row['designation'];
				$facebook = $row['facebook'];
                 
				echo '<tr><td>'.$id.'</td>';
				echo '<td>'.$name.'</td>';
				echo '<td>'.$pass.'</td>';
				echo '<td>'.$email.'</td>';
				echo '<td>'.$mobile.'</td>';
				echo '<td>'.$school.'</td>';
				echo '<td>'.$college.'</td>';
				echo '<td>'.$university.'</td>';
				echo '<td>'.$workplace.'</td>';
				echo '<td>'.$designation.'</td>';
				echo '<td>'.$facebook.'</td>'; 
			 
            '</tr>';
            '</table>';
             
         
              
         }
    }
 
 
?>
 
				
			</table>
	</form>
</html>