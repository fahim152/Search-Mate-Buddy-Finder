
<?php
session_start();
	
 	require_once "../service/validation_service.php"; 
    require_once "../service/person_service.php";
    require_once "../data/data_access.php"; 

    $personId = $_GET['u_id'];
    $personId1 = $_GET['r_id'];
    //echo $personId ;

 ?>
<script>
	
function getText() {
		
	var $a =	document.getElementById('text').value;
	
		xhr = new XMLHttpRequest();
		xhr.open('POST' , 'chatcontent.php?u_id=<?=$personId ?>&&r_id=<?=$personId1?>',true);
		xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
		xhr.send('chat='+$a);
		xhr.onreadystatechange=function(){
			if (xhr.responseText){
			//	document.getElementById('chatarea').innerHTML=xhr.responseText;
			//document.getElementById("text").value = "";
									}
				}

				
					}
		

function setText(){
	
	xhr = new XMLHttpRequest();
	xhr.open('POST' , 'chatview.php?u_id=<?=$personId ?>&&r_id=<?=$personId1?>' , true);
	xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
	xhr.send();
	xhr.onreadystatechange = function(){
	//	alert(xhr.responseText);
			document.getElementById('chatarea').innerHTML = xhr.responseText;
			}
		
	}
	setInterval("setText()",2000);
	
function clean()
{
	document.getElementById('text').value = "";
}
	

		
		
</script>

<a href="userprofile.php">HOME</a>
<fieldset>
<legend>Online Chat</legend>
<div id="chatbox">

<div id ="chatarea">
</div>

<!--<div id="loginperson">
<center><h4>Online Users</h4></center>
</div>-->

<div id="textbox">
<form >
<textarea id="text" rows="4" cols="100"  placeholder="Write your message"></textarea>
<br/>
<input type="button" value="SEND"  onclick="getText();"  />
</form>
</div></center>

</div>
<style>
#chatbox
{		
			border:1px solid black;
			height:500px;
			width:750px;
			align;
			}
			#chatarea {
				width:750px;
				height:400px;
				border:1px solid black;
				float:left;
				overflow:auto;

				}
				
					
						#chatting {
							float:left;}
							
			
</style>

</fieldset>