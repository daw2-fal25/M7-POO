<?php
require_once "config.php";

$result = $mysqli->query("SELECT * FROM USERS WHERE name LIKE '%a%'");




print_r($result);

$result2 = $result->fetch_all(MYSQLI_ASSOC);


print_r($result2);


foreach($result2 as $r){
    echo '<br/><br/>';
    echo $r['name'];
}

?>













