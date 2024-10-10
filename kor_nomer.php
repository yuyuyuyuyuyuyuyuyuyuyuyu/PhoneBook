<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        require_once 'domain.php';
    ?>

<div class="jumbotron jum2" style="background-color: rgba(29,78,124,.7);">
            <!-- панель навигации -->
            <div class=" navbar">
            <a href="http://<?=$domain1?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/index.php" style="color: rgb(213,213,213);"> <h3>Phone Book <i class="far fa-address-book"></i></h3></a>
            <!-- <a href="http://<?=$domain1?>/pb1/PhoneBook-master-GOOD/PhoneBook-master/addNewContact.php" style="color: rgb(235, 239, 239);">Добавление контакта</a> -->
            </div>

            <h1 style="color: rgb(213,213,213);"><center>Список коротких номеров</center></h1>


            <input style="background-color: rgb(225,225,225);"  class="form-control mb-3" id="search-text" onkeyup="tableSearch()" placeholder="Поиск" type="text">
<center>
<table class="tr_text" style="color: rgb(235,235,235);font-color: rgb(100,100,100);" id="info-table">
  <!-- <thead>
    <tr>
      <th class="border border-light px-4 py-2">Короткий номер</th>
      <th class="border border-white px-4 py-2">Подразделение</th>
    </tr>
  </thead> -->
  <tbody>
    <tr>
      <td class="px-5 py-2"> <b></b> </td>
    </tr>
    <tr>
      <td class="px-5 py-2"><b>000, 001</b> - Ресепшн (reception@alfaradon.by)</td>
    </tr>
    <tr>
      <td class="px-5 py-2"><b>002, 100</b> - Ресепшен (без предупреждения о записи)</td>
    </tr>
    <tr>
      <td class="px-5 py-2"><b>003</b> - Медпост (к.318) (med_post@alfaradon.by)</td>
    </tr>
    <tr>
      <td class="px-5 py-2"><b>004, 060</b> - Мед. ресепшен (med_rec@alfaradon.by)</td>
    </tr>
    <tr>
      <td class="px-5 py-2"><b>104, 160</b> - Мед. ресепшен (без предупреждения о записи)</td>
    </tr>
    <tr>
      <td class="px-5 py-2"><b>005</b> - Директор, Угляница Н.А</td>
    </tr>
    <tr>
      <td class="px-5 py-2"><b>007</b> - IT</td>
    </tr><tr>
      <td class="px-5 py-2"><b>008</b> - Бар</td>
    </tr><tr>
      <td class="px-5 py-2"><b>009</b> - Нач.сл. размещения Галеева Л.И.951</td>
    </tr><tr>
      <td class="px-5 py-2"><b>010</b> - Подводный душ-массаж (к.110)</td>
      <td class="px-5 py-2"></td>
    </tr><tr>
      <td class="px-5 py-2"><b>011</b> - Гинекологическое орошение (к.108)</td>
      <td class="px-5 py-2"></td>
    </tr><tr>
      <td class="px-5 py-2"><b>012 </b>- Ванны 1-5</td>
    </tr><tr>
      <td class="px-5 py-2"><b>013 </b>- Ванны 6-9</td>
    </tr><tr>
      <td class="px-5 py-2"><b>014 </b>- Физиотерапия (к.210)</td>
    </tr><tr>
      <td class="px-5 py-2"><b>015 </b>- Парафинолечение (к.214)</td>
    </tr><tr>
      <td class="px-5 py-2"><b>016 </b>- Салон красоты (к.217)</td>
    </tr><tr>
      <td class="px-5 py-2"><b>017 </b>- Пом-к рук. Юзихович  Ю.В (к.317)</td>
    </tr><tr>
      <td class="px-5 py-2"><b>018 </b>- Грязелечебница</td>
    </tr><tr>
      <td class="px-5 py-2"><b>019 </b>- СПА (к.116)</td>
    </tr>
    <tr>
      <td class="px-5 py-2"><b>020 </b>- Спелеотерапия (к.118)</td>
    </tr><tr>
      <td class="px-5 py-2"><b>021 </b>- СПА (к.104)</td>
    </tr><tr>
      <td class="px-5 py-2"><b>022 </b>- УЗИ (к.208) (uzi@alfaradon.by)</td>
    </tr><tr>
      <td class="px-5 py-2"><b>023 </b>- Гл. врач Васильева Е.В (к.317)</td>
    </tr><tr>
      <td class="px-5 py-2"><b>024 </b>- Массаж (к.225)</td>
    </tr><tr>
      <td class="px-5 py-2"><b>025 </b>- Охрана, нач.сл - Чалей А.А.</td>
    </tr><tr>
      <td class="px-5 py-2"><b>026 </b>- Терапевт (к.321-2)</td>
    </tr><tr>
      <td class="px-5 py-2"><b>027 </b>- Гинеколог (к.323)</td>
    </tr><tr>
      <td class="px-5 py-2"><b>028 </b>- Кухня (технолог Алена)</td>
    </tr><tr>
      <td class="px-5 py-2"><b>029 </b>- Зам гл. бухгалтера Горбач М.П.</td>
    </tr><tr>
      <td class="px-5 py-2"><b>030 </b>- Бухгалтер Герасимчик Е.П.</td>
    </tr><tr>
      <td class="px-5 py-2"><b>031 </b>- Ресторан, администратор  </td>
    </tr><tr>
