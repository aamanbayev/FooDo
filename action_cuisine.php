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

    $recipe_name='%'.$_REQUEST['recipe_name'].'%';
    $stmt= $pdo->prepare('SELECT * FROM contains WHERE recipe_name LIKE :recipe_name AND rid=cuid');
    $stmt->execute(['recipe_name'=>$recipe_name]);
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
    <a href="search_by_name.php"> Try again? </a>
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