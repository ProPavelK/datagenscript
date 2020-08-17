<html>
   <head>
      <title>List MySQL Table Fields</title>
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

// Create database connection
$link = new mysqli($servername, $username, $password, $dbname);

// Check linkection
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error) . "<br />";
}

if(mysqli_num_rows(mysqli_query($link,"SHOW TABLES LIKE '".$tblname1."'"))==1) {

// Query to get columns from table
$sql = "SELECT `COLUMN_NAME`,COLUMN_TYPE FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='users' AND TABLE_NAME='" . $tblname1."' order by DATA_TYPE";

if(mysqli_query($link, $sql)){
    
    $fields = array();
$res=mysqli_query($link,"SHOW COLUMNS FROM users");
while ($x = mysqli_fetch_assoc($res)){
  $fields[] = $x['Field'];
}
foreach ($fields as $f) { echo "<br>Field name: ".$f; }      

} else{
    echo "ERROR: Table $tblname1 does not exists <br />";
} 


}
   
else echo "Table $tblname1 does not exist";

// Close linkection
mysqli_close($link);
      ?>
   </body>
</html>