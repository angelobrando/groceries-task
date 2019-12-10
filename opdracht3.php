<html>
<head>
<title>Boodschappen</title>
</head>
<body>
<?php
$boodschappen = ["aardappelen", "aardbeien", "3 pakken melk", "yoghurt"];
?> 
<ol style="list-style-type:disc;">
    <li><?php echo $boodschappen[0] ?><img src="potato.png"></li>
    <li><?php echo $boodschappen[1] ?><img src="strawberry.png"></li>
    <li><?php echo $boodschappen[2] ?><img src="milk.png"></li>
    <li><?php echo $boodschappen[3] ?><img src="yoghurt.png"></li>
</ol>
</body>
</html> 