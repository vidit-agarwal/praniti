<?php  

if(!isset($_POST['allot']))
{

     echo "hi" ;
}
?>


     $mysqli = NEW  MySQLi('localhost', 'root', '' , 'praniti') ;
     if(isset($_POST['get_allot']))
     {
          $user_id = $_POST['get_allot'];
     }
    // $user_id = $mysqli->real_escape_string($_POST["get_allot"]);
     $query = $mysqli->query("SELECT * FROM learner WHERE uid ='$user_id'  ") ;

     $match1 = $mysqli->query("SELECT * FROM guide_data WHERE uid='$uid'  ");
                                                                     while($row1= $match1->fetch_assoc())
                                                                     {   /*echo $row1["uid"];
                                                                 echo " ".$_SESSION['userlog'] ;*/
                                                                      if($row1["uid"] == $_SESSION['userlog'])
                                                                      {
                                                                            $coursename=$row1["expertise"] ;
                                                                                     //echo $coursename;//."'>'".$row["uid"]."'</option>";

                                                                                while($ans = $query->fetch_assoc())
                                                                                     {
                                                                                               if($ans["course_taken"] == $coursename)
                                                                                               {
                                                                                                    $get_guide_uid = $row1["uid"];

                                                                                                    
                                                                                                    $fin_q = $mysqli->query("SELECT * FROM fields WHERE fields_value='$coursename'");
                                                                                                    $result2 = $fin_q->fetch_assoc();
                                                                                                    $get_id = $result2["field_id"];




                                                                                                    $final_query = $mysqli->query("SELECT * FROM course WHERE guide_id = '$get_guide_uid' ");
                                                                                                    while($result3= $final_query->fetch_assoc())
                                                                                                    {
                                                                                                         if($result3["course_id"]==$get_id)
                                                                                                         {
                                                                                                              $update_query = $mysqli->query("UPDATE learner SET g_s_no='$get_id' WHERE uid ='$user_id' AND course_taken=' $coursename' ") ;
                                                                                                                   }
                                                                                                    }








                                                                                                    
                                                                                               }
                                                                                     }    

                                                                                
                                                                           }
                                                                      
                                                                     }






          


}
