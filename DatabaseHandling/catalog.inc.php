<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    try{
        require_once "databaseConnect.inc.php";

        
    } catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
}else{
    header("Location: ../index.php");
}
