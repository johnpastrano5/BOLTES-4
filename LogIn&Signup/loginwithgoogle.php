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
                        //save to database
                      $user_id = random_num(20);
                      $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

                      mysqli_query($con,$query);

                      header("Location: login.php");
                      die;
                    }else
                    {
                        echo "Please enter valid information!";
                    }
      }
?>


<!DOCTYPE html>
<html>
<head>
	<title>class="fa fa-google"></i> Sign in with <b>Google</title>
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
          	<a href="#" class="btn-lg btn-block"> Sign in with <b>Google</b></a>

                 <label class="float-left form-label">Email Address</label>
          	<input id="text" type="text" name="user_name"><br>
              <label class="float-left form-label">Password</label>
          	<input id="text" type="password" name="password"><br>
             <input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a><br>


          	<input id="button" type="submit" value="Sign In"><br><br>



            <div class="text-center"><span class="text-muted">Already have an account?</span> <a href="login.php">Login here</a></div>
            <div class="text-center"><span class="text-muted">Don't have an account?</span> <a href="signup.php">Sign up here</a></div>

 
          </form>
      </div>
</body>
</html>