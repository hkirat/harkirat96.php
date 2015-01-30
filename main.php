<?php
session_start();
//echo $_SESSION["userid"]; 
//echo $_SESSION["name"];
$conn = new mysqli('localhost', 'root', '123', first);
    	if ($conn->connect_error) 
    		{
    		die("Connection failed: " . $conn->connect_error);
			} 
		
if(!isset($_POST['message'])) 
	{

    }
else
    {	$message=$_POST['message'];
		$name=$_SESSION["name"];
    	
			{
				
				$sql = "INSERT INTO table2 (user,message)
				VALUES ('$name','$message')";
				if ($conn->query($sql) === TRUE) {
			    
			    } else {
    			echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
    }   
mysql_close($conn);
?>
<?php
  if (isset($_POST['ID'])) {

  	$conn = new mysqli('localhost', 'root', '123', first);
    	if ($conn->connect_error) 
    		{
    		die("Connection failed: " . $conn->connect_error);
			} 
			$ID=$_POST['ID'];
			
  	$sql = "DELETE FROM table2 WHERE id=$ID";

if ($conn->query($sql) === TRUE) {
   
} else {
    echo "Error deleting record: " . $conn->error;
}
  }
?>

<html>
<head>
<style>
 .textbox { 
    border: 2px; 
    border-radius: 5;
    height:70px; 
    width: 700px; 

  } 


.a1{

	 position: relative;
    left: 450px;top:0px;z-index: 1;
}
.a2{-webkit-animation:mythird 5s  infinite; /* Chrome, Safari, Opera */
    animation: mythird 5s;
	 position: relative;
    left: 10px;top:3px;z-index: 1;
}
@-webkit-keyframes mythird {
    0%,100%   {left:105px; transform: rotate(0deg);}
50%  {left :324px; transform: rotate(-180deg);}
}
.a3{ -webkit-animation:mysecond 5s  infinite;
    animation: mysecond 5s;
	 position: relative;
    left: 312px;top:3;z-index: 1;
}
@-webkit-keyframes mysecond {
	    0%,100%   {position: relative;left :240px;right:1px;}
50%  {position: relative;left:20px; }
    }
body {
       -webkit-animation:myfirst 20s linear infinite;
}

@-webkit-keyframes myfirst {
0%,100%   {background:rgb(100,149,255);}
50%  {background:purple;}
}

</style>
<title>
HubbleH
</title>
</head>
<body>
<div style=" margin:0 auto;">
<span class="a1">
<img src="./HARKIRAT SINGH_files/UBBLE.png">
</span>
<span CLASS="a2">
<img src="./HARKIRAT SINGH_files/H1.png">
</span>
<span CLASS="a3">

<img src="./HARKIRAT SINGH_files/H1.png">
</span>
</div>
<center>
<form action="main.php" method="POST">
<input class="textbox"type="text" name="message" autocomplete='off'> 
<br><br>
<input type="submit" name="submit">
</form>
</center>

<?php
$conn = new mysqli('localhost', 'root', '123', first);
    	if ($conn->connect_error) 
    		{
    		die("Connection failed: " . $conn->connect_error);
			} 

$sql = "SELECT user,message,id FROM table2 ORDER BY id DESC";	
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				?>

				<?php
			while($row = $result->fetch_assoc()) 			
			{?><div style="width:800px;font-family: monospace; margin:0 auto;background-color:silver;border-radius: 7;box-shadow: 2px 2px 2px #888888;"><font size="5">	<font color="white"><?php
				$id=$row["id"];	$mess=$row["message"];$user=$row["user"];
				echo " <center><b>$user:</b></center>";
				
				if ($_SESSION["name"]==$user)
				{
				echo "<center>$mess</center> ";
				?> <form action="main.php" method="POST" align=right;>
				<input type="hidden" name="ID" value=<?php echo $id; ?>> 
				<p align="right"><input type="submit" name="submit" value="DELETE">
				 </p>
				 </form>
				 
				 <?php
				}
				else
				{
					echo "<center>$mess<br><br></center>";
				}
				?></div><br><?php
			}
}
mysql_close($conn);
?>
</body>
</html>
