<?php
try{
$db=new PDO('mysql:host=localhost;dbname=restaurantdb;charset=utf8','root','');
//var_dump($db);
}
catch(Exception $e){
echo $e->getMessage();
}
?>