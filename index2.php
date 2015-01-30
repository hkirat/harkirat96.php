<?php
// Create connection$_POST["name"]
$userid=$_POST["userid"];
$password=$_POST["password"];
$name=$_POST["name"];
$dob=$_POST["date"];
$email=$_POST["email"];
$conn = new mysqli('localhost', 'root', '123', first);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{
$sql = "SELECT userid FROM table1 WHERE userid='$userid'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
echo "The Username :{$userid} Already exists,please try a different Username<br>";
}
else {
echo "User Registered";
$sql = "INSERT INTO table1 (userid,password,name,dob,email)
VALUES ('$userid', '$password', '$name','$dob','$email')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    }
$conn->close();
}
?>
