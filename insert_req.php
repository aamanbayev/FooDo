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
  
          
        
        $iid = $_REQUEST['iid'];
        $rid = $_REQUEST['rid'];
        
        
        $sql="INSERT INTO requires(iid,rid)
          VALUES (:iid,:rid)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$iid, $rid]);
        
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