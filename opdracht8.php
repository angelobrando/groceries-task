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
        <?php   session_start();
        $db = new SQLite3('boodschappen_opdracht7.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
        try {
            //var_dump($_POST['index']);
            if (isset($_GET['index'])) {
                $prop = $_GET['index']; 
                $db->exec('DELETE FROM "product" WHERE "idproduct"='.$prop.'');
            }            
            if (isset($_POST['submit'])) {
                $groceries = $_POST['groc'];
                $db->exec('INSERT INTO "product" ("omschrijving")VALUES("'.$groceries.'")');
            }
            

            $i = 0;
            $indo = 1;
            $db->exec('BEGIN');
            $item = $db->query('SELECT omschrijving FROM product');
            $nid = $db->query('SELECT idproduct FROM product');
            $db->exec('COMMIT');

                while ($row = $item->fetchArray()) {
                    $row1 = $nid->fetchArray();
                    echo "<a href=?index=$row1[$i]><li id=" .$row1[$i]. ">".$row[$i]."</li>";
                    $indo++;
                }
            
            
            
        } 
        catch(PDOException $e) {
            echo $e->getMessage();
        }
        
        
        ?>
    </ol>
    </body>
    </html>