<?php
   class Book {
      public $title;
      public $author;
      public $year;
      public function __construct($title=null, $author=null, $year=null) {
         $this->title = $title;
         $this->author = $author;
         $this->year = $year;
      }
 
      public function setTitle($title) {
         $this->title = $title;
      }
      public function setAuthor($author) {
         $this->author = $author;
      }
      public function setYear($year) {
         $this->year = $year;
      }
 
      public function getDetails() {
         return "Title: ".$this->title."<br>Author: ".$this->author."<br>Year: ".$this->year."<br>";
      }
   }
 
   $book1 = new Book("Harry Potter", "JK Rolling", 2000);
   echo $book1->getDetails();
   $book2 = new Book();
   $book2->setTitle("Robin Hood");
   $book2->setAuthor("ABC XYZ");
   $book2->setYear("2010");
   echo $book2->getDetails();
 
?>
<!DOCTYPE html>
<html>
<head>
<title>Final Lab 1: Task 4</title>
</head>
 
   <body>
 
 
   </body>
</html>