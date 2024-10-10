
<?

echo (__DIR__);
?>
<br>
<br>
<br>
<?
echo (__FILE__);



// protected function createSiteMap(){

//     $dom = new \domDocument('1.0','utf-8');
//     $dom->formatOutput = true;

//     $root = $dom->createElement('urlset');

//     $root -> setAttribute('xmlns','http://www.sitemaps.org/schemas/sitemap/0.9');
//     $root -> setAttribute('xmlns:xls','http://www.w3.org/2001/XMLSchema-instance');
//     ');

// }

?>
<br>
перем сервер
<br>
<?php
echo '<pre>';
    var_dump($_SERVER);
echo '</pre>';
?>
<br>
<?php

$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
echo $url;
?>
<br>


<?php

// Is the user using HTTPS?
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';

// Complete the URL
$url .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

// echo the URL
echo $url;

echo('<br>');

$pathParts = pathinfo($url);
echo('<br>');
print_r($pathParts);
echo('<br>');
echo('<br>');echo('<br>');echo('<br>');echo('<br>');

$url2 = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
echo $url2;
echo('<br>');   
$pathParts = pathinfo($url2);
echo('<br>');
print_r($pathParts);
echo('<br>');



?>


<br>

<?php
$path = __DIR__;
foreach (array_filter(glob($path.'/*'), 'is_file') as $file) {
    ?><br><?
    echo $file.PHP_EOL;
    $pathParts = pathinfo($file);

    echo('<br>');
print_r($pathParts['basename']);
echo('<br>');

    ?>
    <br>
    <br>
    <?
}
?>

