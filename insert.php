<!DOCTYPE html>
<html>
  
<head>
    <title>Foodo</title>
    <link rel="stylesheet" href="style2.css" type="text/css"/>
</head>
  
  <?php


$host = 'localhost';
$db   = 'foodo';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
<body>
    <center>
        <?php
  
          
        
        $ingredient_name =  $_REQUEST['ingredient_name'];
        $calories = $_REQUEST['calories'];
        $quantity =  $_REQUEST['quantity'];
        $type_id=$_REQUEST['type'];
        
        $sql="INSERT INTO ingredients(type_id,ingredient_name, calories, quantity)
          VALUES (:type_id, :ingredient_name, :calories, :quantity)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([$type_id, $ingredient_name, $calories, $quantity]);
        
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