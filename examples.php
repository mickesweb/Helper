 <?php
    // Including class file.
    include_once(dirname(__FILE__).'/functionclass.helper.php');

    // Exemple of cleanString function.
    $string = "Här vare gött!";
    $cleanString = Helper::cleanString($string);
    echo $cleanString;
    
    // Example of randomize function.
    $randomString = Helper::randomize(8, 'all');
    echo $randomString;
?>