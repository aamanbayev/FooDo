<header>
    <a class="active" href="index.php"><img alt=Foodo src="foodo.jpeg" width=180"></a>
    <button ><a class="active" href="search.php">Back to search</a> </button>
     <h2> Recipes Found </h2>
     	<link rel="stylesheet" href="style2.css" type="text/css">
       
       <center>
       <?php
include 'db2.php';
$checkboxselect=$_REQUEST['countries'];
$boolean=false;
foreach($checkboxselect as $row)
{
    $stmt= $pdo->prepare('SELECT * FROM  recipes R,cuisine C, contains T 
    WHERE R.rid=T.rid AND C.cuid=T.cuid AND C.cuid =:row');
    $stmt->execute([$row]);
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
    
}
if($boolean==false)
    {
    echo 'No recipes found with this criteria!';
    ?>
    
    <a href="search_by_cuisine.php"> Try again? </a>
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


