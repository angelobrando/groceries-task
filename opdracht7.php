<html>
<head>
<title>Boodschappen</title>
</head>
    <body>
        <h4>Groceries List</h4>
        <form action="" method="post">
            <input type="text"name="groc">
            <input type="submit" name="submit" value="Send">
        </form> 
    <ol style="list-style-type:disc;">
        <?php      
        $db = new SQLite3('boodschappen_opdracht7.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
        try {
            if (!empty($_POST['submit'])) {
                $groceries = $_POST['groc'];
                $db->exec('BEGIN');
                $db->exec('INSERT INTO "product" ("omschrijving")VALUES("'.$groceries.'")');
                $db->exec('COMMIT');
                }
            $i = 0;
            $results = $db->query('SELECT omschrijving FROM product');
                while ($row = $results->fetchArray()) {
                    echo "<a href=?index=$i><li id=" .$i. ">".$row[$i]."</li>";
                }
        } 
        catch(PDOException $e) {
            echo $e->getMessage();
        }
        
        
        ?>
    </ol>
    </body>
    </html>