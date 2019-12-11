<html>
    <head>
        <?php 
            session_start();
            $i = 5; 
        ?>
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
            if (!empty($_POST['submit'])) {
                $_SESSION['boodschappen'][] = $_POST['groc'];
                foreach ($_SESSION['boodschappen'] as $boodschap) {
                    echo "<a href=?index=$i><li id=" .$i. ">".$boodschap."</li>";
                    $i++;
                }
            } else {
                $_SESSION['boodschappen'] = [];
            }
            if (!empty($_POST['index'])) {
                $prop = $_POST['index']; 
                unset($_SESSION['boodschappen'][$prop - 5]); 
            }
        ?>
    </ol>
    </body>
    </html>
