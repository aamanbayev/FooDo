<header>
    <a class="active" href="index.php"><img alt=Foodo src="foodo.jpeg" width=180"></a>
    <button ><a class="active" href="search.php">Back to search</a> </button>
     <h2> Recipes Found </h2>
     	<link rel="stylesheet" href="style2.css" type="text/css">
       

</header>
<center>
<?php
include 'db2.php';
?>
<?php

    $cooking_time=$_REQUEST['cooking_time'];
    $stmt= $pdo->prepare('SELECT * FROM recipes WHERE cooking_time <=:cooking_time');
    $stmt->execute(['cooking_time'=>$cooking_time]);
    $recipes=$stmt->fetchAll();
    ?>
      
 <?php 
$count=$stmt->rowCount();
if($count>0){
  foreach ($recipes as $recipe)
    {
      ?>
      <a href="recipe_page.php?rid=<?php echo $recipe['rid']?>"> <?php echo $recipe["recipe_name"]."\n"; ?> </a>
      <br>
      <?php
      
    }
    }
    else
{
    echo 'No recipes found with this criteria!'?>
    <a href="search_by_cookingtime.php"> Try again? </a>
    <?php
}
?>
</center>
<footer>
    <div class="footer">

       <ul class="footer-menu">
    <li> <a href="imprint.html"> Imprint </a> </li>
    <li><a href="contact.html"> Contact </a> </li>
       </ul>

      </div>
</footer> 