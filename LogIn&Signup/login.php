<?php

session_start();

      include("connection.php");
      include("functions.php"); 

      if($_SERVER['REQUEST_METHOD'] == "POST")
      {
                    //something was posted
                    $user_name = $_POST['user_name'];
                    $password = $_POST['password'];

                    if(!empty($user_name) && !empty($password) &&  !is_numeric($user_name))
                    {
                        //read to database
                      $user_id = random_num(20);
                      $query = "select * from users where user_name = '$user_name' limit 1";


    $result= mysqli_query($con,$query);
                    if($result)
                    {
                       if($result && mysqli_num_rows($result) > 0 )
       {

            $user_data = mysqli_fetch_assoc($result);
           
           if($user_data['password'] === $password)
           {
           	$_SESSION['user_id']  = $user_data ['user_id'];
           	header("Location: index.php");
            die;
         }

                    }
                }
                      echo "Invalid username or password";
                    }else
                    {
                        echo "Please enter valid information!";
                    }
      }

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <style type="text/css">


    #text{
          height: 40px;
          border-radius: 20px;
          padding: 4px;
          border: solid thin #aaa;
          width: 100%;
          font-style: italic;
      }
    #button{

          padding: 10px;
          width: 150px;
          background-color:\gainsboro;
          border: none;

           }
    #box{
          background-color: burlywood;
          margin: auto;
          width: 350px;
          padding:  20px;
            
       }
        body {
                  background: #dfe7e9;
                  font-family: 'Roboto', sans-serif;}
            }


    </style>


    <div id="box">

          <form method="post">
          	<a href="#" class="btn-lg btn-block"><b>Login</b></a>

             <label class="float-left form-label">Usename</label>
          	<input id="text"type="text" name="user_name"><br><br>
             <label class="float-left form-label">Password</label>

          	<input id="text"type="password" name="password"><br>
             <input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a><br>

          	<input id="button"type="submit" value="Login"><br>

            <label class="float-left form-check-label"><input type="checkbox">Remember me</label>
            <a href="#" class="float-right">Forgot Password?</a><br>
       
              <a href="loginwithgoogle.php" class="btn btn-danger btn-lg btn-block"><i class="fa fa-google"></i> Sign in with <b>Google</b></a> <br>
          </form>
            <div class="text-center"><span class="text-muted">Don't have an account?</span> <a href="signup.php">Sign up here</a></div>
      </div>
</body>
</html>