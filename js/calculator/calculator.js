function getInputValues() {
    let fnumber = parseFloat(document.getElementById("fnumber").value);
    let lnumber = parseFloat(document.getElementById("lnumber").value);
    return { fnumber, lnumber };
}


function sum(){
    const { fnumber, lnumber } = getInputValues();
    var sum=fnumber+lnumber;
    document.getElementById("result").value= sum;
}
function subtract(){
    const { fnumber, lnumber } = getInputValues();
    var result=fnumber-lnumber;
    document.getElementById("result").value= result;
}
function multiplication(){
    const { fnumber, lnumber } = getInputValues();
    var result=fnumber*lnumber;
    document.getElementById("result").value=result;
}
function division(){
    const { fnumber, lnumber } = getInputValues();
    var result=fnumber/lnumber;
    document.getElementById("result").value=result;
}