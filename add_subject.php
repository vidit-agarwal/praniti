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
     
     $name = $mysqli->real_escape_string($_POST['sname']);
     $id = $mysqli->real_escape_string($_POST['sid']);
     $sem = $mysqli->real_escape_string($_POST['sno']);
     $branch = $mysqli->real_escape_string($_POST['branch']);
     $lab = $mysqli->real_escape_string($_POST['lab']);
     $tel = $mysqli->real_escape_string($_POST['tel']);
     
     $query = $mysqli->query("SELECT * FROM subject WHERE s_name ='$name' and s_sem='$sem' and s_id='$id' and s_branch='$branch' and s_lab='$lab' and s_lctr='tel' ");
     if(empty($name) OR empty ($id) OR empty($sem) or empty($branch) or empty($lab) or empty($tel) )
     {
     
		echo '<script type="text/javascript">
        alert("Please fill all details");
 		window.location="add_subject.php";
		</script> ';

     }
     elseif($query->num_rows!=0)
     {
    
		echo '<script type="text/javascript">
        alert("That subject is already added");
        window.location="add_subject.php";

       </script> ';

     } 
     else
     {

      $insert =$mysqli->query("INSERT INTO subject (s_name, s_sem, s_id, s_branch,s_lab,s_lctr) VALUES ('$name','$sem','$id','$branch','$lab','$tel')");
      if($insert != TRUE)
      {
      	echo '<script type="text/javascript">
       alert("There wa a problem".$mysqli->error");
 window.location="add_subject.php";

       </script> ';
        
      }
      else
      {
       echo '<script type="text/javascript">
       alert("success ! Subject is added !");
 window.location="add_subject.php";

       </script> ';
      
      }
 }
}

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Scheduler: Add Subject</title>
  <link href="image/download.png" rel="icon"> 
   <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
  
  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
	margin: 0;
	padding: 0;
	background: #fff;

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

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
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
.login input[type=number]:focus{
	outline: none;
	color :#eee;
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
#header {
  z-index: 1;
  position: fixed;
  top :0%;
  width: 100%;
  height: 60px;
  line-height: 60px;
  background: #cdaf95;
  color: white;
  filter: alpha(opacity=80);  /* IE 5-7 */
-moz-opacity: 0.8;          /* Netscape */
-khtml-opacity: 0.8;        /* Safari 1.x */
    opacity: 0.8;
}
.login input[type=number]{
	width: 251px;
	height: 35px;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}
.login input[type=button]{
	width: 260px;
	height: 35px;
	background:#eee;
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
.login input[type=submit]{
	width: 260px;
	height: 35px;
	background:#eee;
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
.login select {
	width: 258px;
	height: 35px;
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
.logo {
position :fixed;
 top :0%;
  width: 50px;
  height: 50px;
  margin-top : 1px;
  margin-left:3.9%;
  font-weight: bolder;

}
.logo_name{

margin-left :2%;
}

nav ul li a:hover{
  background-color:#eee;
}
nav ul li a:hover{
 color:black;
}
    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
	
<header id="header">

<div class="main_body">
      <div class="container">
        
<div class="logo_name">
  <img src="image/download.png" alt ="" style="width :50px ; height:50px ;border-radius:15px ; margin-top:5px;" > <br>
  <div class="logo">
        <h1 >
         
         Scheduler 

        </h1>



</div>
</div>
        
      </div>
  
</div>
    </header>








  <div class="body">
  </div>
		<div class="grad">
		</div>
		<div class="header">
			<div>Add<span><b>Subject</b></span></div>
		</div>
		<br>
		<form method="POST" > 
		<div class="login">
				<input type="text" placeholder="Subject Name" name="sname" required autocomplete="off"><br>
				<input type="number" placeholder="Semester No." name="sno" required ><br>
				<input type="text" placeholder="Subject Id" name="sid" required autocomplete="off"><br>
				Select Branch: <select name ="branch">
  <option value="cse"> CSE</option>
  <option value="it"> IT</option>
  <option value="ece"> ECE</option>
  <option value="eee"> EEE</option>
  <option value="mae"> MAE</option>
</select>
<br>
Lab: <br>
<select name ="lab">
  <option value="yes">YES</option>
  <option value="no">NO</option>
  
</select>
<br>
				<input type="number" maxlength=3 placeholder="Total Lecture" name="tel" required ><br>
				
				<input type="submit" value="ADD" name="add"> </form>
				<input type="button" value="HOME" onclick="home()">
				<script>
				function home(){
					window.location="home.php" ;
				}
				</script>

				</script>
		</div>
	
 

  <footer name ="foot" style="background: #eee; font-weight:bold;">
		<nav><a><center>HugeArdor © 2017</center></a></nav>
	</footer>

</body>
</html>
