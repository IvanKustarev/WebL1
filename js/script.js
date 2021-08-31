let clickedElements = document.documentElement.getElementsByClassName("clickedElement");
for (let clickedElement of clickedElements) {
    clickedElement.onclick = function () {
        let child = clickedElement.children[0];
        if (event.target === child) {
            if (clickedElement.classList.contains("selectedClickedElement")) {
                clickedElement.classList.remove("selectedClickedElement");
                clickedElement.classList.add("clickedElement");
            } else {

                clickedElement.classList.remove("clickedElement");
                clickedElement.classList.add("selectedClickedElement");
            }
        } else {
            if (child.checked) {
                child.checked = false;
            } else {
                child.checked = true;
            }
            if (clickedElement.classList.contains("selectedClickedElement")) {
                clickedElement.classList.remove("selectedClickedElement");
                clickedElement.classList.add("clickedElement");
            } else {
                clickedElement.classList.remove("clickedElement");
                clickedElement.classList.add("selectedClickedElement");
            }
        }
        if(child.classList.contains("rRadio")){
            let radios = document.documentElement.getElementsByClassName("rRadio");
            for(let radio of radios){
                if(!(radio === child)){
                    if(radio.parentElement.classList.contains("selectedClickedElement")){
                        radio.parentElement.classList.replace("selectedClickedElement", "clickedElement");
                    }
                }
            }
        }
    }
}

let submitDiv = document.getElementById("submitDiv");
submitDiv.onclick = function (){
    document.getElementById("submitButton").click();
    // submitButton.onclick();
}

if (document.getElementById("requestAnswer") === null) {
    startAnimation();
} else {
    makeMainVisible();
}

function makeMainVisible() {
    let main = document.getElementById("main");
    for (let i = 0; i < main.classList.length; i++) {
        main.classList.remove("invisible");
        main.classList.add("visible");
    }
    for (let mainClass of main.classList) {
        console.log(mainClass);
    }
}

function startAnimation() {
    let mainLine = document.documentElement.getElementsByClassName("mainLine")[0];
    let header = document.getElementById("header");
    let start = Date.now();
    let animationTime = 1000;
    let timer = setInterval(function () {
        let timePassed = Date.now() - start;

        if (timePassed >= 1000) {
            clearInterval(timer);
            mainLine.style.width = "";
            makeMainVisible();
            return;
        }
        draw(timePassed);

    }, 20);

    function draw(timePassed) {
        let kofL = document.documentElement.clientWidth / animationTime;
        mainLine.style.width = timePassed * kofL + 'px';
        let kofH = 1 / animationTime;
        // let rgb = header.style.opacity;
        // rgb.substring(5, )
        // console.log(rgb);
        // header.style.color = 'rgba(230, 27, 67, ' + kofH*timePassed + ')';
        header.style.opacity = kofH * timePassed;
    }
}

window.onload = function () {
    window.setInterval(function () {
        var now = new Date();
        var clock = document.getElementById("clock");
        clock.innerHTML = now.toLocaleTimeString();
    }, 1000);
};

var lastRequests = saveLastRequestsParameters();



function checkBeforeSubmit() {

    document.getElementById("exceptionField").innerText = "";

    let rAllRight = checkIsRSelected();
    let xAllRight = isSelectedOneXCheckbox();
    let yAllRight = checkYParameter();

    if (rAllRight && xAllRight && yAllRight) {
        addLastRequestsParameters();
        return true;
    } else {
        return false;
    }
}

function addLastRequestsParameters(){
    let input = document.createElement('input');
    let form = document.getElementById("submitForm");

    if (!(lastRequests === "")) {
        input.setAttribute('name', 'savedRequests');
        input.setAttribute('value', lastRequests);
        input.setAttribute('type', "hidden")
        form.appendChild(input);
    }
}

