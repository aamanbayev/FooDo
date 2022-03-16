<!DOCTYPE html>
<html>
  
<head>
    <title>Foodo</title>
    <link rel="stylesheet" href="style2.css" type="text/css"/>
</head>
  
  <?php

include 'db.php';


?>
 <div class="topnav">
	<a class="active" href="index.php"><img alt=Foodo src="foodo.jpeg" width=180"></a>
</div>
<body>
    <center>
        <?php
  
          
        
        $title =  $_REQUEST['title'];
        $overall_rating = $_REQUEST['overall_rating'];
        $description=$_REQUEST['description'];
        
        $sql="INSERT INTO review(title,overall_rating, description)
          VALUES (:title, :overall_rating, :description)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$title, $overall_rating, $description]);
        
        echo 'Ok, added';
       
        ?>
        <br>
        <a href="suggest_receives.php">Link this review to its Recipe!</a>
        <br>
        <a href="suggest_writes.php">Who wrote this review?</a>
    </center>
</body>
<footer>
    <div class="footer">

       <ul class="footer-menu">
    <li> <a href="imprint.html"> Imprint </a> </li>
    <li><a href="contact.html"> Contact </a> </li>
       </ul>

      </div>
</footer>  
</html>