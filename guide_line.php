
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

if (isset($_POST['guide'])) {
   //connect to daatabase;
     $mysqli = NEW  MySQLi('localhost', 'root', '' , 'praniti') ;
     
     $sno = $mysqli->real_escape_string($_POST['sno']);
     $div = $mysqli->real_escape_string($_POST['div']);



}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <title>  Praniti: The Guidance</title>
  <link href="image/download.png" rel="icon"> 
</head>
<body ng-app="postserviceApp" ng-controller="postserviceCtrl">

<h1>
    <?php
    echo $_SESSION['userlog']."  Course Id : ".$sno." -> div : ".$div ;



    ?>

</h1>
    <form action="text_entry.php" method="post" >
    <textarea name="guide_text" id="" cols="90" rows="30" ng-model="text_data" value="hello"></textarea>
    <br/>
    <input type="button" value="Submit" name="submit" ng-click="postdata(text_data)">
        <div><pre>{{msg}}</pre></div>
    <br/>
    </form>
    <script>
        var app = angular.module('postserviceApp', []);
        app.controller('postserviceCtrl', function ($scope, $http) {
            $scope.postdata = function (text_data) {
                 var dataform ={
                    'sno' :<?php echo $sno ;?> ,
                    'div' :<?php echo $div ;?>,
                    'data' : text_data 
                 } ;
                $http.post('text_entry.php',dataform).then(function (response) {
                        if (response.data)
                        $scope.msg = "Post Data Submitted Successfully!";
                        $scope.con = response.data;
                        }, function (response) {
                        $scope.msg = "Service not Exists";
                        $scope.statusval = response.status;
                        $scope.statustext = response.statusText;
                        $scope.headers = response.headers();
                        });
            };
        });
    </script>
</body>
</html>