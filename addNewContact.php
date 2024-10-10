<html>
    <head>
        <link rel="icon" href="images/cropped-telegram_alfa-radon_logo-1-32x32.png">
        <title>🕾 Новый контакт</title>
        <!-- <link rel="stylesheet" href="css/my.min.css"/> -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/all.min.css"/>
        <link rel="stylesheet" href="css/index_style.css"/>
        <link rel="stylesheet" href="css/selectize.bootstrap3.min.css"/>

        <script src="js/imask.js"></script>
        
        

    </head>
    <?php
    require_once 'connect.php';
    ?>
    <body>
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
                
                <h5 class="mt-2">Добавление нового контакта</h5>
                <center>
                <form action="addNewContactAdded.php" autocomplete="off" method="post">
                <!-- <label> -->
                      <select name="filial" value="filial" class="form-control select-1" placeholder="Выбрать организацию или филиал" id="filial">
                        
                        <option value="">Select a state...</option>
                        <option value="Torvlad">TORVLAD</option>
                        <option value="Alfa-Radon">Alfa-Radon</option>
                        
                        <!-- <option value="Старушка шапокляк">Старушка шапокляк</option>  -->
                     </select>
                    <select name="userDepartment1" value="Общий отдел" class="form-control mb-3 mt-3" placeholder="Выбрать отдел" id="userDepartment1">
                        <option value="">Select a state...</option>
                        <?php
                       
                        // $sql = "SELECT * FROM public.departmens
                        //             ORDER BY name_department DESC LIMIT 100 ;";
                        $sql = "SELECT * FROM public.departments
                                                ORDER BY _name ASC ;" ;
                        $data = getData($sql);
                        foreach ($data as $value){
                            $value_to_string = var_dump($value);
                            echo('VVVVVVVVVVVVVVVVVVVVVVVVVVVVVvv');
                            echo('<br> value to string : '.$value_to_string);
                            echo('Value To String: ');
                            echo $value_to_string;  echo('<br/>');

                            ?><option value="<?php echo implode('  ',$value);?>"><? echo $value['_name']?></option><?php  
                        }    
                            ?>
                        <!-- <option value="Чебурашка">Чебурашка</option>
                        <option value="Крокодил">Крокодил</option>
                        <option value="Старушка шапокляк">Старушка шапокляк</option> -->

                            </select> 
                    <!-- <input type="userDepartment" name="userDepartment" value="Общий отдел" class="form-control mb-3 mt-3" placeholder="Отдел" id="userDepartment"> -->
                    <input type="userSurname" name="userSurname" class="form-control mb-3 mt-3" placeholder="Фамилия" id="userSurname">
                    <input type="userName" name="userName" class="form-control mb-3 mt-3" placeholder="Имя" id="userName">
                    <input type="userPatronymic" name="userPatronymic" class="form-control mb-3 mt-3" placeholder="Отчество" id="userPatronymic">
                    <!-- <input type="userPatronymic" name="userPatronymic" value="Тест Отчество" class="form-control mb-3 mt-3" placeholder="Отчество" id="userPatronymic"> -->
                    <!-- </label> -->
                    <div style="margin-bottom: .1rem; justify-content: flex-start; text-align: left; ">🕾 Рабочий телефон:</div>
                    <input type="text" name="userWorkPhone" class="form-control mb-3" placeholder="Рабочий телефон" id="userWorkPhone">
                    <script>
                        const element = document.getElementById('userWorkPhone');
                        const maskOptions = {
                        mask: '+{375} (00) 00 0-00-00',
                        lazy: false
                        };
                        const mask = IMask(element, maskOptions);
                    </script>
                    
                    <input type="userShortNumber" name="userShortNumber" class="form-control mb-3" placeholder="Короткий номер" id="userShortNumber">
                    </center>
                    <div style="margin-bottom: .1rem; justify-content: flex-start; text-align: left; ">🖁 Мобильный телефон:</div>
                    <center>
                    <input type="text" name="userWorkMobilePhone" class="form-control mb-3" placeholder="Мобильный телефон" id="userWorkMobilePhone">
                    <script>
                        const element1 = document.getElementById('userWorkMobilePhone');
                        const maskOptions1 = {
                        mask: '+{375} (00) 000-00-00',
                        lazy: false
                        };
                        const mask1 = IMask(element1, maskOptions1);
                    </script>
                    <!-- <input type="userPersonalMobilePhone" name="userPersonalMobilePhone" value="телефон"class="form-control mb-3" placeholder="Телефон" id="userPersonalMobilePhone"> -->

                    <input type="email" name="userEmail" class="form-control mb-3" placeholder="📧 E-mail (рабочий: *@alfaradon.by, *@torvlad.by)" id="userEmail">
                    <input type="job_title" name="job_title" class="form-control mb-3" placeholder="Должность" id="job_title">
                    <!-- <div id="mailAlert" class="alert alert-danger text-justify p-2 ">Please add a valid e-mail</div> -->

                    <input type="submit" value="Add" class="btn btn-info w-100 btn1">
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
        
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/selectize.min.js"></script>


    <script>
    $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
  </script>
    
    <!-- <script src="js/addNewContact.js"></script> -->


    
    </body>
    
</html>













