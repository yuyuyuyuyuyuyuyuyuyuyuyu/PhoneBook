
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP PostgreSQL Registration & Login Example </title>
  <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/all.min.css"/>
  <link rel="stylesheet" href="../css/index_style.css"/>


  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</head>

<?php
 session_start();
 require_once '../connect.php';
 if (isset($_SESSION['username'])){
 $username = $_SESSION['username'];
 echo ("<p align='right'style='padding-right: 10px;'>пользователь: <b>".$username. "</b>");
 print_r($_SESSION);
 ?>
 <a href='http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/auth/logout.php'>logout</a>
 <?php
}else{
 ?>
     <a href='../auth/login.php'>Авторизация</a>
 <br><?
}

?>



<body>


<div class="jumbotron jum" style="background-color: rgba(29,78,124,.7);">
<?php



// $host = '127.0.0.1'; // Имя или адрес сервера
// $user = 'postgres'; // Имя пользователя БД
// $password = 'z'; // Пароль пользователя
// $dbname = 'pb'; // Название БД
// $port = 5432;
// $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
// $dbconn = pg_connect($connection_string);


if(isset($_POST['submit'])&&!empty($_POST['submit'])){
    
    $sql = "insert into public.user(name,email,password,access_rights)values('".$_POST['name']."','".$_POST['email']."','".md5($_POST['pwd'])."','".$_POST['access_rights']."')";
    $ret = pg_query($conn, $sql);
    if($ret){
        
            echo "Data saved Successfully";
    }else{
        
            echo "Soething Went Wrong";
    }
}

?>

<div class=" navbar">
            <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php" style="color: rgb(235, 239, 239);"> <h3>Phone Book <i class="far fa-address-book"></i></h3></a>
                    <!-- <a class="active" href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">Home</a> -->
                    <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/addNewContact.php" style="color: rgb(235, 239, 239);">Добавление контакта</a>
            </div>



<div class="container">
  <center><h2>Панель регистрации </h2></center>





  <form method="post">

  <div class="form-group">
  <label for="access_rights">Права доступа:</label>
  <select name="access_rights" value="Права доступа" class="form-control" placeholder="Права доступа" id="access_rights">
                        
                        <option value="Redactor">Redactor</option>
                        <option value="Admin">Admin</option>
                        
                        <!-- <option value="Старушка шапокляк">Старушка шапокляк</option>  -->
  </select> 
  </div>
  
    <div class="form-group">
      <label for="name">Имя:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" requuired>
    </div>
    
    <div class="form-group">
      <label for="email">Электронная почта:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    
    <!-- <div class="form-group">
      <label for="pwd">Mobile No:</label>
      <input type="number" class="form-control" maxlength="10" id="mobileno" placeholder="Enter Mobile Number" name="mobno">
    </div> -->
    
    <div class="form-group">
      <label for="pwd">Пароль:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
     
    <input type="submit" name="submit" class="btn btn-primary" value="Зарегистрироваться">
  </form>
</div>
</div>

</body>
</html>