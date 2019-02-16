<?php
    header("Content-Type:text/html;charset=utf-8");
    $con = mysqli_connect("localhost", "root", "root", "huaban");
    mysqli_set_charset($con, "utf8");
    
    $text = $_POST["text"];
    
  
    if(empty($text)){
        echo 0;
    }
 else {
   $sql = "insert into comment (conent) value('$text')";
    mysqli_query($con, $sql);  
       echo 1; 
}
    
    
    
    
    
?>