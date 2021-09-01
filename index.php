<?php
include "functions.php";

if (isset($_POST['R']) && isset($_POST['X']) && isset($_POST['Y'])) {
    $start_time = microtime(true) * 1000000;
    $dotInArea = checkDot();
}
?>
<!DOCTYPE html>
<html lang="ru"
<head>
    <meta charset="UTF-8">
    <title>WebL1</title>
    <style>


        /*Common*/

        .centering {
            text-align: center;
            margin: auto;
        }

        .common {
            background-color: rgb(76, 76, 76);
            font-weight: bold;
            color: lightgray;
            font-family: Arial;
        }

        body {
            background-color: rgb(76, 76, 76);
            font-weight: bold;
            color: lightgray;
            color: #4D4D4D;
            font-family: Arial;
        }

        .invisible {
            visibility: hidden;
        }

        .visible {
            visibility: visible;
            position: static;
        }

        .fillingLocation {
            width: 100%;
            height: 100%;
        }


        /*Head*/

        .headStyle {
            font-family: Serif;
            color: rgb(253, 253, 253);
            font-size: xxx-large;
            font-weight: bold;
        }

        /*#header{*/
        /*    display: block;*/
        /*    text-decoration: none;*/
        /*}*/

        #header::after{
            content: "";
            display: block;
            width: 100%;
            height: 1px;
            transform: scaleX(0);
            background-color: #E61B43;
            transition: all 1s;
        }

        #header:hover::after{
            transform: scaleX(1);
        }

        /*MainLine*/

        .mainLine {
            border-color: black;
        }

        .mainLine:hover {
            border-color: #E61B43;
        }


        /*Clock*/

        #clock {
            color: rgb(253, 253, 253);
            font-weight: bold;
            font-size: 30px;
        }

        /*main table*/
        #mainTable {  /*наследование*/
            width: 500px;
        }

        /*Blocks (graphic/answer, conditions, submit)*/

        .interface-block {
            border: 1px solid;
            border-color: black;
            border-radius: 15px;

            margin: 10px;
            padding: 5px;
        }


        /*first block*/
        /*requestAnswerTavle*/

        #requestAnswer {
            text-align: center;
            width: 100%;
            height: 90%;
        }

        .requestAnswerTableBlockLeft {
            text-align: right;
            padding-right: 10%;
            width: 50%;
        }

        .requestAnswerTableBlockRight {
            text-align: left;
            padding-left: 10%;
            width: 50%;
        }


        /*second block*/

        .clickedElement {  /*каскадирование*/
            color: rgb(43, 149, 255);
            background: #4D4D4D;
        }

        .clickedElement:hover {
            color: #E61B43;
            cursor: pointer;
            padding: 4px;
        }

        .selectedClickedElement {
            color: #E61B43;
        }

        .selectedClickedElement:hover {
            cursor: pointer;
            padding: 4px;
            color: #E61B43;
        }

        .selectingAreas {
            border: 1px solid;
            border-color: rgb(43, 149, 255);
            border-radius: 3px;
            background-color: #4D4D4D;
        }

        .selectingAreas:hover {
            cursor: pointer;
            border-color: #E61B43;

        }

        #yTextField {
            color: rgb(43, 149, 255);
            font-weight: bold;
            text-align: center;
        }

        #yTextField:focus {
            border: 1px solid;
            border-color: darkmagenta;
        }

        #yTextField::-webkit-input-placeholder {
            color: lightgray;
            text-align: center;
        }

        #yTextField::-moz-placeholder {
            color: rgb(253, 253, 253);
        }

        #yTextField:not(:placeholder-shown) {
            border-color: #E61B43;
        }

        .selectedText {
            color: #E61B43;
        }

        #rPadding {
            text-align: left;
            padding-left: 117px;
        }
        #rPadding:hover {
            text-align: left;
            padding-left: 113px;
        }

        #xPadding {
            text-align: left;
            padding-left: 30px;
        }
        #xPadding:hover {
            text-align: left;
            padding-left: 26px;
        }

        #yPadding {
            text-align: left;
            padding-left: 130px;
        }
        #yPadding:hover {
            text-align: left;
            padding-left: 126px;
        }


        /*submit*/

        #exceptionField {
            font-weight: normal;
            color: #E61B43;
        }

        #submitDiv {
            border: 1px solid;
            border-color: rgb(43, 149, 255);
            border-radius: 15px;
            margin: 10px;
            padding: 5px;
        }

        #submitDiv:hover {
            border-color: #E61B43;
        }

        #submitButton {
            background: #4D4D4D;
            border: 0px solid;
        }


        /*savedTable*/

        .savedRequestsTableBorder {
            border: 1px solid;
            border-color: black;
        }


    </style>
