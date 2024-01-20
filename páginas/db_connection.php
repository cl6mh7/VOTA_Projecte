<?php 
    try {
        $hostname = "localhost";
        $dbname = "VOTE";  
        $username = "arnau";
        $pw = "P@ssw0rd1234";
        $pdo = new PDO ("mysql:host=$hostname;dbname=$dbname","$username","$pw");
    } catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        exit;
    }
?>