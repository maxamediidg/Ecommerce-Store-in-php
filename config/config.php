<?php

// if(!isset($_SERVER['HTTP_REFERER'])){
//     //redirect them to the desired location
//     header('location: http://localhost/freshcery/index.php');
//     exit;
// }

try{
//host
define("HOST", "localhost");

//dbname
define("DBNAME", "freshcery");

//user
define("USER", "root");

//password
define("PASS", "");

$conn= new PDO("mysql:host=".HOST.";dbname=".DBNAME.";",USER, PASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// if($conn == true){
//     echo "Connected successfully";
// }else{
//     echo "Connection failed";
// }


}catch(PDOException $e){
    echo $e->getMessage();
}