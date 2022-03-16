<header>
    <a class="active" href="index.php"><img alt=Foodo src="foodo.jpeg" width=180"></a>
    <button ><a class="active" href="search.php">Back to search</a> </button>
     <h2> Reviews Found </h2>
     	<link rel="stylesheet" href="style2.css" type="text/css">
    

</header>

<center>
<?php
include 'db2.php';
?>
<?php

$title='%'.$_REQUEST['title'].'%';
$stmt= $pdo->prepare('SELECT * FROM review WHERE title LIKE :title');
$stmt->execute(['title'=>$title]);
$review=$stmt->fetchAll();
?>

<?php 
$count=$stmt->rowCount();
if($count>0){
foreach ($review as $rev)
{
  ?>
  <?php echo $rev["title"]."\n"; ?> 
  <p>Overall Rating: <?php echo $rev["Overall_rating"]."\n"; ?> </p>
  <?php echo $rev["Description"]."\n"; ?>
  <br>
  <br>
  <br>
  <?php
  
}
}
else
{
echo 'No review found with this criteria!'?>
<a href="search_by_review.php"> Try again? </a>
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