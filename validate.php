<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
	if(isset($_POST['login_button']))
	{
		 $userlogin = $_POST['userlog'];
		 $passlogin = $_POST['passlog'] ;
		 if(empty($userlogin) || empty($passlogin))
  			{
                 /*$output = "Please enter all details." ;*/
                 	echo '<script type="text/javascript">
                    alert("Please enter all details !");
                    window.location="index.php";
                    </script> ';
            }
           else
           {
           		 $mysqli = NEW  MySQLi('localhost', 'root', '' , 'praniti') ;
           		  //$userlogin=$mysqli->real_escape_string($userlogin);
                 // $passlogin=$mysqli->real_escape_string($passlogin);
               $que = "SELECT * FROM userdata WHERE user_id='$userlogin' and pass ='$passlogin'";
               $query=$mysqli->query($que);
                  if($query->num_rows==0)
                    {
                        echo '<script type="text/javascript">
                        alert("Invalid Username/Password !");
                        window.location="index.php";
                        </script> ';
                    }
                   else
                   {
                   		session_start();
                   		$_SESSION['userlog'] = $userlogin ;
                   		header("location: home.php");
                   }

           }
	 } 
	else 
	{
		header("location: index.php");
	}




?>
    </body>
</html>