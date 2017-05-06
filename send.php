<?php
	if(isset($_POST['go']))
	{
		 $gid= $_POST['gid'];
		 $cid = $_POST['cid'] ;
     $div = $_POST['div'] ;
           		 $mysqli = NEW  MySQLi('localhost', 'root', '' , 'praniti') ;
              $query=$mysqli->query("SELECT * FROM course where guide_id = '$gid' and course_id = '$cid'");
             $row= $query->fetch_assoc() ;
                  if($query->num_rows !=0 )
                    {  
                         echo '<script type="text/javascript">
                        alert("Already Done !");
                        window.location="home_guide.php";
                        </script> ';  
                    }
                   else
                   {
                   	 $q = $mysqli->query("INSERT INTO course (course_id, guide_id, div_no) VALUES ( '$cid' , '$gid', '$div') ");
                      echo '<script type="text/javascript">
                         alert(" Done !'.$row["sno"].'");
                        window.location="home_guide.php";
                        </script> ';
                   }

          
	 } 
	




?>