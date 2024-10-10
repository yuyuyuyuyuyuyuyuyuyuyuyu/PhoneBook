<html>
    <head>
        <!-- <link rel="stylesheet" href="css/my.min.css"/> -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/all.min.css"/>
        <link rel="stylesheet" href="css/index_style.css"/>
    </head>
    
    <body>

    <?php
            // Подключение БД
            require_once 'connect.php';
            // получаем ID юзера
            // $sql = "SELECT  * FROM public. phones_and_e_mails_data
            //               ORDER BY  id ASC ;";
            // $sql = "SELECT * FROM public. phones_and_e_mails_data  
            //             ORDER BY  department ASC, surname ASC, _name ASC ;";
            $sql = "SELECT public.phones_and_e_mails_data.*, public.departments.*, 
                                public.phones_and_e_mails_data._name AS phones_and_e_mails_data_name
                    FROM public. phones_and_e_mails_data 
                    LEFT JOIN public.departments 
                    ON phones_and_e_mails_data.department = departments.id 
                    -- GROUP BY departments.id 
                    ORDER BY  phones_and_e_mails_data.department ASC, 
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



        <div class="jumbotron jum" style="background-color: rgba(29,78,124,.7);">
            <!-- панель навигации -->
            <div class=" navbar">
            <a href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php" style="color: rgb(235, 239, 239);"> <h3>Phone Book <i class="far fa-address-book"></i></h3></a>
                    <!-- <a class="active" href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">Home</a> -->
                    <a href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/addNewContact.php" style="color: rgb(235, 239, 239);">Добавление контакта</a>
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
                    <div class="col-12 col-md-3 col-xl-2 bd-sidebar" style="overflow: auto; width: wrap-content; height:450px;"><br>
                    <!-- <div class="col-12 col-md-3 col-xl-2 bd-sidebar navbar-nav"><br> -->
                    <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
    
                        <a class="bd-toc-link" href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">
                                        Getting started </a><br>
                                <?php
                                       for ($i = 0; $i < $arr_len1; $i++) {   
                                        $count=1;
                                        ?>
                                            <a href="#t<?=$data1[$i]['id']?>"><?=$data1[$i]['_name'];?></a>
                                            
                                            <br>
                                        

                                        <?


                                       }
                                ?>


                                        

                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст

                        <nav class="collapse bd-links" id="bd-docs-nav">
                              <a class="bd-toc-link" href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">
                                             nav class
                                            </a>
                                            <br>
                                            ТЕст
                                            <a class="bd-toc-link" href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">
                                        Getting started
                                            </a>
                                            <br>
                                            ТЕст
                                            <a class="bd-toc-link" href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">
                                        Getting started
                                            </a>
                                            <br>
                                            ТЕст

                            <div class="bd-toc-item">
                                 <a class="bd-toc-link" href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">
                                        Getting started
                                            </a>
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                                            <br>
                                            ТЕст
                            </div>
                        </nav>
                                    
                    <!-- Левая часть экрана конец ######################################################################3-->
                    </div>

                   
                   
                   
                   
                   
                   
                    <!-- Основная часть экрана ##########################################################-->

                    <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" style="overflow: auto; width: wrap-content; height:450px;"role="main">   
                                    
            <!-- <p class="my_box text-center jumbotron jum2">  -->
            <?php
                // echo("<br/>");
                $id_department=$data[0]['id'];
                // echo("<br/>");
                // echo('id_department = '.$id_department);
                $count=1;
                // echo("<br/>");
                ?> <!-- блок имя подразделения -->

                                    
                
                                  Подразделение: <h2 id="t<?=$count?>"><?= $data[0]['_name']?></h2>
                                    
                                    
                                <?  
                $count = 2;
                for ($i = 0; $i < $arr_len; $i++) {
                    // echo $i;
                    echo (' ');
                    if ($i<$arr_len-1){
                        if($id_department==$data[$i+1]['id']){
                             ?>
                             <!-- true; -->
                            <table class='tr_text' border="1">
                                <!--Это первый ряд таблицы:-->
                                <tr>
                                <td class='tr_text'><b><?=$data[$i]['surname'].' '.$data[$i]['phones_and_e_mails_data_name'].' '
                                            .$data[$i]['patronymic']?></b>
                                            <br><?= $data[$i]['job_title']?></td>
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
                                
                                <?
                                // echo($id_department.'    ');
                                // echo($data[$i+1]['id'].'   ');
                                // // $id_department=$data[$i+1]['id'];
                                // echo($id_department.'   ');
                                // echo('выполненно');
                        
                                
                         

                         } else {?>
                                <!-- false -->
                                <table class='tr_text' border="1">
                                <!--Это первый ряд таблицы:-->
                                <tr>
                                <td class='tr_text'><b><?=$data[$i]['surname'].' '.$data[$i]['phones_and_e_mails_data_name'].' '
                                            .$data[$i]['patronymic']?></b>
                                            <br><?= $data[$i]['job_title']?></td>
                                <td class='tr_text'>tel.mob: <?= $data[$i]['telephone']?>
                                                    <br> tel.rab: <?= $data[$i]['tel_rab']?>
                                                    <br> вн.номер: <?= $data[$i]['kor_nomer']?>
                                                    <br> e-mail: <?= $data[$i]['mail']?></td>
                                </tr>
                                </table>
                                <?
                                $id_department=$data[$i+1]['id'];
                                ?> <!-- блок имя подразделения -->
                                    Подразделение: <h2 id="t<?=$data[$i+1]['id']?>"><?= $data[$i+1]['_name']?></h2> 
                                <?    
                                $count++ ;      
                            }
                        }else{
                            ?> 
                            <!-- последняя строка -->
                                <table class='tr_text' border="1">
                                <!--Это первый ряд таблицы:-->
                                <tr>
                                <td class='tr_text'><b><?=$data[$i]['surname'].' '.$data[$i]['phones_and_e_mails_data_name'].' '
                                            .$data[$i]['patronymic']?></b>
                                            <br><?= $data[$i]['job_title']?></td>
                                <td class='tr_text'>tel.mob: <?= $data[$i]['telephone']?>
                                                    <br> tel.rab: <?= $data[$i]['tel_rab']?>
                                                    <br> вн.номер: <?= $data[$i]['kor_nomer']?>
                                                    <br> e-mail: <?= $data[$i]['mail']?></td>
                                </tr>
                                
                                </tr>
                                </table>

                       

                    
                        
                        
                                <?  
                        }
                }
                
                // foreach ($data as $value){
                //     print_r($value);
                    
                //     if($id_department=$value['id']){
                //         
                //         <!-- блок имя подразделения -->
                //             <br> Подразделение: <?=$value['_name']<br>
                //         
                //     } else {
                //         continue;
                //     }
                   
                //     echo("<br/>");
                //     echo("<br/>");
                //     echo("<br/>");
                //     echo("<br/>");
                //     echo("<br/>");
                // }   
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

    <!-- <script src="/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="/docs/4.0/assets/js/docs.min.js"></script> -->
    
  
  
    </body>
    
</html>













