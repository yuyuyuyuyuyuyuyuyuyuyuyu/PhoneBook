<html>
    <head>
        <title>🕾 Телефонная книга</title>
        <link rel="icon" href="images/cropped-telegram_alfa-radon_logo-1-32x32.png">
        <!-- <link rel="stylesheet" href="css/my.min.css"/> -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/all.min.css"/>
        <link rel="stylesheet" href="css/index_style.css"/>
        <link rel="stylesheet" href="css/live_search.css"/>
    </head>

    <body>


<?php
 // Подключение БД
 require_once 'connect.php';
    session_start();
    if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $access_rights = $_SESSION['access_rights'];
    echo ("<p align='right'style='padding-right: 10px;'>пользователь: <b>".$username.  "</b> Права доступа: ".$access_rights." ");
    ?>
    <a href='http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/auth/logout.php'>logout</a>
    <?php
  }else{
    ?>

        <a href='http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/auth/login.php'>Авторизация</a>
    <br><?php
  }
?>



    <?php

            // получаем ID юзера
            // $sql = "SELECT  * FROM public. phones_and_e_mails_data
            //               ORDER BY  id ASC ;";
            // $sql = "SELECT * FROM public. phones_and_e_mails_data
            //             ORDER BY  department ASC, surname ASC, _name ASC ;";
            $sql = "SELECT public.phones_and_e_mails_data.*, public.departments.*,
                                public.phones_and_e_mails_data._name AS phones_and_e_mails_data_name,
                                public.departments._name AS dep_name,
								public.phones_and_e_mails_data.id AS user_id
                    FROM public. phones_and_e_mails_data
                    LEFT JOIN public.departments
                    ON phones_and_e_mails_data.department = departments.id
                    -- GROUP BY departments.id
                    ORDER BY    phones_and_e_mails_data.department ASC,
                                phones_and_e_mails_data.filial ASC,
                                phones_and_e_mails_data.surname ASC,
                                phones_and_e_mails_data._name ASC
                    ;";
            $data = getData($sql);
            $arr_len = count($data);
            // запрос с таблицы Departments
            $sql1 = "SELECT * FROM public.departments ORDER BY  departments._name ASC;";
            $data1 = getData($sql1);
            $arr_len1 = count($data1);
            // print_r ($data);
            // echo('<br/>');
            // echo('ar_len = '.$arr_len);
            // echo('<br/>');
            // echo('<br/>');
            // SELECT * FROM public. phones_and_e_mails_data  ORDER BY  department ASC ;
            // SELECT * FROM public. phones_and_e_mails_data  ORDER BY  department surname _name ASC ;
    ?>
