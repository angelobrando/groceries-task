<?php
echo 'Current PHP version: ' . phpversion();
?>
<?php
    $file_db = new PDO('sqlite:boodschappen_opdracht5.db');
    $memory_db = new PDO('sqlite::memory:');
    try {    
        // ...SQLite stuff...
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    $db = null;
?>