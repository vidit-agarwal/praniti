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
           		  $userlogin=$mysqli->real_escape_string($userlogin);
                 $passlogin=$mysqli->real_escape_string($passlogin);
                // $passlogin = md5($passlogin) ;

              
              
              $query=$mysqli->query("SELECT * FROM userdata WHERE user_id='$userlogin' and pass ='$passlogin'");
                  if($query->num_rows!=0  )
                    {  
                        $fieldinfo=mysqli_fetch_array($query , MySQLi_ASSOC);

                       $row= $query->fetch_assoc() ;
                        
                      if($row["role"]=="Guide")
                      {
                          session_start();
                      $_SESSION['userlog'] = $userlogin ;
                      header("location: home_guide.php");

                      }
                      else{

                        session_start();
                      $_SESSION['userlog'] = $userlogin ;
                      header("location: home.php");
                    }
                    }
                   else
                   {
                   		echo '<script type="text/javascript">
                        alert("Invalid Username/Password !");
                        window.location="index.php";
                        </script> ';
                   }

           }
	 } 
	else 
	{
		header("location: index.php");
	}




?>