<!-- ###################################################################################################### -->
<!-- ########################################################################################################     -->
        <div class="jumbotron jum2" style="background-color: rgba(29,78,124,.7);height:110vh">
            <!-- панель навигации -->
            <div class=" navbar">
            <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php" style="color: rgb(235, 239, 239);"> <h3>Phone Book <i class="far fa-address-book"></i></h3></a>
                    <!-- <a class="active" href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">Home</a> -->
                    <!-- ########################################################### -->
                    <!-- Добавочное меню администратора -->

                    <?php
                        if (isset($_SESSION['username'])){
                            // echo $access_rights;
                            // echo strcmp($access_rights, 'Admin');
                            if (strcmp($access_rights, 'Admin')==3){?>
                                <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/auth/register.php" style="color: rgb(235, 239, 239);">Регистрация пользователей</a>
                                <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/nav_site_map.php" style="color: rgb(235, 239, 239);">Карта сайта</a>
                    <?php
                    }}
                    ?>
                    <!--  -----Добавочное меню администратора -->
                    <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/addNewContact.php" style="color: rgb(235, 239, 239);">Добавление контакта</a>
            </div>
            <!-- панель навигации -->

           <?php if($result = pg_query($conn, $sql)){
                ?><h1 style="color: rgb(235, 239, 239);"><center>Телефонная книга</center></h1><?php
                }
                else{
                    ?><h1 style="color: red;"><center>Запрос не удался</center></h1><?php
                    echo "Error.";
                }
                ?>


              <div class="container-fluid">
                <div class="row flex-xl-nowrap">
                    <!-- Левая часть экрана #######################################################################-->
                    <div class="col-12 col-md-3 col-xl-2 bd-sidebar" style="overflow: auto; width: wrap-content; height:70vh;"><br>
                    <!-- <div class="col-12 col-md-3 col-xl-2 bd-sidebar navbar-nav"><br> -->
                    <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button> -->
                    <!-- </form> -->
                    <!-- <form>
                    <form>
                            <input class="place_for_search" type="text" id="text-to-find" value="" placeholder="Search" autofocus>
                            <input class="button_for_turn_back" type="button" onclick="javascript: FindOnPage('text-to-find',false); return false;" value=" " title="Отменить поиск">
                            <input class="button_for_search" type="submit" onclick="javascript: FindOnPage('text-to-find',true); return false;" value=" " title="Начать поиск">
                    </form>
                    </form> -->

                        <b>Выбор подразделения:</b>
                        <br>
                        <a class="bd-toc-link" href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">
                                        В начало</a><br>

                        <input type='text' class="form-control mb-3 mt-3" placeholder="Поиск подразделения" id='podrazdelenie'>
                                <?php
                                       for ($i = 0; $i < $arr_len1; $i++) {
                                        $count=1;
                                        ?>
                                        <div class="podrazdelenie">
                                            <a href="#t<?=$data1[$i]['id']?>" style="padding-bottom: 15px"><?=$data1[$i]['_name'];?></a>

                                       </div>

                                        <?php
                                       }
                                ?>

                        <nav class="collapse bd-links" id="bd-docs-nav">
                              <a class="bd-toc-link" href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">
                                             nav class
                                            </a>
                                            <br>
                                            ТЕст
                                            <a class="bd-toc-link" href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">
                                        Getting started
                                            </a>
                                            <br>
                                            ТЕст
                                            <a class="bd-toc-link" href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">
                                        Getting started
                                            </a>
                                            <br>
                                            ТЕст

                            <div class="bd-toc-item">
                                 <a class="bd-toc-link" href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">
                                        Getting started
                                            </a>

                            </div>
                        </nav>

                    <!-- Левая часть экрана конец ######################################################################3-->
                    </div>







                    <!-- Основная часть экрана ##########################################################-->

                    <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" style="overflow: auto; width: wrap-content; height:70vh;"role="main">

            <!-- <p class="my_box text-center jumbotron jum2">  -->
            <?php
                // echo("<br/>");
                $id_department=$data[0]['id'];
                // echo("<br/>");
                // echo('id_department = '.$id_department);
                $count=1;
                // echo("<br/>");
                ?> <!-- блок имя подразделения -->



<span class="bl1" ctyle="color: black;">Для поиска контакта нажмите Ctrl + F </span> 
<!-- <input type='text' class="form-control mb-3 mt-3" placeholder="Поиск контакта" id='contacts'> -->



<!-- <script>
function tableSearch() {
    var phrase = document.getElementById('search-text');
    var table = document.getElementById('info-table');
    var table1 = document.getElementById('info-table1');
    var regPhrase = new RegExp(phrase.value, 'i');
    var flag = false;
    for (var i = 1; i < table.rows.length; i++) {
        flag = false;
        for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
            flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
            if (flag) break;
        }
                  for (var j = table1.rows[i].cells.length - 1; j >= 0; j--) {
                      flag = regPhrase.test(table1.rows[i].cells[j].innerHTML);
                      if (flag) break;
                  }
        if (flag) {
            table.rows[i].style.display = "";
            table1.rows[i].style.display = "";
        } else {
            table.rows[i].style.display = "none";
            table1.rows[i].style.display = "none";
        }

    }
}
</script> -->















