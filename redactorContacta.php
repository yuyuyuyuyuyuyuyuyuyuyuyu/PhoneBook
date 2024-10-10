<html>
    <head>

    <link rel="icon" href="images/cropped-telegram_alfa-radon_logo-1-32x32.png">
        <title>🕾 Изменить контакт</title>
        <!-- <link rel="stylesheet" href="css/my.min.css"/> -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/all.min.css"/>
        <link rel="stylesheet" href="css/index_style.css"/>
        <script src="js/imask.js"></script>
    </head>
    
    <body>
    <?php
    session_start();
    require_once 'connect.php';
    if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $access_rights = $_SESSION['access_rights'];
    echo ("<p align='right'> Пользователь: <b>".$username. "</b> Права доступа: ".$access_rights." ");
    ?>
    
        <a href='http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/auth/logout.php'>logout</a> 
    <br><br></p>
    <?
           
           if (strcmp($access_rights, 'Admin')||strcmp($access_rights, 'Redactor')){
    $testdata = !empty($_POST['sn']) ? $_POST['sn'] : '';
    // echo($testdata);
    $testdata_array = explode (': ', $testdata);
    
    // print_r($testdata_array); 
    
    // print($testdata_array[1]);
?> 
<!-- - редактирование контакта -->





        <div class="jumbotron jum">
            <!-- панель навигации -->
            <div class=" navbar">
            <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php" style="color: rgb(235, 239, 239);"> <h3 style="color: rgb(235, 239, 239);">Phone Book <i class="far fa-address-book"></i></h3></a>

            </div>
            <!-- панель навигации -->
            <div>
                
                <div class="col-lg-4 inp text-center">
                
                <!-- <input onkeyup="searchFunction()" id="myInput" class="form-control mt-2" placeholder="search">
                <span class="icon text-primary"><i class="fas fa-search"></i></span> -->
                
                <h5 class="mt-2">Редактиование контакта</h5>
                <center>
                <form action="redactorContactaAdded.php" autocomplete="off" method="post">
                <!-- <label> -->


                <select name="filial" value="filial" class="form-control" placeholder="filial" id="filial">
                        
                        <option value="<?php echo $testdata_array[27]?>"><? echo $testdata_array[27]?></option>
                        <option value="Torvlad">TORVLAD</option>
                        <option value="Alfa-Radon">Alfa-Radon</option>
                        
                        <!-- <option value="Старушка шапокляк">Старушка шапокляк</option>  -->
                     </select>


                    <select name="userDepartment1" value="Общий отдел" class="form-control mb-3 mt-3" placeholder="Отдел" id="userDepartment1">
                        <?php
                        
                        // $sql = "SELECT * FROM public.departmens
                        //             ORDER BY name_department DESC LIMIT 100 ;";
                        $sql = "SELECT * FROM public.departments
                                                          ORDER BY _name ASC ;" ;
                        $data = getData($sql);

                
                        ?><option value="<?php echo $testdata_array[9]?>"><? echo $testdata_array[23]?></option><?php
                    
                        foreach ($data as $value){
                            // $value_to_string = var_dump($value);
                            // echo('VVVVVVVVVVVVVVVVVVVVVVVVVVVVVvv');
                            // echo('<br> value to string : '.$value_to_string);
                            // echo('Value To String: ');
                            // echo $value_to_string;  echo('<br/>');

                            ?><option value="<?php echo implode(' ',$value);?>"><? echo $value['_name']?></option><?php  
                        }    
                            ?>
                        <!-- <option value="Чебурашка">Чебурашка</option>
                        <option value="Крокодил">Крокодил</option>
                        <option value="Старушка шапокляк">Старушка шапокляк</option> -->

                            </select> 
                    <!-- <input type="userDepartment" name="userDepartment" value="Общий отдел" class="form-control mb-3 mt-3" placeholder="Отдел" id="userDepartment"> -->
                    <input type="userSurname" required name="userSurname" value="<?=$testdata_array[1]?>" class="form-control mb-3 mt-3" placeholder="Имя" id="userSurname">
                    <input type="userName" required name="userName" value="<?=$testdata_array[3]?>" class="form-control mb-3 mt-3" placeholder="Фамилию" id="userName">
                    <input type="userPatronymic" required name="userPatronymic" value="<?=$testdata_array[5]?>" class="form-control mb-3 mt-3" placeholder="Отчество" id="userPatronymic">
                    <!-- </label> -->
                    <div style="margin-bottom: .1rem; justify-content: flex-start; text-align: left; ">🕾 Рабочий телефон:</div>
                    <input type="userWorkPhone" name="userWorkPhone" value="<?=$testdata_array[17]?>"class="form-control mb-3" placeholder="Телефон" id="userWorkPhone">
                        <script>
                            const element = document.getElementById('userWorkPhone');
                            const maskOptions = {
                            mask: '+{375}(00) 00 0-00-00',
                            lazy: false
                            };
                            const mask = IMask(element, maskOptions);
                        </script>
                    <input type="userShortNumber" name="userShortNumber" value="<?=$testdata_array[19]?>"class="form-control mb-3" placeholder="Телефон" id="userShortNumber">
                    <div style="margin-bottom: .1rem; justify-content: flex-start; text-align: left; ">🖁 Мобильный телефон:</div>
                    <input type="userWorkMobilePhone" name="userWorkMobilePhone" value="<?=$testdata_array[11]?>"class="form-control mb-3" placeholder="Телефон" id="userWorkMobilePhone">
                        <script>
                            const element1 = document.getElementById('userWorkMobilePhone');
                            const maskOptions1 = {
                            mask: '+{375}(00)000-00-00',
                            lazy: false
                            };
                            const mask1 = IMask(element1, maskOptions1);
                        </script>
                    <!-- <input type="userPersonalMobilePhone" name="userPersonalMobilePhone" value="телефон"class="form-control mb-3" placeholder="Телефон" id="userPersonalMobilePhone"> -->
                    <?
                    $trimmed_email = trim($testdata_array[13]);
                    ?>
                    <input type="email" name="userEmail" value="<?=$trimmed_email?>" class="form-control mb-3" placeholder="E-mail" id="userEmail">
                    <input type="job_title" required name="job_title" value="<?=$testdata_array[15]?>" class="form-control mb-3" placeholder="job_title" id="job_title">
                    <!-- <div id="mailAlert" class="alert alert-danger text-justify p-2 ">Please add a valid e-mail</div> -->
                    <input type="hidden" name="user_id" value="<?=$testdata_array[25]?>" class="form-control mb-3" placeholder="user_id" id="user_id">
                    <input type="submit" value="Записать" class="btn btn-info w-100 btn1" name="write">
                    
                    
                    <?php  
                        if (isset($_SESSION['username'])){
                            // echo $access_rights;
                            //echo strcmp($access_rights, 'Admin');
                            if (strcmp($access_rights, 'Admin')==3){?>
                                <input type="submit" value="Удалить контакт" class="btn btn-info w-100 btn1" name="delete">
                    <?php
                    }}
                    ?>

                    
                    
                    
                    <input type="reset" value="Сброс изменений" class="btn btn-info w-100 btn1">
                    
                    <button type="button" onclick="window.location.href='index.php'" class="btn btn-info w-100 btn1">Вернуться в телефонную книгу</button> 
                    <!-- <button onclick="addContact()" class="btn btn-info w-100 btn1">Add</button> -->
                </form>
                </center>
    
                    <!-- 

    <br>
    <label>
        Пароль <input type="password" name="password">
    </label>
    <br>
    <input type="submit" value="Войти">
</form> -->
                    
                <!-- </div> -->
 
        <!-- <div class="col-lg-8">
                
                <table id="myTable" class="table text-justify table-striped">
            
                <thead class="tableh1">
                <th class="">Name</th>
                <th class="">Phone</th>
                <th class="">E-mail</th>
                <th class="col-1"></th>
                <th class="col-1"></th>    
                </thead>
                
                <tbody id="tableBody">
                    <tr id="phoneData">
                        <td id="userName">test1</td>
                        <td id="userPhone">+375292153519</td>
                        <td id="userEmail">omelyusik@bk.ru</td>
                        <td><a onclick="deleteContact('afddf')" class="text-danger"><i class="fas fa-minus-circle"></i></a></td>
                        <td><a href="#" class="text-white"><i class="fas fa-envelope"></i></a></td>
                    </tr>
                    <tr>
                        <td id="userName">test2</td>
                        <td id="userPhone">+375292153519</td>
                        <td id="userEmail">omelyusik@bk.ru</td>
                        <td><a onclick="deleteContact('afddf')" class="text-danger"><i class="fas fa-minus-circle"></i></a></td>
                        <td><a href="#" class="text-white"><i class="fas fa-envelope"></i></a></td>
                    </tr>
                
                
                
                </tbody> 
            
                </table>

                
        </div> -->
                
            
            
            <!-- </div>     -->
        </div>
        
        
        
        <footer class="text-center">@ Санаторий "Альфа-Радон"</footer>
        
    <!-- <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
    <!-- <script src="js/addNewContact.js"></script> -->
           <? 
        }


  } else{
    
    ?>
    
        <a href='http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/auth/login.php'>Авторизация</a>
    <br>

    <div class="jumbotron jum">
            <!-- панель навигации -->
            <div class=" navbar">
            <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php" style="color: rgb(235, 239, 239);"> <h3 style="color: rgb(235, 239, 239);">Phone Book <i class="far fa-address-book"></i></h3></a>

            </div>
            <!-- панель навигации -->
            <div>
                
                <div class="col-lg-4 inp text-center">
                
                <!-- <input onkeyup="searchFunction()" id="myInput" class="form-control mt-2" placeholder="search">
                <span class="icon text-primary"><i class="fas fa-search"></i></span> -->
                
                <h5 class="mt-2">Только пользователи с правами администратор 
                    или редактор могут вносить изменения в контакты</h5>
                    <center>
                <a href='http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/auth/login.php'><h3>Авторизация</h3></a>
                <br>
                <a href="http://<?=$domain?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php" style="color: rgb(235, 239, 239);"> <h3 style="color: rgb(235, 239, 239);">Phone Book <i class="far fa-address-book"></i></h3></a>

  </center>

  </div>
  </div>
  </div>
    
    
    
    
    
    <?
  }
?>


    

    </body>   
</html>













