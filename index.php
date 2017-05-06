<?php

if (isset($_POST['sub_button'])) {
   //connect to daatabase;
     $mysqli = NEW  MySQLi('localhost', 'root', 'hmr17@tt' , 'hmr_db') ;
     
     $firstname = $mysqli->real_escape_string($_POST['fname']);
     $lastname = $mysqli->real_escape_string($_POST['lname']);
     $depart = $mysqli->real_escape_string($_POST['department']);
     $userid = $mysqli->real_escape_string($_POST['id']);
     $password = $mysqli->real_escape_string($_POST['ent_pass']);
     $email = $mysqli->real_escape_string($_POST['ent_email']);
     $repassword = $mysqli->real_escape_string($_POST['re_pass']);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
     $query = $mysqli->query("SELECT * FROM sign_up WHERE uid ='$userid' ");
     if(empty($firstname) OR empty ($lastname) OR empty($depart) OR empty($userid) OR empty($password) OR empty($repassword) OR empty($email))
     {
     /* $output="Please fill all details" ;*/
      
echo '<script type="text/javascript">
       alert("Please fill all details");
 window.location="index.php";

       </script> ';

     }
     elseif($query->num_rows!=0)
     {
    
echo '<script type="text/javascript">
       alert("That user id is already taken");
 window.location="index.php";

       </script> ';

     }
     elseif($repassword != $password)
     {
      /*$output = "Your Password doesn't match";*/
     
echo '<script type="text/javascript">
       alert("Your Password doesnot match");
 window.location="index.php";

       </script> ';


     }
     elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
           echo '<script type="text/javascript">
        alert("The e-mail address is invalid");
        window.location="index.php";

       </script> ';
  }
     elseif(strlen($password)<8) {
     
       echo '<script type="text/javascript">
       alert("Your password must be 8 characters long");
 window.location="index.php";

       </script> ';
     }
     elseif(strlen($password)>15) {
      
         echo '<script type="text/javascript">
       alert("Your password must be upto 8-15 characters long");
 window.location="index.php";

       </script> ';
       
     }
     else
     {

      //encrypt the password
      $password = md5($password) ;
      //insert query
      $insert =$mysqli->query("INSERT INTO sign_up (fname, lname, department, uid, pswd,email) VALUES ('$firstname','$lastname','$depart','$userid','$password', '$email')");
      if($insert != TRUE)
      {
        /*$output= "There was a problem - " ;
        $output .= $mysqli->error ;*/
      /*  echo '<script type="text/javascript">window.alert("There wa a problem".$mysqli->error);</script>' ;*/
        echo '<script type="text/javascript">
       alert("There wa a problem".$mysqli->error");
 window.location="index.php";

       </script> ';
        
      }
      else
      {
       echo '<script type="text/javascript">
       alert("successfully sign up! Please Login to continue");
 window.location="index.php";

       </script> ';
      
      }
     }

}

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
  <title>  Scheduler: Login</title>
  <link href="image/download.png" rel="icon"> 
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

 <style>

body {
background-image: url('image/background.jpg'); 
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 90%;
  font: inherit;
  vertical-align: baseline;
  font-family: 'Titillium Web', sans-serif;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
   }
footer{
  position:fixed;
  bottom :0;
  width:100%;
   }
footer nav a{
  color : #778899;
}

 </style>
  
  
</head>

<body>
<?php
 include 'header.php' ;
?>



  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up</h1>
          
          <form action="" method="POST">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text"  name ="fname" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name="lname" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Department<span class="req">*</span>
            </label>
            <input type="text" name ="department" required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label>
              User Id<span class="req">*</span>
            </label>
            <input type="text" name ="id" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Email Id:<span class="req">*</span>
            </label>
            <input name="ent_email" type="email" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Enter Password<span class="req">*</span>
            </label>
            <input name="ent_pass" type="password"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Re-Enter Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name ="re_pass"/>
          </div>

          <button type="submit" class="button button-block" name ="sub_button"/>Submit</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome !</h1>
          
          <form action="validate.php" method="post">
          
            <div class="field-wrap">
            <label>
              User Id<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name="userlog"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name = "passlog" required autocomplete="off"/>
          </div>
           
          
          <p class="forgot"><a href="forg_pass.php">Forgot Password?</a></p>
          
          <button class="button button-block" name ="login_button"/>Log In</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

<footer name ="foot" style="background: #eee; font-weight:bold;">
    <nav><a><center>HugeArdor © 2017</center></a></nav>
  </footer>



</body>
</html>