</tr><tr>
      <td class="px-5 py-2"><b>--- </b>- Психолог (psyhologist@alfaradon.by)  </td>
    </tr><tr>

	

     <tr><td class="px-5 py-2">                 <b>032 </b>- Ст. горничная</td>
<tr><td class="px-5 py-2"><b>033 </b>- Лаборатория (к. 211) (lab@alfaradon.by)</td>
<tr><td class="px-5 py-2"><b>034 </b>- Невролог (к. 212-2)</td>
<tr><td class="px-5 py-2"><b>035 </b>- SPA-ресепшн </td>
<tr><td class="px-5 py-2"><b>036 </b>- Лобби-бар</td>
<tr><td class="px-5 py-2"><b>037 </b>- Ресторан, администратор</td>
<tr><td class="px-5 py-2"><b>038 </b>- Косметолог (к.316)</td>
<tr><td class="px-5 py-2"><b>039 </b>- Клуб Альфуша (к.335)</td>
<tr><td class="px-5 py-2"><b>040 </b>- Гл. медсестра Кулик Ж.Ф </td>
<tr><td class="px-5 py-2"><b>040 </b>- Spa-координатор Cакевич И.В (к.317)</td>
<tr><td class="px-5 py-2"><b>041 </b>- Терапевт (к.321-3)</td>
<tr><td class="px-5 py-2"><b>042 </b>- Ресепшен бэк-рум, Хрещанович В.В.</td>
<tr><td class="px-5 py-2"><b>043 </b>- Электросветолечение (к.216)</td>
<tr><td class="px-5 py-2"><b>044 </b>- Лазеротерапия (к.327)</td>
<tr><td class="px-5 py-2"><b>045 </b>- Ингаляции (к.314)</td>
<tr><td class="px-5 py-2"><b>046 </b>- Флоатинг (к.336)</td>
<tr><td class="px-5 py-2"><b>047 </b>- Стоматолог (к.218)</td>
<tr><td class="px-5 py-2"><b>048 </b>- Сухие углекислотные ванны (к.215)</td>
<tr><td class="px-5 py-2"><b>049 </b>- Аквазона</td>
<tr><td class="px-5 py-2"><b>052 </b>- Нач. сектора досуга (к.346)</td>
<tr><td class="px-5 py-2"><b>053 </b>- Охрана (служебный вход)</td>
<tr><td class="px-5 py-2"><b>054 </b>- Кухня гор. цех</td>
<tr><td class="px-5 py-2"><b>055 </b>- Банк</td>
<tr><td class="px-5 py-2"><b>056 </b>- Озонотерапия (к.326)</td>
<tr><td class="px-5 py-2"><b>057 </b>- Главный инженер, Бунто В.П.</td>
<tr><td class="px-5 py-2"><b>058 </b>- Гостевой дом</td>
<tr><td class="px-5 py-2"><b>059 </b>- Светлана Прораб</td>
<tr><td class="px-5 py-2"><b>061 </b>- Шеф Фоменко С.С</td>
<tr><td class="px-5 py-2"><b>062 </b>- Гинеколог (gynecologist@alfaradon.by)</td>
<tr><td class="px-5 py-2"><b>063 </b>- Инженер по охране труда</td>
<tr><td class="px-5 py-2"><b>064 </b>- Нач. службы питания</td>
<tr><td class="px-5 py-2"><b>069 </b>- Терапевт (к.321-1)</td>
<tr><td class="px-5 py-2"><b>070 </b>- Бухгалтерия</td>
<tr><td class="px-5 py-2"><b>342 </b>- Экзарта </td>
<tr><td class="px-5 py-2"><b>337,340, 339 </b>- СПА</td>

  </tbody>
</table>
</center>      
            

</div>



<footer class="text-center">@ Санаторий Альфа-Радон</footer>   





<script>
function tableSearch() {
    var phrase = document.getElementById('search-text');
    var table = document.getElementById('info-table');
    // var table1 = document.getElementById('info-table1');
    var regPhrase = new RegExp(phrase.value, 'i');
    var flag = false;
    for (var i = 1; i < table.rows.length; i++) {
        flag = false;
        for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
            flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
            if (flag) break;
        }
                //   for (var j = table1.rows[i].cells.length - 1; j >= 0; j--) {
                //       flag = regPhrase.test(table1.rows[i].cells[j].innerHTML);
                //       if (flag) break;
                //   }
        if (flag) {
            table.rows[i].style.display = "";
            // table1.rows[i].style.display = "";
        } else {
            table.rows[i].style.display = "none";
            // table1.rows[i].style.display = "none";
        }

    }
}
</script>


</body>
</html>