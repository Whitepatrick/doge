<?php 

     
    $username = "root"; 
    $password = "B0obs4dc"; 
    $host = "127.0.0.1"; 
    $dbname = "doge"; 

    // Telling MySQL I'd like to use utf8
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
     
    // Try connection to database 
    try 
    { 
        // Open connection using PDO library 
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options); 
    } 
    catch(PDOException $ex) 
    { 
        // If db connection fails. Remove $ex...()); before production 
        die("Failed to connect to the database: " . $ex->getMessage()); 
    } 
     
    // Allows for exception handling 
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     
    // allows db items to be accessed and indexed 
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
     
    // 'magic quote' handling 
    if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) 
    { 
        function undo_magic_quotes_gpc(&$array) 
        { 
            foreach($array as &$value) 
            { 
                if(is_array($value)) 
                { 
                    undo_magic_quotes_gpc($value); 
                } 
                else 
                { 
                    $value = stripslashes($value); 
                } 
            } 
        } 
     
        undo_magic_quotes_gpc($_POST); 
        undo_magic_quotes_gpc($_GET); 
        undo_magic_quotes_gpc($_COOKIE); 
    } 
     
    // establishes agreement with browser that utf8 will be used. 
    header('Content-Type: text/html; charset=utf-8'); 
     
    // begins session on server side
    session_start();
