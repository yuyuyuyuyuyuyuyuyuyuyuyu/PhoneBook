<?
// $host = '127.0.0.1'; // Имя или адрес сервера
// $user = 'postgres'; // Имя пользователя БД
// $password = 'z'; // Пароль пользователя
// $dbname = 'pb'; // Название БД
// $port = 5432;
// $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
// $dbconn = pg_connect($connection_string);
//


session_start();
require_once '../connect.php';

if(isset($_POST['submit'])&&!empty($_POST['submit'])){

  // echo ".pg_escape_string($_POST['email'])." ;
    $email = $_POST['email'];
    $hashpassword = md5($_POST['pwd']);
    // $sql ="select *from public.user where email = '".pg_escape_string($_POST['email'])."' and password ='".$hashpassword."'";
    $sql = "SELECT * FROM public.user
            WHERE email = '$email'
            AND password = '$hashpassword'              
                    ;";
    
    
    // $data = pg_query($dbconn,$sql); 
    $data = getData($sql);
    // print_r ($data);
    // $login_check = pg_num_rows($data);
    if(count($data)){ 
        echo "Login Successfully";   
        $_SESSION['username'] = $email;
    }else{     
        echo "Invalid Details";
    }
}

if (isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  echo "HELLOW" .$username. "";
  ?>
  <a href='http://pb1/PhoneBook-master-GOOD/PhoneBook-master/auth/logout.php'>logout</a>
  <?
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP PostgreSQL Registration & Login Example </title>
  <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login Here </h2>
  <form method="post">
  
     
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    
     
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
     
    <input type="submit" name="submit" class="btn btn-primary" value="Войти">
    <!-- <input type="button" name="submit" class="btn btn-primary" value="Перейти на страницу регистрации"> -->
  </form>
  <a class="btn btn-primary" href=register.php>Создать аккаунт</a>
    
</div>

</body>
</html>