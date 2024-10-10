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
    $_name= $_POST['name'];
    $hashpassword = md5($_POST['pwd']);
    // $sql ="select *from public.user where email = '".pg_escape_string($_POST['email'])."' and password ='".$hashpassword."'";
    $sql = "SELECT * FROM public.user
            WHERE name = '$_name'
            AND password = '$hashpassword'              
                    ;";
    
    
    // $data = pg_query($dbconn,$sql); 
    $data = getData($sql);
    print_r ($data);
    // $login_check = pg_num_rows($data);
    if(count($data)){ 
        echo "Login Successfully";   
        $_SESSION['access_rights'] = $data[0]['access_rights'];
        $_SESSION['username'] = $_name;

    }else{     
        echo "Invalid Details";
    }
}

if (isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  $access_rights = $_SESSION['access_rights'];
  echo "Пользователь: " .$username. ", Права доступа: ".$access_rights;
  ?>
  <a href='http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/auth/logout.php'>logout</a>
  <?

header('Location: ../index.php');
exit;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Авторизация</title>
  <!-- <meta name="keywords" content="PHP,PostgreSQL,Insert,Login"> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../css/all.min.css"/>
        <link rel="stylesheet" href="../css/index_style.css"/>

</head>
<body>

<div class="jumbotron jum">
            <!-- панель навигации -->
            <div class=" navbar">
            <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php" style="color: rgb(235, 239, 239);"> <h3 style="color: rgb(235, 239, 239);">Phone Book <i class="far fa-address-book"></i></h3></a>

            </div>
            <!-- панель навигации -->
            
            
            <div>
                
                
                <div class="col-lg-4 inp text-center">
  <h2>Login Here </h2>
  <form method="post">
  
     
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" required>
    </div>
    
     
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
     
    <input type="submit" name="submit" class="btn btn-primary" value="Войти">
    <!-- <input type="button" name="submit" class="btn btn-primary" value="Перейти на страницу регистрации"> -->
  </form>
  <br>
  <a class="btn btn-primary" href=register.php>Создать аккаунт</a>
    
</div>
</div>
</div>

</body>
</html>