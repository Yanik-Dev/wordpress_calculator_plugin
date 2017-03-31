/**
 * Defines the functions and global variables for the calculatr plugin
 * to function correctly..
 * 
 * @author Yanik Blake &Rahiem Williams
 */

//GLOBAL VARIABLES
let evaluationString = "0"
let display = ""
let lastValue = 0;
let lastDigitClicked = 0;
let isPowerPressed = false

//remove the leading zero from the display when number is 2 s.f
function removeLeadingZero(el) {
    if (!isNaN(document.getElementById("output").value[1]) && document.getElementById("output").value[0] == "0" && document.getElementById("output").value.length > 1) { 
        display = display.slice(1)
        document.getElementById("output").value = document.getElementById("output").value.slice(1)
        lastDigitClicked = lastDigitClicked.slice(1)
    }
}

//clears the ouput screen
function clearOutput() {
    document.getElementById("output").value = "0"
    display = evaluationString = lastDigitClicked = "0"
    isPowerPressed = false
}

//check if basic operations are selected
//and append it to the evaluation string
function evalBasicOperator(el) {
    let operator = null
    if (isNaN(el.value)) {
        switch (el.value) {
            case "+":
                operator = "+"
                break
            case "-":
                operator = "-"
                break
            case "/":
                operator = "/"
                break
            case "*":
                operator = "*"
                break
            case "%":
                operator = "%"
                break
        }
    }
    return operator
}

//check if complex operations are selected
//and append it to the evaluation string
function evalComplexOperator(el) {
    switch (el.value) {
        case "LOG":
            display = eval("Math.log(" + lastDigitClicked + ")")
            if(!isNaN(display)){
                evaluationString = eval("Math.log(" + lastDigitClicked + ")")
            }else{
                display = evaluationString =0;
            }
            lastDigitClicked = display
            break
        case "SQRT":
            display = eval("Math.sqrt(" + lastDigitClicked + ")")
                if(!isNaN(display)){
                evaluationString = eval("Math.sqrt(" + lastDigitClicked + ")")
                }else{
                    display = evaluationString =0;
                }
            lastDigitClicked = display
            break
        case "CUBRT":
            display = eval("Math.cbrt(" + lastDigitClicked + ")")
            evaluationString = eval("Math.cbrt(" + lastDigitClicked + ")")
            lastDigitClicked = display
            break
        case "TAN":
            display = eval("Math.tan(" + lastDigitClicked + ")")
            evaluationString = eval("Math.tan(" + lastDigitClicked + ")")
            lastDigitClicked = display
            break
        case "COS":
            display = eval("Math.cos(" + lastDigitClicked + ")")
            evaluationString = eval("Math.cos(" + lastDigitClicked + ")")
            lastDigitClicked = display
            break
        case "SIN":
            display = eval("Math.sin(" + lastDigitClicked + ")")
            evaluationString = eval("Math.sin(" + lastDigitClicked + ")")
            lastDigitClicked = display
            break
        default:
            return false
    }
    console.log(evaluationString)
    return true

}

//calculates and display a number raised to x power
function calculatePower(event) {
    let dString = display.toString();
    
    if(!isPowerPressed && lastValue == '^'){
        isPowerPressed = true
    }else if(isPowerPressed){
        display += (dString.charAt(dString.length - 1) == "^") ? event.value : "^"
        display = eval("Math.pow(" + lastDigitClicked + "," + event.value + ")")
        evaluationString = eval("Math.pow(" + lastDigitClicked + "," + event.value + ")")
        lastDigitClicked = display
        isPowerPressed = false
        return true
    }
    return false
}

//handles and evaluate operations
//based on the button the user clicked
function buttonClickHandler(el) {
    removeLeadingZero(el)
    lastValue = el.value

    let basicOperator = evalBasicOperator(el)
    if (calculatePower(el)) {

    }
    else if (basicOperator != null) {
        display += basicOperator
        evaluationString += basicOperator
        if(basicOperator == "-" || basicOperator =="+"){
            lastDigitClicked += basicOperator
        }
    } else if (!evalComplexOperator(el)) {
        if(!isNaN(el.value)){
            if(!isNaN(lastValue)){
                lastDigitClicked += el.value
            }else{
                lastDigitClicked = el.value
            }
        }
        display += el.value
        evaluationString += el.value
    }
    document.getElementById("output").value = display
}

//displays the result when user clicks equal button
function calculate() {
    console.log(evaluationString)
    try {
        evaluationString = eval(evaluationString)
    } catch (e) {
        document.getElementById("output").value = "error";
    }
    display = evaluationString
    document.getElementById("output").value = evaluationString
}