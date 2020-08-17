<html>
   <head>
      <title>Delete MySQL Table</title>
   </head>
   
   <body>
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
// Check linkection
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error) . "<br />";
}
 
// Attempt delete table1 query execution
$sql1 = "DROP TABLE " . $tblname1;
if(mysqli_query($link, $sql1)){
    echo "Table $tblname1 deleted successfully.<br />";
} else{
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link) . "<br />";
} 
 
// Attempt delete table1 query execution
$sql2 = "DROP TABLE " . $tblname2;
if(mysqli_query($link, $sql2)){
    echo "Table $tblname2 deleted successfully.<br />All done.<br />";
} else{
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link) . "<br />";
}  

// Attempt delete table1 query execution
$sql3 = "DROP TABLE " . $tblname3;
if(mysqli_query($link, $sql3)){
    echo "Table $tblname2 deleted successfully.<br />All done.<br />";
} else{
    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($link) . "<br />";
} 

// Attempt delete table1 query execution
$sql4 = "DROP TABLE " . $tblname4;
if(mysqli_query($link, $sql4)){
    echo "Table $tblname4 deleted successfully.<br />All done.<br />";
} else{
    echo "ERROR: Could not able to execute $sql4. " . mysqli_error($link) . "<br />";
}
 
// Close linkection
mysqli_close($link);
      ?>
   </body>
</html>