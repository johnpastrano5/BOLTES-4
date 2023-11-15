<?php  
session_start();

      include("connection.php");
      include("functions.php"); 

      $xuser_data = check_login($con);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Boltes Four</title>
</head>
<body>

    <a href="logout.php">Logout</a>
    <h1>Oops!We are currently working for the Website   </h1>

    <br>
    Welcome! <?php echo $xuser_data['user_name']; ?>

</body>
</html>