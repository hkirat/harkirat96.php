<?php
	$userid=$_POST["userid"];
	$password=$_POST["password"];

	$conn = new mysqli('localhost', 'root', '123', first);

	if ($conn->connect_error) 
		{
    		die("Connection failed: " . $conn->connect_error);
		} 
	else
		{
			$sql = "SELECT userid,password,name FROM table1 WHERE userid='$userid' AND password='$password'";	
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			echo "Welcome {$userid}";
			session_start();
			while($row = $result->fetch_assoc()) 
			{
				$_SESSION["name"] =$row["name"];
			}
			$_SESSION["userid"] =$userid;
				
			header('Location:main.php');
			echo $_SESSION["userid"]; 
			echo $_SESSION["name"];
		}
		else 
		{
			echo "Wrong Id Password Combination.";
		}
	$conn->close();
}
?>
