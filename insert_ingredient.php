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
  
          
        
        $ingredient_name =  $_REQUEST['ingredient_name'];
        $calories = $_REQUEST['calories'];
        $quantity =  $_REQUEST['quantity'];
        $type_id=$_REQUEST['type'];

        $stmt=$pdo->prepare('SELECT * FROM ingredients WHERE ingredient_name=:ingredient_name');
        $stmt->execute([$ingredient_name]);
        $count=$stmt->rowCount();
        if($count==0)
        {

        
        $sql="INSERT INTO ingredients(type_id,ingredient_name, calories, quantity)
          VALUES (:type_id, :ingredient_name, :calories, :quantity)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$type_id, $ingredient_name, $calories, $quantity]);
        
        echo 'Ok, added';
       
        
        }
        else
        {
          echo 'This ingredient already exists!';
          ?>
          <br>
          <a href="suggest_ingredient.php"> Back to suggest ingredient </a>
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