<?
    session_start();
    if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $access_rights = $_SESSION['access_rights'];
    echo ("<p align='right'> Пользователь: <b>".$username. "</b> Права доступа: ".$access_rights." ");
    ?>
        <a href='http://192.168.1.9/pb1/PhoneBook-master-GOOD/PhoneBook-master/auth/logout.php'>logout</a> 
    <br></p>
    <?php
  } else{
    ?>
    
        <a href='http://192.168.1.9/pb1/PhoneBook-master-GOOD/PhoneBook-master/auth/login.php'>Авторизация</a>
    <br><?php
  }
?>

<?php
// Is the user using HTTPS?
$folder_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
// Complete the URL
$folder_url .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
// echo the URL
echo ('Адрес текущего каталога: <br>');
echo $folder_url;

echo ('<br>');
echo ('<br>');
echo ('<br>');

echo ('Доступные страницы: <br>');

$path = __DIR__;
//echo $path;
foreach (array_filter(glob($path.'/*'), 'is_file') as $file) {
    // echo $file.PHP_EOL;
    $pathParts = pathinfo($file);

    // echo('<br>');
    //print_r($pathParts['basename']);
    echo('<br>');
    $url = $folder_url.'/'.$pathParts['basename'];

    ?>
    <a href = '<?=$url?>' target='blank'><?=$pathParts['basename'] ?> </a>
    <?php
    // print($url);
}
echo('<br>');

$path = __DIR__.'/auth';

echo('<br>');
echo ('Страницы логирования и аутентификации: <br>');

foreach (array_filter(glob($path.'/*'), 'is_file') as $file) {
    // echo $file.PHP_EOL;
    $pathParts = pathinfo($file);

    // echo('<br>');
    // print_r($pathParts['basename']);
    echo('<br>');
    $url = $folder_url.'/auth/'.$pathParts['basename'];

    ?>
    <a href = '<?=$url?>' target='blank'><?=$pathParts['basename'] ?> </a>
    <?php
    // print($url);
}


?>


<br>
<br>
* connect.php - если все работает, то ничего не отображает
<br>
* addNewContactAdded.php, 
  redactorContactaAdded.php - работают только при переходе со страницы index.php, redactorContacta.php


