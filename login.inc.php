<!DOCTYPE html>
<html>
  
<head>
    <title>Foodo</title>
</head>
  
  <?php


$host = 'localhost';
$db   = 'test';
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
  
        $email_adress =  $_REQUEST['email_adress'];
        $password =$_REQUEST['password'];
        
        $sql->prepare("SELECT * FROM user WHERE email =?")
          $sql->bind_param('s',$email);
         $sql->execute([ $email_adress, $password]); 
         $row=$sql->fetch();
        
        
        echo 'You have registered!';
       
        ?>
    </center>
</body>
  
</html>