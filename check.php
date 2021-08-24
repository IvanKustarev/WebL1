<?php
    if(isset($_POST['R']) && isset($_POST['X']) && isset($_POST['Y'])){
        $R = $_POST['R'];
        $X = $_POST['X'];
        $Y = $_POST['Y'];
        $into = false;

        if($X < 0 && $Y > 0){
            $into = false;
            echo "$into";
        }

//        <form action="check.php" method="post">
//        <input type="text" name="R" tabindex="1" placeholder="Параметр R">
//        <input type="text" name="X" tabindex="2" placeholder="Параметр X">
//        <input type="text" name="Y" tabindex="3" placeholder="Параметр Y">
//        <button type="submit">Проверить точку</button>
//    </form>
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="index.html" method="post">
        <button type="submit">Ок</button>
    </form>
</body>
</html>
