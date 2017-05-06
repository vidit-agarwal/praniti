<?php
require ('db_connect.php') ;
if (isset($_POST['submit']))
{
$firstname = mysqli_escape_string($_POST['fname']) ;
$lastname = mysqli_escape_string($_POST['lname']) ;
$password = mysqli_escape_string($_POST['pass'])


}





?>