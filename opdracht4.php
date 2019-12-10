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
    
    
    <?php session_start(); ?>
    <ol style="list-style-type:disc;">
        <li>aardappelen<img src="potato.png"></li>
        <li>aardbeien<img src="strawberry.png"></li>
        <li>3 pakken melk<img src="milk.png"></li>
        <li>yoghurt<img src="yoghurt.png"></li>
        <?php
        if (!empty($_POST['submit'])) {
            $_SESSION['boodschappen'][] = $_POST['groc'];
            foreach ($_SESSION['boodschappen'] as $boodschap) {
                echo "<li>".$boodschap."</li>";
            }
        } else {
            $_SESSION['boodschappen'] = [];
        }
        ?>
    </ol>
    </body>
    </html>
