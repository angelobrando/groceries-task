<html>
    <head>
        <title>Boodschappen</title>
    </head>
        <body>
            <h4>Groceries List</h4>
            <form action="" method="post">
                I am this person <select name="selectperson">
                <option value="Mevrouw van Dalen">van Dalen</option>
	            <option value="Meneer van Heren">van Heren</option>
	            <option value="President Obama">Obama</option>
                </select><br>
                The item I want to add. <input type="text"name="groc">
                <br>
                How much does this cost?
                <input type="text"name="bm" value="euros" style="width:50px">
                <input type="text"name="sm" value="centjes" style="width:50px">
                <br>
                <label for="start">Date of when you want this:</label>
                
                <input type="date" id="doi" name="doi"
                value="<?php $datos = $_POST['dol']; if($datos){echo $datos;} else{echo date('Y-m-d'); }?>"
                min="2018-01-01" max="2019-12-31"><br>
                <input type="submit" name="submit" value="Send"><p></p>

                <br>
                <label for="start">Date of the List:</label>
                <input type="date" id="dol" name="dol"
            value="<?php $datos = $_POST['dol']; if($datos){echo $datos;} else{echo date('Y-m-d'); }?>"
                min="2018-01-01" max="2019-12-31">
                

                <input type="submit" name="date" value="check it">
            </form> 
            <?php if ($_POST['dol']){
                            $datos = $_POST['dol'];
                        }
                        else {
                            $datos = date('Y-m-d');
                        } 
                        echo("Boodschappen van "); echo($datos) ?>
            <ol style="list-style-type:disc;">
                <?php   session_start();
                $db = new SQLite3('boodschappen_opdracht10.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
                try {

                    //var_dump($_POST['index']);
                    if (isset($_GET['index'])) {
                        $prop = $_GET['index']; 
                        $db->exec('DELETE FROM "product" WHERE "idproduct"='.$prop.'');
                    }            
                    if (isset($_POST['submit'])) {
                        $date = $_POST['doi'];
                        $groceries = $_POST['groc'];
                        $pri = $_POST['bm']; $ce =  $_POST['sm'];
                        $price = "$pri" . "," . "$ce";
                        //echo ($price);
                        $db->exec('BEGIN');
                        $db->exec('INSERT INTO "product" ("omschrijving", "date", "money") VALUES("'.$groceries.'","'.$date.'" ,"'.$price.'")');
                        $db->exec('COMMIT');
                    }
                    if (isset($_POST['submit'])) {
                        if ($_POST['dol']){
                            $datos = $_POST['dol'];
                        }
                        else {
                            $datos = date('Y-m-d');
                        }
                            $i = 0;
                        $indo = 1;
                        $db->exec('BEGIN');
                        $item = $db->query('SELECT omschrijving FROM product WHERE "date"="'.$datos.'"');
                        $nid = $db->query('SELECT idproduct FROM product WHERE "date"="'.$datos.'"');
                        $pric = $db->query('SELECT "money" FROM product WHERE "date"="'.$datos.'"');
                        $db->exec('COMMIT');

                        while ($row = $item->fetchArray()) {
                            $row1 = $nid->fetchArray();
                            echo "<a href=?index=$row1[$i]><li id=" .$row1[$i]. ">".$row[$i]. $price."</li>";
                            $indo++;
                        }
                    }
                    else{
                        if ($_POST['dol']){
                            $datos = $_POST['dol'];
                        }
                        else {
                            $datos = date('Y-m-d');
                        }

                        $i = 0;
                        $indo = 1;
                        $db->exec('BEGIN');
                        $item = $db->query('SELECT omschrijving FROM product WHERE "date"="'.$datos.'"');
                        $nid = $db->query('SELECT idproduct FROM product WHERE "date"="'.$datos.'"');
                        $pric = $db->query('SELECT "money" FROM product WHERE "date"="'.$datos.'"');

                        $db->exec('COMMIT');
                        while ($row = $item->fetchArray()) {
                            $row1 = $nid->fetchArray();
                            echo "<a href=?index=$row1[$i]><li id=" .$row1[$i]. ">".$row[$i]."</li>";
                            $indo++;
                    }}  
                } 
                catch(PDOException $e) {
                    echo $e->getMessage();
                }
                
                
                ?>
            </ol>
        </body>
    </html>