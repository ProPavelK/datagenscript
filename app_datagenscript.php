<html>
   <head>
      <title>Insert Random Data into MySQL Table</title>
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

// Create linkection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error) . "<br />";
}

$user_index = 13;
$book_index = random_int(50,69);
$uber_index = random_int($user_index,69);
echo "number of users = " . $user_index . "<br />";

for($u=1;$u<=$user_index;$u++){
    echo("INSERT INTO ".$tblname1." (firstname, lastname) VALUES ('Firstname".$u."','Lastname".$u."')")."<br />";    
    mysqli_query($link,"INSERT INTO ".$tblname1." (firstname, lastname) VALUES ('Firstname".$u."','Lastname".$u."')");
    //do some other testing
} 

echo "amount of books with titles in 2d table = " . $book_index . "<br />";
for($b=1;$b<=$book_index;$b++){
    $book_pub_office = random_int(1,5);
    echo("INSERT INTO ".$tblname2." (pubid, book_title) VALUES ($book_pub_office,'BookName".$b."')")."<br />";    
    mysqli_query($link,"INSERT INTO ".$tblname2." (pubid, book_title) VALUES ($book_pub_office,'BookName".$b."')");
    //do some other testing
}

$sql1 = "SELECT * FROM ".$tblname1.""; 
if ($res = mysqli_query($link, $sql1)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table>"; 
        echo "<tr>";
        echo "<th>ID</th>"; 
        echo "<th>Firstname</th>"; 
        echo "<th>Lastname</th>"; 
        echo "<th>Books</th>"; 
        echo "</tr>"; 
        echo "books per user = " . $uber_index . "<br />";        
        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr>"; 
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['firstname']."</td>"; 
            echo "<td>".$row['lastname']."</td>"; 
            echo "<td>".$row['book_num']."</td>"; 
            echo "</tr>"; 
            
            for($uber=1;$uber<=$uber_index;$uber++){
                $book_link = random_int(1,$uber_index);
                echo("INSERT INTO ".$tblname3." (book, covid) VALUES ($book_link, ".$row['id'].")")."<br />";    
                mysqli_query($link,"INSERT INTO ".$tblname3." (book, covid) VALUES ($book_link, ".$row['id'].")");
                //do some other testing
            }
            
            echo("UPDATE ".$tblname1." SET book_num = ".$uber_index." WHERE id = ".$row['id']."" . "<br>");   
            mysqli_query($link,"UPDATE ".$tblname1." SET book_num = ".$uber_index." WHERE id = ".$row['id']."");    
            echo "<br />";
                               
        } 
        echo "</table>"; 
        mysqli_free_result($res); 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql1. "
                                .mysqli_error($link); 
} 
echo "<br />";

// Close connection
mysqli_close($link);
      ?>
   </body>
</html>