<?php
   for( $i = 1; $i <= 20; $i++ ) {
      echo $i." ";
   }
 
   echo "<br>";
 
   $j = 1;
   while($j<=20) {
      if($j%2==0) {
         echo $j." ";
      }
      $j++;
   }
 
   echo "<br>";
 
   $fruits = array(
      "Apple" => "Red",
      "Banana" => "Yellow",
      "Mango"=> "Yellow",
      "Coconut"=> "Grey",
   );
 
   foreach($fruits as $k => $v) {
      echo "The color of $k is $v.<br>";
   }
 
   echo "<br>";
 
   for( $i = 1; $i <= 20; $i++ ) {
      echo $i." ";
      if($i>=5) {
         break;
      }
   }
 
?>
<!DOCTYPE html>
<html>
<head>
<title>Final Lab 1: Task 2</title>
</head>
 
   <body>
 
 
   </body>
</html>