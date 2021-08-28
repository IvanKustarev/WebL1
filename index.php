<?php
include "functions.php";

if (isset($_POST['R']) && isset($_POST['X']) && isset($_POST['Y'])) {
    $start_time = time();
    $dotInArea = checkDot();
//    $phpWorkingTime = $finishTime - $start_time;
}
?>
<!DOCTYPE html>
<html lang="en" style="background-color: #4D4D4D">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .headStyle {
            font-family: serif;
            color: #E61B43;
            font-size: xxx-large;
            font-weight: bold;
        }

        .centering {
            text-align: center;
            /*margin-left: auto;*/
            /*margin-right: auto;*/
            margin: auto;
        }

        #clock {
            color: #000;
            font-weight: bold;
            font-size: 30px;
        }

        .hoveredElement {
            /*color: indigo;*/
            /*border: solid;*/
            /*!*border-color: black;*!*/
            /*padding: 4px;*/

            border: 1px solid; /* Параметры границы */
            padding: 6px;
            background: #4D4D4D; /* Цвет фона */
            /*padding: 0px; !* Поля вокруг текста *!*/
            border-color: black;
        }

        .hoveredElement:hover, .hoveredElement:focus {
            /*color: #E61B43;*/
            border: 3px solid;
            cursor: pointer;
            border-color: #E61B43;
            padding: 4px;
        }

        .brd {
            /*border: 1px solid; !* Параметры границы *!*/
            background: #4D4D4D; /* Цвет фона */
            /*padding: 0px; !* Поля вокруг текста *!*/
            /*border-color: #4D4D4D;*/
            font-weight: bold;
            /*color: rgba(0, 0, 0, 0);*/
        }

        .brd:hover {
            /*border: 1px solid; !* Параметры границы *!*/
            /*background: #fc3; !* Цвет фона *!*/
            padding-left: 4px; /* Поля вокруг текста */
            padding-right: 4px;
            /*border-color: #E61B43;*/
            color: #E61B43;
            /*font-weight: bolder;*/
            /*color: rgba(0, 0, 0, 1);*/
        }

        .mainLine {
            /*border: solid;*/
            border-color: black;
        }

        .mainLine:hover {
            /*border: solid;*/
            border-color: #E61B43;
        }

        .invisible {
            visibility: hidden;

        /*    position: absolute;*/
        /*    top: -9999px;*/
        /*}*/

        .visible {
            visibility: visible;
            position: static;
        }

    </style>
</head>
<body>
<header id="header" class="headStyle centering">
    <div>Кустарев Иван Павлович P3115</div>
    <div>Вариант 15012</div>
    <hr id="mainLine" class="mainLine">
</header>
<main id="main" class="invisible">

    <form class="submitForm" onsubmit="return checkBeforeSubmit()" action="index.php" method="post">

        <table class="centering">
            <tr>
                <td>
                    <div id="clock"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <img src="image.png" alt="Problem with image loading!">
                    </div>
                </td>
            </tr>


            <tr>
                <td>
                    <?php
                    if (isset($dotInArea)) {
                    echo "<table id='requestAnswer' class='centering' border='1'>";
                        echo "<tr><td>Заданный X</td><td><span class='answer' id='X'>" . $_POST['X'] . "</span></td></tr>";
                        echo "<tr><td>Заданный Y</td><td><span class='answer' id='Y'>" . $_POST['Y'] . "</span></td></tr>";
                        echo "<tr><td>Заданный R</td><td><span class='answer' id='R'>" . $_POST['R'] . "</span></td></tr>";
                        echo "<tr><td>Попала</td><td><span class='answer' id='DotInArea'>" . $dotInArea . "</span></td></tr>";
                        echo "<tr><td>Время начала</td><td><span class='answer' id='StartTime'>" . $start_time . "</span></td></tr>";
                        echo "<tr><td>Время окончания</td><td><span class='answer' id='FinishTime'>" ./*. $finishTime*/time() . "</span></td></tr>";
                        echo "<tr><td>Время работы</td><td><span class='answer' id='PhpWorkingtime'>" . time()-$start_time . "</span></td></tr>";
                        echo "</table>";
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td>
                                Параметр R
                            </td>
                        </tr>
                        <tr>
                            <td class="centering">
                                <span class="brd">
                                    <input class="rRadio" type="radio" name="R" tabindex="1" placeholder="Параметр R"
                                           value="1">
                                    1
                                </span>
                                <span class="brd">
                                    <input class="rRadio" type="radio" name="R" tabindex="1" placeholder="Параметр R"
                                           value="1.5">
                                    1.5
                                </span>
                                <span class="brd">
                                    <input class="rRadio" type="radio" name="R" tabindex="1" placeholder="Параметр R"
                                           value="2">
                                    2
                                </span>
                                <span class="brd">
                                    <input class="rRadio" type="radio" name="R" tabindex="1" placeholder="Параметр R"
                                           value="2.5">
                                    2.5
                                </span>
                                <span class="brd">
                                    <input class="rRadio" type="radio" name="R" tabindex="1" placeholder="Параметр R"
                                           value="3">
                                    3
                                </span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td>
                                Параметр X
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="brd">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="-2">
                        -2
                    </span>
                                <span class="brd">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="-1.5">
                        -1.5
                    </span>
                                <span class="brd">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="-1">
                        -1
                    </span>
                                <span class="brd">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="-0.5">
                        -0.5
                    </span>
                                <span class="brd">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="0">
                        0
                    </span>
                                <span class="brd">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="0.5">
                        0.5
                    </span>
                                <span class="brd">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="1">
                        1
                    </span>
                                <span class="brd">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="1.5">
                        1.5
                    </span>
                                <span class="brd">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="2">
                        2
                    </span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td>
                                <span>Параметр X</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="yTextField hoveredElement" type="text" name="Y" tabindex="3"
                                       placeholder="Параметр Y">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <div>
                        <table width="100%">
                            <tr>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="submitButton hoveredElement" type="submit"
                                            style="width: 100%; height: 100%; background-color: #4D4D4D; font-family: Arial"><span style="font-weight: bold">Проверить точку</span>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <?php
            if (isset($_POST['savedRequests'])) {
                echo "<tr><td>";
                echo "<div> <table id='savedRequestsTable' border='1' class='centering'>";
                $savedRequests = $_POST['savedRequests'];
                $savedRequests = explode(";", $savedRequests);
                for ($i = 0; $i < count($savedRequests); $i++) {
                    $parameters = explode(",", $savedRequests[$i]);
                    echo "<tr class='request'>";
                    for ($j = 0; $j < count($parameters); $j++) {
                        echo "<td class='parameter'>$parameters[$j]</td>";
                    }
                    echo "</tr>";
                    echo "<br>";
                }
                echo "</table> </div>";
                echo "</tr></td>";
            }
            ?>
            <tr>
                <td>
                    <img src="duck.png" alt="Здесь должна быть уточка ВТ">
                </td>
            </tr>
        </table>
    </form>
</main>
<script src="js/script.js"></script>
</body>
</html>