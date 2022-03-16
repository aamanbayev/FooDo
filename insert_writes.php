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
  
          
        
        $revid = $_REQUEST['revid'];
        $uid = $_REQUEST['uid'];
        
        
        $sql="INSERT INTO writes(uid,revid)
          VALUES (:uid,:revid)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$uid, $revid]);
        
        echo 'Ok, added';
       
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