<?php
    try {
        $connection = new PDO('sqlite:critics.sqlite');
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>

