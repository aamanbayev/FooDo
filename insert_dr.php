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
  
          
        $table='category';
        $restriction=$_REQUEST['restriction'];
        $stmt=$pdo->prepare('SHOW COLUMNS FROM category LIKE :restriction');
        $stmt->execute([$recipe_name]);
        $count=$stmt->rowCount();
        if($count==0)
        {
        $sql="ALTER TABLE `$table` ADD `$restriction` int(11)";
        $pdo->query($sql);
        echo 'Ok, added';
        }

        else
        {
            echo 'This restriction already exists!';
          ?>
          <br>
          <a href="suggest_dr.php"> Back to suggest dierary restriction </a>
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
