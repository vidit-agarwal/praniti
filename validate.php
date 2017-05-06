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
           		 $mysqli = NEW  MySQLi('localhost', 'root', 'hmr17@tt' , 'hmr_db') ;
           		  $userlogin=$mysqli->real_escape_string($userlogin);
                  $passlogin=$mysqli->real_escape_string($passlogin);
                  $query=$mysqli->query("SELECT * FROM sign_up WHERE uid='$userlogin' AND pswd =md5('$passlogin')" );
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