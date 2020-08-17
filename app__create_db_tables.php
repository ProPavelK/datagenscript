<?php
// Configuration parameters
$servername = "sql666.aka.com"; 
$username = "root";
$password = "";
$dbname = "app";
$tblname1 = "users"; 
$tblname2 = "books"; 
$tblname3 = "users_books_mm";
$tblname4 = "books_pub_offices";
 
// Create linkection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error) . "<br />";
}
 
// Attempt create table query execution
$sql1 = "CREATE TABLE " . $tblname1 . "(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    book_num INT DEFAULT 0
)";

if(mysqli_query($link, $sql1)){
    echo "Table $tblname1 created successfully.<br />All done.<br />";
} else{
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link) . "<br />";
} 
 
// Attempt create table query execution
$sql2 = "CREATE TABLE " . $tblname2 . "(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    pubid INT NOT NULL,
    book_title VARCHAR(66)
)";

if(mysqli_query($link, $sql2)){
    echo "Table $tblname2 created successfully.<br />All done.<br />";
} else{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link) . "<br />";
} 
 
// Attempt create table query execution
$sql3 = "CREATE TABLE " . $tblname3 . "(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    covid INT NOT NULL,
    book INT NOT NULL
)";

if(mysqli_query($link, $sql3)){
    echo "Table $tblname3 created successfully.<br />All done.<br />";
} else{
    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($link) . "<br />";
}  
 
// Attempt create table query execution
$sql4 = "CREATE TABLE " . $tblname4 . "(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    pub_office VARCHAR(66)
)";

if(mysqli_query($link, $sql4)){
    echo "Table $tblname4 created successfully.<br />All done.<br />";
} else{
    echo "ERROR: Could not able to execute $sql4. " . mysqli_error($link) . "<br />";
} 
  
$sql4i = "INSERT INTO " . $tblname4 . " (pub_office) VALUES ('A & C Black');";
$sql4i.= "INSERT INTO " . $tblname4 . " (pub_office) VALUES ('A. C. McClurg');";
$sql4i.= "INSERT INTO " . $tblname4 . " (pub_office) VALUES ('A. S. Barnes & Co.');";
$sql4i.= "INSERT INTO " . $tblname4 . " (pub_office) VALUES ('Ablex Publishing');";
$sql4i.= "INSERT INTO " . $tblname4 . " (pub_office) VALUES ('Abrams Books');";
$sql4i.= "INSERT INTO " . $tblname4 . " (pub_office) VALUES ('Academic Press');";
$sql4i.= "INSERT INTO " . $tblname4 . " (pub_office) VALUES ('Ace Books');";

if(mysqli_multi_query($link, $sql4i)){
    echo "Table $tblname4 created successfully.<br />All done.<br />";
} else{
    echo "ERROR: Could not able to execute $sql4i. " . mysqli_error($link) . "<br />";
}
  
// Close linkection
mysqli_close($link);
?>