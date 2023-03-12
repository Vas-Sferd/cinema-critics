<?php
$user = "root";
$pass = "";
    try {
        $connection = new PDO('mysql:host=127.0.0.1;dbname=screenshots', $user, $pass);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    try {
        $user_connection = new PDO('mysql:host=127.0.0.1;dbname=user_data', $user, $pass);
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
