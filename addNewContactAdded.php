<html>
    <head>
       <link rel="icon" href="images/cropped-telegram_alfa-radon_logo-1-32x32.png">
       <title>🕾 Контакт добавлен</title>
        <!-- <link rel="stylesheet" href="css/my.min.css"/> -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/all.min.css"/>
        <link rel="stylesheet" href="css/index_style.css"/>
    </head>
    
    <body>
    <?php
            // global $conn;
            // $conn = pg_connect("host=127.0.0.1 port=5432 dbname=phonebook user=postgres password=postgres");
            // Подключение БД
            require_once 'connect.php';
            // function query($sql)
            // {
            //     global $conn;
            //     $result = pg_query($conn, $sql);
            //     if (!$result) {
            //     echo "An error occurred.\n";
            //     exit;
            //     }
            //     return $result;
            // }

            // function getData($sql){
    
            //     $result=query($sql);
            //     $data = array ();
            
            //     // while ($row = pg_fetch_all($result)) {
            //     //     echo "Author: $row[0]  E-mail: $row[1]";
            //     //     echo "<br />\n";
            //     // }
            //     return pg_fetch_all($result);
            // }
            // получаем ID юзера
            $sql = "SELECT  id FROM public. phones_and_e_mails_data
                          ORDER BY  id DESC LIMIT 1 ;";
            $data = getData($sql);
            //   echo '<pre>';
            //      print_r(($data[0])['id']);
            //   echo '<pre>';
            
            // $userDepartment = !empty($_POST['userDepartment']) ? $_POST['userDepartment'] : '';
            $userDepartment1 = !empty($_POST['userDepartment1']) ? $_POST['userDepartment1'] : '';
            // echo('<br/>');
                // echo('$userDepartment1: ');
                // print($userDepartment1);
                $userDepartment1 = trim($userDepartment1);
            //     echo('<br/>');
                // $userDepartment1  = str_replace(array('=','>',')','(','[',']','\n','/n'),'',$userDepartment1);
                $userDepartmentArray1 = explode(' ',$userDepartment1);
               
                // echo('<br/>');echo('<br/>');
                // print_r($userDepartmentArray1);
                // echo('<br/>');echo('<br/>');
                // echo $userDepartmentArray1[0];
                // echo('<br/>');echo('<br/>');
                // $userDepartmentArray1 = unserialize($userDepartment1);
                // echo('<br/>');
                // echo('<br/>');
                // echo('$userDepartment1: ');
                // print($userDepartment1);
                // echo('<br/>');
                // echo('<br/> userDepartmentArray1: ');
                // print_r($userDepartment1);
                // echo('<br/>');
                // echo('<br/> VAR DUMP userDepartmentArray1: ');
                // print_r($userDepartment1[0]);
                // echo('<br/>');
                // echo('<br/>');
                $user_department_name = '';
                
                $arr_len = count($userDepartmentArray1);
                for ($i = 1; $i < $arr_len; $i++) {
                    $user_department_name = $user_department_name.$userDepartmentArray1[$i].' ';
                }

                //  echo('<br/>');
                //  echo('<br/> VAR DUMP userDepartmentArray1: ');
                // print_r($user_department_name);
                //  echo('<br/>');
                // echo('<br/>');


            $filial = !empty($_POST['filial']) ? $_POST['filial'] : '';
            $userSurname = !empty($_POST['userSurname']) ? $_POST['userSurname'] : '';
            $userName = !empty($_POST['userName']) ? $_POST['userName'] : '';
            $userPatronymic = !empty($_POST['userPatronymic']) ? $_POST['userPatronymic'] : '';
            $userWorkPhone = !empty($_POST['userWorkPhone']) ? $_POST['userWorkPhone'] : '';
            $userShortNumber = !empty($_POST['userShortNumber']) ? $_POST['userShortNumber'] : '';
            $userWorkMobilePhone = !empty($_POST['userWorkMobilePhone']) ? $_POST['userWorkMobilePhone'] : '';
            $userEmail = !empty($_POST['userEmail']) ? $_POST['userEmail'] : '';
            $job_title = !empty($_POST['job_title']) ? $_POST['job_title'] : '';
                   
            // $userEmail = $_REQUEST['userEmail'];
            // echo ($userName)
            // ########################################################################
            // Добавление данных в таблицу
                $id = ($data[0])['id']+1; 
                $permition = 3;
                //  $mail = $_POST['city_name'];
                // $department = $userDepartmentArray1[6];
                $department = $userDepartmentArray1[0];
                // print ("<br> department id: <br>");
                // print $department;
                $query = "INSERT INTO  phones_and_e_mails_data (id,department,surname,_name,patronymic,telephone,mail,job_title,tel_rab, kor_nomer, worker, filial) 
                           values ('$id','$department','$userSurname','$userName','$userPatronymic','$userWorkMobilePhone', '$userEmail','$job_title','$userWorkPhone','$userShortNumber',true,'$filial')";            
            // ########################################################################
            ?>

        <br>
        <div class="jumbotron jum">
            <!-- панель навигации -->
            <div class=" navbar">
            <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php" style="color: rgb(235, 239, 239);"> <h3 style="color: rgb(235, 239, 239);">Phone Book <i class="far fa-address-book"></i></h3></a>
            </div>
            <!-- панель навигации -->
           <? 
                  // echo('<br/>');
                  // echo ($query);
                  // echo('<br/>');
           ?>
           <?php if($result = pg_query($conn, $query)){
                ?><h1 style="color: rgb(235, 239, 239);"><center>Контакт добавлен</center></h1><?php 
                }
                else{
                    ?><h1 style="color: red;"><center>Контакт НЕ добавлен</center></h1><?php
                    echo "Error.";
                }
                ?>
            <br>
           
            <p class="my_box text-center jumbotron jum"> 
                 

            <br>     
                 <?= $filial ?>    
                    <br>
                 Отдел: <?= $user_department_name ?>
                  <br>
                 Должность: <?= $job_title ?>
                  <br> 
                 Фамилия: <?= $userSurname ?>
                 <br>
                 Имя: <?= $userName ?>
                 <br>
                 Отчество: <?= $userPatronymic ?><br>
                 Рабочий телефон: <?= $userWorkPhone ?><br>
                 Короткий номер: <?= $userShortNumber ?><br>
                 Мобильный телефон: <?= $userWorkMobilePhone ?><br>
                 Электронная почта: <?= $userEmail ?><br>
                - - - - - - - - - - 
            </p>
           

            
            
        </div>
        
        
        
        
        <footer class="text-center">@Санаторий "Альфа-Радон"</footer>
        
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  
    </body>
    
</html>













