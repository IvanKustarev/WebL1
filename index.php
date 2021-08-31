<?php
include "functions.php";

if (isset($_POST['R']) && isset($_POST['X']) && isset($_POST['Y'])) {
    $start_time = time();
    $dotInArea = checkDot();
//    $phpWorkingTime = $finishTime - $start_time;
}
?>
<!DOCTYPE html>
<html lang="en" <!--style="background-color: #4D4D4D"-->
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .headStyle {
            font-family: Serif;
            color: rgb(253, 253, 253);
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
            color: rgb(253, 253, 253);
            font-weight: bold;
            font-size: 30px;
        }

        #exceptionField{
            font-weight: normal;
            color: #E61B43;
        }

        .clickedElement {
            /*color: indigo;*/
            /*border: solid;*/
            /*!*border-color: black;*!*/
            /*padding: 4px;*/

            /*border: 1px solid; !* Параметры границы *!*/
            /*padding: 6px;*/
            /*font;*/
            color: black;
            background: #4D4D4D; /* Цвет фона */
            /*padding: 0px; !* Поля вокруг текста *!*/
            /*border-color: black;*/
        }

        .clickedElement:hover{
            color: #E61B43;
            /*border: 3px solid;*/
            cursor: pointer;
            /*border-color: #E61B43;*/
            padding: 4px;
        }

        .selectingAreas {
            border: 2px solid;
            border-color: black;
            background-color: #4D4D4D;
        }
        .selectingAreas:hover{
            cursor: pointer;
            border-color: #E61B43;

        }

        /*.brd {*/
        /*    !*border: 1px solid; !* Параметры границы *!*!*/
        /*    !*background: #4D4D4D; !* Цвет фона *!*!*/
        /*    !*padding: 0px; !* Поля вокруг текста *!*!*/
        /*    !*border-color: #4D4D4D;*!*/
        /*    font-weight: bold;*/
        /*    !*color: rgba(0, 0, 0, 0);*!*/
        /*}*/

        /*.brd:hover {*/
        /*    !*border: 1px solid; !* Параметры границы *!*!*/
        /*    !*background: #fc3; !* Цвет фона *!*!*/
        /*    padding-left: 4px; !* Поля вокруг текста *!*/
        /*    padding-right: 4px;*/
        /*    !*border-color: #E61B43;*!*/
        /*    color: #E61B43;*/
        /*    !*font-weight: bolder;*!*/
        /*    !*color: rgba(0, 0, 0, 1);*!*/
        /*}*/

        #requestAnswer { /*по идентификатору*/
            border: 1px solid;
            border-color: #E61B43;
        }

        .mainLine {
            border-color: black;
        }

        .mainLine:hover {
            border-color: #E61B43;
        }

        .invisible {
            visibility: hidden;
        }

        .visible {
            visibility: visible;
            position: static;
        }

        .common {
            background-color: rgb(76, 76, 76);
            font-weight: bold;
            color: lightgray;
        }

        .fillingLocation {
            width: 100%;
            height: 100%;
        }
        .savedRequestsTableBorder{
            border: 1px solid;
            border-color: black;
        }
        .simpleText {
            color: black;
        }
        .selectedText {
            color: #E61B43;
        }

    </style>
</head>
<body class="common">
<header id="header" class="headStyle centering">
    <div>Кустарев Иван Павлович P3215</div>
    <div>Вариант 15012</div>
    <hr id="mainLine" class="mainLine">
