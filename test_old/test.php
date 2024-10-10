<!-- // Проверяем нажата ли кнопка отправки формы
if (isset($_REQUEST['doGo'])) {
    
    // Все последующие проверки, проверяют форму и выводят ошибку
    // Проверка на совпадение паролей
    if ($_REQUEST['pass'] !== $_REQUEST['pass_rep']) {
        $error = 'Пароль не совпадает';
    }
    
    // Проверка есть ли вообще повторный пароль
    if (!$_REQUEST['pass_rep']) {
        $error = 'Введите повторный пароль';
    }
    
    // Проверка есть ли пароль
    if (!$_REQUEST['pass']) {
        $error = 'Введите пароль';
    }
 
    // Проверка есть ли email
    if (!$_REQUEST['email']) {
        $error = 'Введите email';
    }
 
    // Проверка есть ли логин
    if (!$_REQUEST['login']) {
        $error = 'Введите login';
    }
 
    // Если ошибок нет, то происходит регистрация 
    if (!$error) {
        $login = $_REQUEST['login'];
        $email = $_REQUEST['email'];
        // Пароль хешируется
        $pass = password_hash($_REQUEST['pass'], PASSWORD_DEFAULT);
        // Если день рождения не был указан, то будет самый последний год из доступных
        $DOB = $_REQUEST['year_of_birth'];
        
        // Добавление пользователя
        mysqli_query($db, "INSERT INTO `users` (`login`, `email`, `password`, `DOB`) VALUES ('" . $login . "','" . $email . "','" . $pass . "', '" . $DOB . "')");
        
        // Подтверждение что всё хорошо
        echo 'Регистрация прошла успешна';
    } else {
        // Если ошибка есть, то выводить её 
        echo $error; 
    }
}
 
?> -->
 
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Зарегистрироваться</title>
</head>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php
echo("Привет <br/>");

require_once 'connect.php';
echo("Формируем запрос и получаем данные <br/>");
$sql = "SELECT id FROM public.phones_and_e_mails_data
                          ORDER BY id DESC LIMIT 100 ;";
            $data = getData($sql);

            print_r($data) ;
            echo('<br/>');

            var_dump($data);
            // while ($result = pg_fatch_array($)){
            //     echo "<p>{$result['id_worker']} - {$result['surname']} </p>";
            // }

            echo('<br/><br/><br/><br/>');
            print_r($data);
            echo('<br/><br/><br/>Следующая выборка<br/> C');

$sql = "SELECT * FROM public.departments
                          ORDER BY _name DESC LIMIT 100 ;";
            $data = getData($sql);

            echo($data. '<br/>') ;

            // var_dump($data);
            // while ($result = pg_fatch_array($)){
            //     echo "<p>{$result['id_worker']} - {$result['surname']} </p>";
            // }

            print_r($data);


            echo('<br/><br/><br/>Следующая выборка<br/>');




$sql = "SELECT * FROM public.departments
                          ORDER BY _name DESC LIMIT 100 ;";
            $data = getData($sql);

            echo($data. '<br/>') ;

            // var_dump($data);
            // while ($result = pg_fatch_array($)){
            //     echo "<p>{$result['id_worker']} - {$result['surname']} </p>";
            // }

            print_r($data);
            

            echo('<br/><br/><br/>Следующая выборка<br/>');      
            foreach ($data as $value){
                echo($value['_name']);
                echo("<br/>");
            }      
            

?>
</body>
</html>