��������
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
echo ('����� �������� ��������: <br>');
echo $folder_url;
session_start();
echo ('<br>');
echo ('<br>');
echo ('<br>');

echo ('��������� ��������: <br>');

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
echo ('�������� ����������� � ��������������: <br>');

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
* connect.php - ���� ��� ��������, �� ������ �� ����������
<br>
* addNewContactAdded.php, 
  redactorContactaAdded.php - �������� ������ ��� �������� �� �������� index.php, redactorContacta.php


<br><br><br>

Sessiya starts