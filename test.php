—тартуем
Startuem

<br><br><br>
<?php
session_start();

?>


<br><br><br>


<?php
// Is the user using HTTPS?
$folder_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
// Complete the URL
$folder_url .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
// echo the URL
echo ('јдрес текущего каталога: <br>');
echo $folder_url;
session_start();
echo ('<br>');
echo ('<br>');
echo ('<br>');

echo ('ƒоступные страницы: <br>');

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
echo ('—траницы логировани€ и аутентификации: <br>');

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


<br><br><br>

Sessiya starts