function saveLastRequestsParameters() {
    // let form = document.documentElement.getElementsByClassName("submitForm")[0];
    // let form = document.getElementById("submitForm");
    // let input = document.createElement('input');
    let inputValue = "";

    if (!(document.getElementById("requestAnswer") === null)) {
        let requestAnswer = document.getElementById("requestAnswer");
        let answerElements = requestAnswer.getElementsByClassName("answer");
        for (let answerElement of answerElements) {
            inputValue += answerElement.innerText + ",";
        }
        inputValue = inputValue.replace(/.$/, ";");
    }


    if (!(document.getElementById("savedRequestsTable") === null)) {
        let savedRequests = document.getElementById("savedRequestsTable").getElementsByClassName("request");
        for (let request of savedRequests) {
            let requestElements = request.getElementsByClassName("parameter");
            for (let element of requestElements) {
                console.log("parameter");
                inputValue += element.innerText + ",";
            }
            inputValue = inputValue.replace(/.$/, ";");
        }
        inputValue = inputValue.replace(/.$/, "");
    }

    if (inputValue.charAt(inputValue.length - 1) === ";") {
        inputValue = inputValue.replace(/.$/, "");
    }

    // if (!(inputValue === "")) {
    //     input.setAttribute('name', 'savedRequests');
    //     input.setAttribute('value', inputValue);
    //     input.setAttribute('type', "hidden")
    //     form.appendChild(input);
    //
    // }

    return inputValue;
}

function checkIsRSelected() {
    let rRadios = document.documentElement.getElementsByClassName("rRadio");
    let checked;
    for (let rRadio of rRadios) {
        if (rRadio.checked) {
            checked = true;
            break;
        }
    }
    document.getElementById("rTitle").classList.remove("selectedText");
    // document.getElementById("rTitle").classList.add("simpleText");
    if (!checked) {
        let exceptionField = document.getElementById("exceptionField");
        exceptionField.innerText = exceptionField.innerText + "Надо выбрать параметр R \n";
        document.getElementById("rTitle").classList.add("selectedText");
        // alert("Надо выбрать параметр R");
        return false;
    } else {
        return true;
    }
}

function checkYParameter() {
    let yTextField = document.getElementById("yTextField");
    document.getElementById("yTitle").classList.remove("selectedText");
    // document.getElementById("yTitle").classList.add("simpleText");
    if (yTextField.value === "") {
        // alert("Необходимо задать параметр Y");
        let exceptionField = document.getElementById("exceptionField");
        exceptionField.innerText = exceptionField.innerText + "Необходимо задать параметр Y \n";
        document.getElementById("yTitle").classList.add("selectedText");

        return false;
    }
    if (isNaN(yTextField.value)) {
        // alert("Параметр Y должен являться числом");
        let exceptionField = document.getElementById("exceptionField");
        exceptionField.innerText = exceptionField.innerText + "Параметр Y должен являться числом \n";
        document.getElementById("yTitle").classList.add("selectedText");
        return false;
    }
    if ((String)(yTextField.value).length > 17) {
        let exceptionField = document.getElementById("exceptionField");
        exceptionField.innerText = exceptionField.innerText + "Слишком длинное число \n";
        document.getElementById("yTitle").classList.add("selectedText");
        return false;
    }
    if (!(-3 < parseFloat(yTextField.value) && parseFloat(yTextField.value) < 3)) {
        // alert("Параметр Y должен быть в диапазоне (-3;3)");
        let exceptionField = document.getElementById("exceptionField");
        exceptionField.innerText = exceptionField.innerText + "Параметр Y должен быть в диапазоне (-3;3) \n";
        document.getElementById("yTitle").classList.add("selectedText");
        return false;
    }
    /*if(yTextField.value.contains('.')){
        let fraction = yTextField.value.split('.')[2];

    }*/
    return true;
}

function isSelectedOneXCheckbox() {
    let documentElement = document.documentElement;
    let checkboxes = documentElement.getElementsByClassName("xCheckbox");
    let checkboxCounter = 0;
    for (let checkbox of checkboxes) {
        if (checkbox.checked) {
            checkboxCounter++;
        }
    }
    document.getElementById("xTitle").classList.remove("selectedText");
    // document.getElementById("xTitle").classList.add("simpleText");
    if (checkboxCounter > 1) {
        // alert("Выбирите только один X");
        let exceptionField = document.getElementById("exceptionField");
        exceptionField.innerText = exceptionField.innerText + "Выбирите только один X \n";
        document.getElementById("xTitle").classList.add("selectedText");
        for (let checkbox of checkboxes) {
            checkbox.checked = false;
        }
        return false;
    } else {
        if (checkboxCounter === 0) {
            // alert("Выбирите один X");
            let exceptionField = document.getElementById("exceptionField");
            exceptionField.innerText = exceptionField.innerText + "Выбирите один X \n";
            document.getElementById("xTitle").classList.add("selectedText");
            return false;
        } else {
            return true;
        }
    }
}