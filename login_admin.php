<?php  
 session_start();  
 $host = "localhost";  
 $username = "group9";  
 $password = "xNs1UQ";  
 $database = "group9";  
 $message = "";  
  try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["email"]) || empty($_POST["password"]))  
           {  
                $message = '<label>Both fields need to be filled!</label>';
                  
           }  
           else  
           {    
                $email=$_POST["email"];
                $password=$_POST["password"];
                if(strpos($email,';')!==false||strpos($password,';')!==false)
                {
                       header("location:inject.php");
                }
                else
                {
                $query = "SELECT * FROM user WHERE email_adress = :email AND password = :password AND uid=30001";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'email'     =>     $_POST["email"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["email"] = $_POST["email"];  
                     header("location:submission.php");  
                }  
                else  
                {  
                    header("location:error.php"); 
                }  
               }
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
      <a class="active" href="index.php"><img alt=Foodo src="foodo.jpeg" width=180"></a>
     <h2> Admin Login </h2>
     	<link rel="stylesheet" href="style2.css" type="text/css">
      </head>  
      <body>  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
                <form method="post">  
                     <label>Email</label>  
                     <input type="text" name="email" class="form-control" />  
                     <br /> 
                     <br />
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Login" />  
                </form>  
           </div>  
           <br />  
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