</head>
<body class="common" style="color: #4D4D4D">
<header id="header" class="headStyle centering">
    <div>Кустарев Иван Павлович P3215</div>
    <div>Вариант 15012</div>
<!--    <hr id="mainLine" class="mainLine">-->
</header>
<main id="main" class="invisible">

    <form id="submitForm" onsubmit="return checkBeforeSubmit()" action="index.php" method="post">

        <table id="mainTable" class="centering common"">
            <tr>
                <td>
                    <div id="clock">00:00:00</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="interface-block">
                        <img src='areas.png' alt='Problem with image loading!'>

                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <?php if (isset($dotInArea)) { ?>
                        <div class="interface-block" style="border-color: #E61B43">
                            <table class="centering fillingLocation">
                                <tr>
                                    <td>
                                        <div>Результат:</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php
                                        echo "<table id='requestAnswer' class='centering'>";
                                        echo "<tr><td class='requestAnswerTableBlockLeft'>R:</td><td class='requestAnswerTableBlockRight'><span class='answer' id='R'>" . $_POST['R'] . "</span></td></tr>";
                                        echo "<tr><td class='requestAnswerTableBlockLeft'>X:</td><td class='requestAnswerTableBlockRight'><span class='answer' id='X'>" . $_POST['X'] . "</span></td></tr>";
                                        echo "<tr><td class='requestAnswerTableBlockLeft'>Y:</td><td class='requestAnswerTableBlockRight'><span class='answer' id='Y'>" . $_POST['Y'] . "</span></td></tr>";
                                        if ($dotInArea === "true") {
                                            echo "<tr><td class='requestAnswerTableBlockLeft'>Попала:</td><td class='requestAnswerTableBlockRight'><span class='answer' id='DotInArea'>" . "Да" . "</span></td></tr>";
                                        } else {
                                            echo "<tr><td class='requestAnswerTableBlockLeft'>Попала:</td><td class='requestAnswerTableBlockRight'><span class='answer' id='DotInArea'>" . "Нет" . "</span></td></tr>";
                                        }
                                        $stop_time = microtime(true) * 1000000;
                                        echo "<tr><td class='requestAnswerTableBlockLeft'>Время работы:</td><td class='requestAnswerTableBlockRight'><span class='answer' id='PhpWorkingtime'>" . ($stop_time - $start_time) . " мкс" . "</span></td></tr>";
                                        echo "</table>";
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php } ?>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="interface-block">
                        <table class="fillingLocation">
                            <tr>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <td>
                                                <span id="rTitle">Параметр R</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td id="rPadding">
<!--                                                <span style="border: 1px solid; padding-left: 10px">-->
                                                <span class="clickedElement">
                                                     <input class="rRadio" type="radio" name="R" tabindex="1"
                                                            placeholder="Параметр R"
                                                            value="1">
                                                    <span>1</span>
                                                </span>
                                                <span class="clickedElement">
                                                     <input class="rRadio" type="radio" name="R" tabindex="1"
                                                            placeholder="Параметр R"
                                                            value="1.5">
                                                     <span>1.5</span>
                                                </span>
                                                <span class="clickedElement">
                                                    <input class="rRadio" type="radio" name="R" tabindex="1"
                                                           placeholder="Параметр R"
                                                           value="2">
                                                    <span>2</span>
                                                </span>
                                                <span class="clickedElement">
                                                    <input class="rRadio" type="radio" name="R" tabindex="1"
                                                           placeholder="Параметр R"
                                                           value="2.5">
                                                    <span>2.5</span>
                                                </span>
                                                <span class="clickedElement">
                                                    <input class="rRadio" type="radio" name="R" tabindex="1"
                                                           placeholder="Параметр R"
                                                           value="3">
                                                    <span>3</span>