<h2 id="t<?=$count?>"><?= $data[0]['_name']?></h2>
                                <?php
                $count = 2;
                $formcounter=1000;
                for ($i = 0; $i < $arr_len; $i++) {
                    // echo $i;
                    echo (' ');
                    if ($i<$arr_len-1){
                        if($id_department==$data[$i+1]['id']){
                             ?>
                             <!-- true; -->
                            <table class='tr_text' id="contacts-table" border="1">
                                <!--Это первый ряд таблицы:-->
                                <tr>
                                <td class='tr_text'>

                                <form action="redactorContacta.php" method="post" id="form<?=$formcounter?>">
                                <input type="hidden" name="sn" value="Фамилия: <?=$data[$i]['surname'].': Имя: '.$data[$i]['phones_and_e_mails_data_name']
                                            .': Отчество: '.$data[$i]['patronymic'].': id: '.$data[$i]['id'].': отдел: '.$data[$i]['department'].': tel: '.$data[$i]['telephone'].': mail: '.$data[$i]['mail']
                                            .': job_title: '.$data[$i]['job_title'].': тел_раб: '.$data[$i]['tel_rab'].': kor_nomer: '.$data[$i]['kor_nomer'].': worker: '.$data[$i]['worker']
                                            .': dep_name: '.$data[$i]['dep_name'].': user_id: '.$data[$i]['user_id'].': filial: '.$data[$i]['filial']
                                            ?>" id="sn"/>
                                <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/redactorContacta.php" id="form_submit<?=$formcounter?>"><b><?=$data[$i]['surname'].' '.$data[$i]['phones_and_e_mails_data_name'].' '
                                            .$data[$i]['patronymic']?></b></a>
                                </form>
                                 <script>
                                        window.addEventListener("load", function() {
                                        document.getElementById('form_submit<?=$formcounter?>').onclick = function (e) {
                                            e.preventDefault();
                                            document.getElementById('form<?=$formcounter?>').submit();
                                        };
                                        });
                                 </script>
                                 <?php $formcounter=$formcounter+1;?>



                                           <?= $data[$i]['job_title']?>
                                           <br>
                                           <?= $data[$i]['filial']?></td>
                                <td class='tr_text' style="width: 260px">tel.mob: <?= $data[$i]['telephone']?>
                                                    <br> tel.rab: <?= $data[$i]['tel_rab']?>
                                                    <br> вн.номер: <?= $data[$i]['kor_nomer']?>
                                                    <br> e-mail: <?= $data[$i]['mail']?></td>
                                </tr>
                                <!--Это второй ряд таблицы:-->
                                <!-- <tr>
                                <td class='tr_text'><?= $data[$i]['job_title']?>

                                <td class='tr_text'>
                                                e-mail: <?= $data[$i]['mail']?></td>
                                </tr> -->
                                <!--Это третий ряд таблицы:-->
                                <!-- <tr>
                                <td class='tr_text'></td>
                                <td class='tr_text'><?= $i?></td>
                                </tr> -->
                                </table>

                                <?php
                                // echo($id_department.'    ');
                                // echo($data[$i+1]['id'].'   ');
                                // // $id_department=$data[$i+1]['id'];
                                // echo($id_department.'   ');
                                // echo('выполненно');




                         } else {?>
                                <!-- false -->
                                <table class='tr_text' id="contacts-table" border="1">
                                <!--Это первый ряд таблицы:-->
                                <tr>
                                <td class='tr_text'>

                                <form action="redactorContacta.php" method="post" id="form<?=$formcounter?>">
                                <input type="hidden" name="sn" value="Фамилия: <?=$data[$i]['surname'].': Имя: '.$data[$i]['phones_and_e_mails_data_name']
                                            .': Отчество: '.$data[$i]['patronymic'].': id: '.$data[$i]['id'].': отдел: '.$data[$i]['department'].': tel: '.$data[$i]['telephone'].': mail: '.$data[$i]['mail']
                                            .': job_title: '.$data[$i]['job_title'].': тел_раб: '.$data[$i]['tel_rab'].': kor_nomer: '.$data[$i]['kor_nomer'].': worker: '.$data[$i]['worker']
                                            .': dep_name: '.$data[$i]['dep_name'].': user_id: '.$data[$i]['user_id'].': filial: '.$data[$i]['filial']
                                            ?>" id="sn"/>
                                <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/redactorContacta.php" id="form_submit<?=$formcounter?>"><b><?=$data[$i]['surname'].' '.$data[$i]['phones_and_e_mails_data_name'].' '
                                            .$data[$i]['patronymic']?></b></a>
                                </form>

                                 <script>
                                        window.addEventListener("load", function() {
                                        document.getElementById('form_submit<?=$formcounter?>').onclick = function (e) {
                                            e.preventDefault();
                                            document.getElementById('form<?=$formcounter?>').submit();
                                        };
                                        });
                                 </script>
                                 <?php $formcounter=$formcounter+1;?>



                                            <?= $data[$i]['job_title']?>
                                            <br>
                                           <?= $data[$i]['filial']?></td>
                                <td class='tr_text'>tel.mob: <?= $data[$i]['telephone']?>
                                                    <br> tel.rab: <?= $data[$i]['tel_rab']?>
                                                    <br> вн.номер: <?= $data[$i]['kor_nomer']?>
                                                    <br> e-mail: <?= $data[$i]['mail']?></td>
                                </tr>
                                </table>
                                <?php
                                $id_department=$data[$i+1]['id'];
                                ?> <!-- блок имя подразделения -->
                                    Подразделение : <h2 id="t<?=$data[$i+1]['id']?>"><?= $data[$i+1]['_name']?></h2>
                                <?php
                                $count++ ;
                            }
                        }else{
                            ?>
                            <!-- последняя строка -->
                                <table class='tr_text' id="contacts-table" border="1">
                                <!--Это первый ряд таблицы:-->
                                <tr>
                                <td class='tr_text'>

                                <form action="redactorContacta.php" method="post" id="form<?=$formcounter?>">
                                <input type="hidden" name="sn" value="Фамилия: <?=$data[$i]['surname'].': Имя: '.$data[$i]['phones_and_e_mails_data_name']
                                            .': Отчество: '.$data[$i]['patronymic'].': id: '.$data[$i]['id'].': отдел: '.$data[$i]['department'].': tel: '.$data[$i]['telephone'].': mail: '.$data[$i]['mail']
                                            .': job_title: '.$data[$i]['job_title'].': тел_раб: '.$data[$i]['tel_rab'].': kor_nomer: '.$data[$i]['kor_nomer'].': worker: '.$data[$i]['worker']
                                            .': dep_name: '.$data[$i]['dep_name'].': user_id: '.$data[$i]['user_id'].': filials: '.$data[$i]['filial']
                                            ?>" id="sn"/>
                                <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/redactorContacta.php" id="form_submit<?=$formcounter?>"><b><?=$data[$i]['surname'].' '.$data[$i]['phones_and_e_mails_data_name'].' '
                                            .$data[$i]['patronymic']?></b></a>
                                </form>

                                 <script>
                                        window.addEventListener("load", function() {
                                        document.getElementById('form_submit<?=$formcounter?>').onclick = function (e) {
                                            e.preventDefault();
                                            document.getElementById('form<?=$formcounter?>').submit();
                                        };
                                        });
                                 </script>
                                 <?php $formcounter=$formcounter+1;?>



                                            <?= $data[$i]['job_title']?>
                                            <br>
                                           <?= $data[$i]['filial']?></td>
                                <td class='tr_text'>tel.mob: <?= $data[$i]['telephone']?>
                                                    <br> tel.rab: <?= $data[$i]['tel_rab']?>
                                                    <br> вн.номер: <?= $data[$i]['kor_nomer']?>
                                                    <br> e-mail: <?= $data[$i]['mail']?></td>
                                </tr>

                                </tr>
                                </table>






                                <?php
                        }
                }


            ?>

                - - - - - - - - - -
            <!-- </p> -->


                </main>
            </div>
        </div>









        </div>









    <footer class="text-center">@ Санаторий Альфа-Радон</footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/live_search_podrazdelenie.js"></script>
    <!-- <script src="js/live_search_table.js"></script> -->

    <!-- <script src="/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="/docs/4.0/assets/js/docs.min.js"></script> -->



    <script>
    window.addEventListener("load", function() {
    document.getElementById('form_submit').onclick = function (e) {
        e.preventDefault();
        document.getElementById('form1').submit();
    };
    });
    </script>



    </body>

</html>
