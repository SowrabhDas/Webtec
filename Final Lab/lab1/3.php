<?php
   function sum($a, $b) {
      return $a + $b;
   }
   echo "23 + 43 = ".sum(23, 43)."<br>";
   echo "232 + 432 = ".sum(232, 432)."<br>";
   echo "523 + 543 = ".sum(523, 543)."<br>";
 
   echo "<br>";
 
   function fact($a) {
      if($a<=1) {
         return 1;
      } else {
         return $a*fact($a-1);
      }
   }
   echo "Factorial of 5: ".fact(5);
 
   echo "<br>";
 
   function isPrime($a) {
      $prime = true;
      for($i= 2; $i<=$a/2; $i++) {
         if($a%$i== 0) {
            $prime = false;
         }
      }
 
      if($prime) {
         return "Prime";
      } else {
         return "Not Prime";
      }
   }
 
   echo "23: ".isPrime(23)."<br>";
   echo "21: ".isPrime(21)."<br>";
   echo "53: ".isPrime(53)."<br>";
   echo "69: ".isPrime(69)."<br>";
 
?>
<!DOCTYPE html>
<html>
<head>
<title>Final Lab 1: Task 3</title>
</head>
 
   <body>
 
 
   </body>
</html>