<!--                                                </span>-->
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
                                            <td id="xPadding">
                                                <span class="clickedElement">
                                                    <input class="xCheckbox" type="checkbox" name="X" tabindex="2"
                                                           placeholder="Параметр X"
                                                           value="-2">
                                                    <span>-2</span>
                                                </span>
                                                <span class="clickedElement">
                                                    <input class="xCheckbox" type="checkbox" name="X" tabindex="2"
                                                           placeholder="Параметр X"
                                                           value="-1.5">
                                                    <span>-1.5</span>
                                                </span>
                                                <span class="clickedElement">
                                                    <input class="xCheckbox" type="checkbox" name="X" tabindex="2"
                                                           placeholder="Параметр X"
                                                           value="-1">
                                                    <span>-1</span>
                                                </span>
                                                <span class="clickedElement">
                                                    <input class="xCheckbox" type="checkbox" name="X" tabindex="2"
                                                           placeholder="Параметр X"
                                                           value="-0.5">
                                                        <span>-0.5</span>
                                                </span>
                                                <span class="clickedElement">
                                                    <input class="xCheckbox" type="checkbox" name="X" tabindex="2"
                                                           placeholder="Параметр X"
                                                           value="0">
                                                    <span>0</span>
                                                </span>
                                                <span class="clickedElement">
                                                    <input class="xCheckbox" type="checkbox" name="X" tabindex="2"
                                                           placeholder="Параметр X"
                                                           value="0.5">
                                                    <span>0.5</span>
                                                </span>
                                                <span class="clickedElement">
                                                    <input class="xCheckbox" type="checkbox" name="X" tabindex="2"
                                                           placeholder="Параметр X"
                                                           value="1">
                                                    <span>1</span>
                                                </span>
                                                <span class="clickedElement">
                                                    <input class="xCheckbox" type="checkbox" name="X" tabindex="2"
                                                           placeholder="Параметр X"
                                                           value="1.5">
                                                    <span>1.5</span>
                                                </span>
                                                <span class="clickedElement">
                                                    <input class="xCheckbox" type="checkbox" name="X" tabindex="2"
                                                           placeholder="Параметр X"
                                                           value="2">
                                                    <span>2</span>
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
                                            <td id="yPadding">
                                                <input id="yTextField" class="selectingAreas" type="text" name="Y"
                                                       tabindex="3"
                                                       placeholder="(-3;3)">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div id="submitDiv" class="">
                        <button id="submitButton" class="fillingLocation" type="submit">
                            <table class="fillingLocation">
                                <tr>
                                    <td>
                                        <span id="exceptionField"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="common" style="font-size: x-large">Проверить точку</span>
                                    </td>
                                </tr>
                            </table>
                        </button>
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
                echo "<tr><td class='savedRequestsTableBorder'>X</td><td class='savedRequestsTableBorder'>Y</td><td class='savedRequestsTableBorder'>R</td><td class='savedRequestsTableBorder'>Попала</td><!--<td class='savedRequestsTableBorder'>Время начала</td><td class='savedRequestsTableBorder'>Время окончания</td>--><td class='savedRequestsTableBorder'>Время выполнения</td></tr>";

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
            <tr>
                <td>
                    <img src="https://se.ifmo.ru/o/helios-theme/images/company_logo.png"
                         alt="Здесь должна быть уточка ВТ">
                </td>
            </tr>
        </table>
    </form>
</main>
<script src="js/script.js"></script>
</body>
</html>