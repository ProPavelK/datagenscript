<?php
// Include configuration file
include 'app__configuration.php';

$errors = array(); //To store errors
$form_data = array(); //Pass back the data to form

/* Validate the form on the server side */
if (empty($_POST['name'])) { //Name cannot be empty
    $errors['name'] = 'Name cannot be blank';
}

if (!empty($errors)) { //If errors in validation
    $form_data['success'] = false;
    $form_data['errors']  = $errors;
}
else { 
//If not, process the form, and return true on success

    $form_data['success'] = true;
    $form_data['posted'] = 'Deleting tables. Just a moment.';
    $form_data['name'] =  $_POST['name'];
    $form_data['place'] = $_POST['place'];

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

}

//Return the data back to form.php
echo json_encode($form_data);

?>