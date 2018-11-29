/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function showForm(client){
    
    if (client === "firstClient"){
        document.getElementById("first-clientForm").hidden = false;
        document.getElementById("regular-clientForm").hidden = true;
        //console.log("function complete - showForm(firstClient)");
    } else if (client === "regularClient") {
        document.getElementById("first-clientForm").hidden = true;
        document.getElementById("regular-clientForm").hidden = false;
        //console.log("function complete - showForm(regularClient)");
    } else {
        document.window.alert("Something is wrong with the pass-by-value");
        console.log("function complete - showForm(else)");
    }
}

function checkAll (source){
    checkboxes = document.getElementsByName('cb');
    for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = source.checked;
    }
    document.getElementById("terms").hidden = source.checked;
}

function processPHP(client){
    var clientName = client;
    window.location.href = 'index.html';
    alert("Thank you, " + clientName +", for being a first time client! Yumi Xyra will contact you ASAP");
}

var nameErr;
var emailErr;
var phoneErr;
var appointmentErr;
var conditionsErr;

function processPHPerror(error1,error2,error3,error4,error5){
    nameErr = error1;
    emailErr = error2;
    phoneErr = error3;
    appointmentErr = error4;
    conditionsErr = error5;

    window.location.href = 'schedule.html';
    showForm("firstClient");
    
}
