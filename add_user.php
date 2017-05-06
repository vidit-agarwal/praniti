<?php
session_start();
if(!isset($_SESSION['userlog']))
{ 
	/*session_start();*/
	echo '<script type="text/javascript">
                    alert("Please Login To continue !");
                    window.location="index.php";
                    </script> ';
	
}
else
{
	
}


?>

<?php
if (isset($_POST['add'])) {
   //connect to daatabase;
     $mysqli = NEW  MySQLi('localhost', 'root', 'hmr17@tt' , 'hmr_db') ;
     
     $firstname = $mysqli->real_escape_string($_POST['fname']);
     $lastname = $mysqli->real_escape_string($_POST['lname']);
     $depart = $mysqli->real_escape_string($_POST['dept']);
     $userid = $mysqli->real_escape_string($_POST['id']);
     $eid = $mysqli->real_escape_string($_POST['eid']);
     $password = $mysqli->real_escape_string($_POST['pass']);
     $repassword = $mysqli->real_escape_string($_POST['repass']);
$eid = filter_var($eid, FILTER_SANITIZE_EMAIL);
     $query = $mysqli->query("SELECT * FROM sign_up WHERE uid ='$userid' ");
     if(empty($firstname) OR empty ($lastname) OR empty($depart) OR empty($userid) OR empty($password) OR empty($repassword) OR empty($eid))
     {
     
		echo '<script type="text/javascript">
        alert("Please fill all details");
 		window.location="add_user.php";
		</script> ';

     }
     elseif($query->num_rows!=0)
     {
    
		echo '<script type="text/javascript">
        alert("That user id is already taken");
        window.location="add_user.php";

       </script> ';

     }
     elseif($repassword != $password)
     {
      /*$output = "Your Password doesn't match";*/
     
		echo '<script type="text/javascript">
        alert("Your Password doesnot match");
        window.location="add_user.php";
        </script> ';
     }
     elseif (filter_var($eid, FILTER_VALIDATE_EMAIL) === FALSE) {
           echo '<script type="text/javascript">
        alert("The e-mail address is invalid");
        window.location="add_user.php";

       </script> ';
  }
     elseif(strlen($password)<8) {
     
       echo '<script type="text/javascript">
       alert("Your password must be 8 characters long");
       window.location="add_user.php";

       </script> ';
     }
     elseif(strlen($password)>15) {
      
         echo '<script type="text/javascript">
       alert("Your password must be upto 8-15 characters long");
 window.location="add_user.php";

       </script> ';
       
     }
     else
     {

      //encrypt the password
      $password = md5($password) ;
      //insert query
      $insert =$mysqli->query("INSERT INTO sign_up (fname, lname, department, uid, pswd,email) VALUES ('$firstname','$lastname','$depart','$userid','$password' , '$eid')");
      if($insert != TRUE)
      {
      	echo '<script type="text/javascript">
       alert("There wa a problem".$mysqli->error");
 window.location="add_user.php";

       </script> ';
        
      }
      else
      {
       echo '<script type="text/javascript">
       alert("success ! User is added !");
 window.location="add_user.php";

       </script> ';
      
      }
 }
}

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Scheduler:Add User</title>
  <link href="image/download.png" rel="icon"> 
   <link rel="stylesheet" href="css/style.css">

   
  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	color: #fff;
	font-family: Arial;
	font-size: 12px;
}
footer{
  position:fixed;
  bottom :0;
  width:100%;
}
footer nav a{
  color : #778899;
}

.body{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: 850px;
	background-image: url('image/background.jpg');
	
	background-size: cover;
	-webkit-filter: blur(1px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: -20px;
	left: -20px;
	right: -40px;
	bottom: -40px;
	width: auto;
	height: 850px;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.headr{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.headr div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.headr div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}
.login input[type=number]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}
.login input[type=tel]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;								
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}
.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=button]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}
.login input[type=email]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}
.login button{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}
.login input[type=button]:hover{
	opacity: 0.8;
}


.login input[type=button]:active{
	opacity: 0.6;
}


.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}
.login input[type=email]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
	outline: none;
}


::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
	<?php
	require 'header2.php' ;
	?>
  <div class="body">
  </div>
		<div class="grad">
		</div>
		<div class="headr">
			<div>Add<span><b>User</b></span></div>
		</div>
		<br>
		<form action="" method ="POST"> 
		<div class="login">
				<input type="text" placeholder="First Name" name="fname" required autocomplete="off"><br>
				<input type="text" placeholder="Last Name" name="lname" required autocomplete="off"><br>
				<input type="text" placeholder="Department" name="dept" required ><br>
				<input type="email" placeholder="Email Id" name="eid" required autocomplete="off"><br>
				<input type="text" placeholder="User Id" name="id" required autocomplete="off"><br>
				<input type="password" placeholder="Enter Password" name="pass" required autocomplete="off"><br>
				<input type="password" placeholder="Re-Enter Password" name="repass" required><br>
				
				<button type="submit" value="Add" name="add"> ADD </submit><br><br>
			</form>
				<input type="button" value="HOME" onclick="home()">
				<script>
function home() {
    window.location="home.php";
}
</script>

		</div>
	
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<footer name ="foot" style="background: #eee; font-weight:bold;">
		<nav><a><center>HugeArdor © 2017</center></a></nav>
	</footer>

  
</body>
</html>
