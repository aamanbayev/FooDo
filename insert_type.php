<!DOCTYPE html>
<html>
  
<head>
    <title>Foodo</title>
    <link rel="stylesheet" href="style2.css" type="text/css"/>
</head>
   <div class="topnav">
	<a class="active" href="index.php"><img alt=Foodo src="foodo.jpeg" width=180"></a>
</div>
  <?php

include 'db.php';


?>
<body>
    <center>
        <?php
  
          
        
        $name =  $_REQUEST['name'];
    
        $stmt=$pdo->prepare('SELECT * FROM type WHERE name=:name');
        $stmt->execute([$name]);
        $count=$stmt->rowCount();
        if($count==0)
        {
        
        $sql="INSERT INTO type(name)
          VALUES (:name)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$name]);
        
        echo 'Ok, added';
        }
        else
        {
          echo 'This ingredient type already exists!';
          ?>
          <br>
          <a href="suggest_type.php"> Back to suggest ingredient type </a>
          <?php
        }
        ?>
        
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