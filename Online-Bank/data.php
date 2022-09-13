<?php
// connect to database
$host="";
$user="";
$pass="";
$db="accounts";
$dbh = mysqli_connect($host, $user, $pass, $db);

// turn off auto-commit
mysqli_autocommit($dbh, FALSE);

// run query 1
$result = mysqli_query($dbh, $query1);
if ($result !== TRUE) {
    mysqli_rollback($dbh);  // if error, roll back transaction
}

// run query 2
$result = mysqli_query($dbh, $query2);
if ($result !== TRUE) {
    mysqli_rollback($dbh);  // if error, roll back transaction
}
   
// and so on…

// assuming no errors, commit transaction
mysqli_commit($dbh);

// close connection
mysqli_close($dbh);
?>