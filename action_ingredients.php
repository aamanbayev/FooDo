<header>
    <a class="active" href="index.php"><img alt=Foodo src="foodo.jpeg" width=180"></a>
    <button ><a class="active" href="search.php">Back to search</a> </button>
     <h2> Recipes Found </h2>
     	<link rel="stylesheet" href="style2.css" type="text/css">
       <center>
       <?php
include 'db2.php';


$checkboxselect=$_REQUEST['ing'];
$boolean=false;
$sql="SELECT DISTINCT R.recipe_name, R.description, R.calories, R.servings, R.preparation_time, R.cooking_time, R.difficulty, R.instructions 
FROM recipes R,ingredients I, requires Q 
    WHERE R.rid=Q.rid AND Q.iid=I.iid AND (";
foreach($checkboxselect as $row)
{

    $sql .=" I.iid={$row} OR ";

   

}
$newsql=rtrim($sql, "OR ");
$newsql.=")";
$stmt= $pdo->query($newsql);

$recipes=$stmt->fetchAll();

$count=$stmt->rowCount();
if($count>0){
    $boolean=true;
      foreach ($recipes as $recipe)
    {

      ?>
      <a href="recipe_page.php?rid=<?php echo $recipe['rid']?>"> <?php echo $recipe["recipe_name"]."\n"; ?> </a>
      <br>
      <?php
      
    }
            }
    

if($boolean==false)
    {
    echo 'No recipes found with this criteria!';
    ?>
    
    <a href="search_by_ingredients.php"> Try again? </a>
    <?php
    }
?>
<br>

  </center>

  <footer>
    <div class="footer">

       <ul class="footer-menu">
    <li> <a href="imprint.html"> Imprint </a> </li>
    <li><a href="contact.html"> Contact </a> </li>
       </ul>

      </div>
</footer> 