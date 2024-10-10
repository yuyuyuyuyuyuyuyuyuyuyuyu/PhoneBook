<?
$array =[
    'param1'=>'val1',
    'param2'=>'val2',
];

    echo(array_to_string($array));
    echo('<br>');
    echo('<br>');
    print($array);
    echo('<br>');
    echo('<br>');
    print_r($array);
    echo('<br>');
    echo('<br>');



    function array_to_string($array){
        ob_start();
        var_dump($array);
        return ob_get_clean();
    }
    ?>

   