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

            // print_r ($data);
            // echo('<br/>');
            // echo('ar_len = '.$arr_len);
            // echo('<br/>');
            // echo('<br/>');
            // SELECT * FROM public. phones_and_e_mails_data  ORDER BY  department ASC ;
            // SELECT * FROM public. phones_and_e_mails_data  ORDER BY  department surname _name ASC ;
    ?>
        <div class="jumbotron jum" style="background-color: rgba(29,78,124,.7);">
            <!-- панель навигации -->
            <div class=" navbar">
            <a href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php" style="color: rgb(235, 239, 239);"> <h3>Phone Book <i class="far fa-address-book"></i></h3></a>
                    <!-- <a class="active" href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php">Home</a> -->
                    <a href="http://pb1/PhoneBook-master-GOOD/PhoneBook-master/addNewContact.php" style="color: rgb(235, 239, 239);">Добавление контакта</a>
            </div>
            <!-- панель навигации -->
           <? 
        //    echo ($query);
           ?>
           <?php if($result = pg_query($sql)){
                ?><h1 style="color: rgb(235, 239, 239);"><center>Телефонная книга</center></h1><?php      
                }
                else{
                    ?><h1 style="color: red;"><center>Запрос не удался</center></h1><?php
                    echo "Error.";
                }
                ?>         
            <!-- <p class="my_box text-center jumbotron jum2">  -->
            <?php
                // echo("<br/>");
                $id_department=$data[0]['id'];
                // echo("<br/>");
                // echo('id_department = '.$id_department);
                
                // echo("<br/>");
                ?> <!-- блок имя подразделения -->
                
                                  Подразделение: <h1><?= $data[0]['_name']?></h1>
                                    
                                    
                                <?  
                               

                for ($i = 0; $i < $arr_len; $i++) {
                    // echo $i;
                    echo (' ');
                    if ($i<$arr_len-1){
                        if($id_department==$data[$i+1]['id']){
                             ?>
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
                                <!--Это второй ряд таблицы:-->
                                <!-- <tr>
                                <td class='tr_text'><?= $data[$i]['job_title']?></td>
                                <td class='tr_text'>e-mail: <?= $data[$i]['mail']?></td>
                                </tr>
                                Это третий ряд таблицы:
                                <tr>
                                <td class='tr_text'></td>
                                <td class='tr_text'><?= $i?></td>
                                
                                  
                    
                                </tr> 
                                </table>-->

                                <?
                                $id_department=$data[$i+1]['id'];
                                ?> <!-- блок имя подразделения -->
                                    Подразделение: <h1><?= $data[$i+1]['_name']?></h1>
                                    
                                <?           
                            }
                        }else{
                            ?>
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
          
    
           
            </div>    
        </div>  
        
    <footer class="text-center">@ Санаторий Альфа-Радон</footer>
        
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  
    </body>
    
</html>













