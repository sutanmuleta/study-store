<?php

//  database info 
$host = "localhost";
$dbname = "studystore";   
$username = "root";        
$password = "";            

//  connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) 
    {
    
    echo "Database connection failed: " . $e->getMessage();
    exit();
    }