</header>
<main id="main" class="invisible">

    <form id="submitForm" onsubmit="return checkBeforeSubmit()" action="index.php" method="post">

        <table class="centering">
            <tr>
                <td>
                    <div id="clock">00:00:00</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div>
                        <img src="areas.png" alt="Problem with image loading!">
                    </div>
                </td>
            </tr>


            <tr>
                <td>
                    <?php
                    if (isset($dotInArea)) {
                        echo "<div>Результат:</div>";
                        echo "<table id='requestAnswer' class='centering'>";
                        echo "<tr><td>Заданный X:</td><td><span class='answer' id='X'>" . $_POST['X'] . "</span></td></tr>";
                        echo "<tr><td>Заданный Y:</td><td><span class='answer' id='Y'>" . $_POST['Y'] . "</span></td></tr>";
                        echo "<tr><td>Заданный R:</td><td><span class='answer' id='R'>" . $_POST['R'] . "</span></td></tr>";
                        echo "<tr><td>Попала:</td><td><span class='answer' id='DotInArea'>" . $dotInArea . "</span></td></tr>";
                        echo "<tr><td>Время начала:</td><td><span class='answer' id='StartTime'>" . $start_time . "</span></td></tr>";
                        echo "<tr><td>Время окончания:</td><td><span class='answer' id='FinishTime'>" ./*. $finishTime*/time() . "</span></td></tr>";
                        echo "<tr><td>Время работы:</td><td><span class='answer' id='PhpWorkingtime'>" . time()-$start_time . "</span></td></tr>";
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
                                <span id="rTitle">Параметр R</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="centering">
                                <span class="clickedElement">
                                    <input class="rRadio" type="radio" name="R" tabindex="1" placeholder="Параметр R"
                                           value="1">
                                    1
                                </span>
                                <span class="clickedElement">
                                    <input class="rRadio" type="radio" name="R" tabindex="1" placeholder="Параметр R"
                                           value="1.5">
                                    1.5
                                </span>
                                <span class="clickedElement">
                                    <input class="rRadio" type="radio" name="R" tabindex="1" placeholder="Параметр R"
                                           value="2">
                                    2
                                </span>
                                <span class="clickedElement">
                                    <input class="rRadio" type="radio" name="R" tabindex="1" placeholder="Параметр R"
                                           value="2.5">
                                    2.5
                                </span>
                                <span class="clickedElement">
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
                                <span id="xTitle">Параметр X</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="clickedElement">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="-2">
                        -2
                    </span>
                                <span class="clickedElement">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="-1.5">
                        -1.5
                    </span>
                                <span class="clickedElement">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="-1">
                        -1
                    </span>
                                <span class="clickedElement">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="-0.5">
                        -0.5
                    </span>
                                <span class="clickedElement">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="0">
                        0
                    </span>
                                <span class="clickedElement">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="0.5">
                        0.5
                    </span>
                                <span class="clickedElement">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="1">
                        1
                    </span>
                                <span class="clickedElement">
                        <input class="xCheckbox" type="checkbox" name="X" tabindex="2" placeholder="Параметр X"
                               value="1.5">
                        1.5
                    </span>
                                <span class="clickedElement">
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
                    <table class="fillingLocation">
                        <tr>
                            <td>
                                <span id="yTitle">Параметр Y</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input id="yTextField" class="selectingAreas" type="text" name="Y" tabindex="3"
                                       placeholder="Параметр Y">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <div>
                        <table class="fillingLocation">
                            <tr>
                                <td>
                                    <span id="exceptionField"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button id="submitButton" class="selectingAreas" type="submit"
                                            ><span class="common">Проверить точку</span>
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <br><br><br>
                </td>
            </tr>
            <?php
            if (isset($_POST['savedRequests'])) {
                echo "<tr><td><span>Предыдущие результаты:</span></td></tr>";
                echo "<tr><td>";
                echo "<table id='savedRequestsTable' class='centering fillingLocation savedRequestsTableBorder'>";
                echo "<tr><td class='savedRequestsTableBorder'>X</td><td class='savedRequestsTableBorder'>Y</td><td class='savedRequestsTableBorder'>R</td><td class='savedRequestsTableBorder'>Попала</td><td class='savedRequestsTableBorder'>Время начала</td><td class='savedRequestsTableBorder'>Время окончания</td><td class='savedRequestsTableBorder'>Время выполнения</td></tr>";
                $savedRequests = $_POST['savedRequests'];
                $savedRequests = explode(";", $savedRequests);
                for ($i = 0; $i < count($savedRequests); $i++) {
                    $parameters = explode(",", $savedRequests[$i]);
                    echo "<tr class='request'>";
                    for ($j = 0; $j < count($parameters); $j++) {
                        echo "<td class='parameter savedRequestsTableBorder'>$parameters[$j]</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
                echo "</tr></td>";
            }
            ?>

<!--            echo "<tr><td>Заданный X:</td><td><span class='answer' id='X'>" . $_POST['X'] . "</span></td></tr>";-->
<!--            echo "<tr><td>Заданный Y:</td><td><span class='answer' id='Y'>" . $_POST['Y'] . "</span></td></tr>";-->
<!--            echo "<tr><td>Заданный R:</td><td><span class='answer' id='R'>" . $_POST['R'] . "</span></td></tr>";-->
<!--            echo "<tr><td>Попала:</td><td><span class='answer' id='DotInArea'>" . $dotInArea . "</span></td></tr>";-->
<!--            echo "<tr><td>Время начала:</td><td><span class='answer' id='StartTime'>" . $start_time . "</span></td></tr>";-->
<!--            echo "<tr><td>Время окончания:</td><td><span class='answer' id='FinishTime'>" ./*. $finishTime*/time() . "</span></td></tr>";-->
<!--            echo "<tr><td>Время работы:</td><td><span class='answer' id='PhpWorkingtime'>" . time()-$start_time . "</span></td></tr>";-->
<!--            echo "</table>";-->
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