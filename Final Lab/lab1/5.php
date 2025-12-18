<?php

class Book {
    private $title;
    private $author;
    private $year;

    public function __construct($title, $author, $year) {
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
        return "Title: " . $this->title . 
               ", Author: " . $this->author . 
               ", Year: " . $this->year;
    }
}


$book1 = new Book("Harry Potter", "J. K. Rowling", 1997);


echo $book1->getDetails();

?>
