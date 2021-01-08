<?php

    try {
        $pdo = new PDO("mysql:host=localhost;port=3306;dbname=zen", "root", "");
    }
    catch(PDOException $exep) {
        echo "Connection failed: " . $exep->getMessage();
    }

?>