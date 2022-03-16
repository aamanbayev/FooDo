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
  
          
        
        $recipe_name =  $_REQUEST['recipe_name'];
        $description = $_REQUEST['description']; 
        $calories = $_REQUEST['calories'];
        $servings = $_REQUEST['servings'];
        $preparation_time = $_REQUEST['preparation_time'];
        $cooking_time = $_REQUEST['cooking_time'];
        $difficulty =  $_REQUEST['difficulty'];
        $instructions=$_REQUEST['instructions'];
        
        
        $stmt=$pdo->prepare('SELECT * FROM recipes WHERE recipe_name=:recipe_name');
        $stmt->execute([$recipe_name]);
        $count=$stmt->rowCount();
        if($count==0)
        {

        $sql="INSERT INTO recipes(recipe_name,description, calories, servings, preparation_time, cooking_time, difficulty, instructions)
          VALUES (:recipe_name, :description, :calories, :servings, :preparation_time, :cooking_time, :difficulty, :instructions)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$recipe_name, $description, $calories, $servings, $preparation_time, $cooking_time,  $difficulty, $instructions]);
        
        echo 'Ok, added';
        }
        else
        {
            echo 'This recipe already exists!';
          ?>
          <br>
          <a href="suggest_recipe.php"> Back to suggest recipe </a>
          <?php
        }
       
        ?>
        <br>
        <a href="suggest_req.php">Add the ingredients needed for this recipe</a>
        <br>
        <a href="suggest_receives.php">Add reviews for this recipe</a>
        <br>
        <a href="suggest_has.php">Add macros for this recipe</a>
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