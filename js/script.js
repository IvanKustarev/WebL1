function f() {
    let documentElement = document.documentElement;
    let checkboxes = documentElement.getElementsByClassName("checkbox");
    let checkboxCounter = 0;
    for(let checkbox of checkboxes){
        if(checkbox.checked){
            checkboxCounter++;
        }
    }
    if(checkboxCounter > 1){
        alert("Выбирите только один X");
        for (let checkbox of checkboxes){
            checkbox.checked = false;
        }
    }
}

let PP = document.getElementById("PP");
PP.onclick = f;