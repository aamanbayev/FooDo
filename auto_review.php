
<?php

$host = "localhost";
$user = "root"; 
$password = ""; 
$dbname = "group9"; 
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['search'])){
 $search = mysqli_real_escape_string($con,$_POST['search']);

 $query = "SELECT * FROM review WHERE title like'%".$search."%'";
 $result = mysqli_query($con,$query);

 $response = array();
 while($row = mysqli_fetch_array($result) ){
   $response[] = array("label"=>$row['title']);
 }

 echo json_encode($response);
}

exit;