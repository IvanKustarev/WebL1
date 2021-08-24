<?php
    if(isset($_POST['R']) && isset($_POST['X']) && isset($_POST['Y'])){
        $start_time = time();
        $R = $_POST['R'];
        $X = $_POST['X'];
        $Y = $_POST['Y'];
        $into = false;

        if($X < 0 && $Y > 0){
            $into = false;
        }
        if($X >= 0 && $Y>=0){
            if(pow(pow($X,2)+pow($Y,2), 1/2) <= $R){
                $into = true;
            }else{
                $into = false;
            }
        }
        if($X >=0 && $Y <= 0){
//            y = R/4*x - R/2 - уравнение прямой в четвёртой полуплоскости (R/4*x - y - R/2 = 0)
            if($R/4*$X - $Y - $R/2 <= 0){
                $into = true;
            }else{
                $into = false;
            }
        }
        if($X <= 0 && $Y <= 0){
            if($X >= -$R/2 && $Y >= -$R){
                $into = true;
            }else{
                $into = false;
            }
        }

        if($into){
            echo "true";
        }else{
            echo "false";
        }
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
