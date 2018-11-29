//Edited to only display current month and following 2 months

var months = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];
var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

var x = true;
var d = new Date();
var currentYear = d.getFullYear();
var currentMonth = d.getMonth();
var nextMonth = (currentMonth + 1);
var displayMonth;

var calCol = 0;
var calRow = 0;
var calColMax = 7;
var calRowMax = 7;
var calStart = 0;
var calEnd = 6;
var calGrid = 0;
var calGridMax = 49;
var calDayCount = 1;
var calDayMax = new Date(currentYear, nextMonth, 0); // last dast of month prior to nextMonth = currentMonth
var calFirstDay = new Date(currentYear, currentMonth, 1);
var text = "";
var direction = "";

window.addEventListener('load', loadCalendar);
window.addEventListener('load', getCurrentMonth);


function loadCalendar() {

    for (; calGrid < calGridMax; calGrid++) { // create day grid
        if ((calGrid % calRowMax) == calStart) { //start row
            text += '<div class="calRow">';
        }

        //start day blocks
        if (calGrid < calRowMax) {
            text += '<div class="calDay">' + days[calGrid].substring(0, 3) + '</div>'; //print the day name
        } else if (calGrid == (calFirstDay.getDay() + calRowMax) && calDayCount <= calDayMax.getDate()) { // match first day to day name
            if (calDayCount <= d.getDay()) { // calendar day < current day = disable day
                //print unselectable
                text += '<div class="calBlock disable">' + calDayCount + '</div>'; //print the day               
            } else {
                text += '<div class="calBlock" id="day' + calDayCount + '" onclick="schedule(' + calDayCount + ')">' + calDayCount + '</div>'; //print the day           
            }
            calDayCount++;
        } else if (calGrid == (calFirstDay.getDay() + calEnd + calDayCount) && calDayCount <= calDayMax.getDate()) {//match first day to first day name AND iterate to print days until calDayMax is reached
            if (calDayCount <= d.getDay()) { // calendar day < current day = disable day
                //print unselectable
                text += '<div class="calBlock disable">' + calDayCount + '</div>'; //print the day               
            } else {
                text += '<div class="calBlock" id="day' + calDayCount + '" onclick="schedule(' + calDayCount + ')">' + calDayCount + '</div>'; //print the day
            }
            calDayCount++;
        } else {
            text += '<div class="calBlock disable">-</div>'; //print the day
        }

        if ((calGrid % calRowMax) === calEnd) { //end row
            text += '</div><!--Row End-->';
        }
    }

    document.getElementById("calendar-days").innerHTML = text;
}

function updateCalendar(m) {
    var nm = m;
    var nmMax = new Date(currentYear, (nm + 1), 0); // get last day the 'm' (selected) month
    var nmFirst = new Date(currentYear, nm, 1);
    text = ""
    calGrid = 0;
    calDayCount = 1;
    for (; calGrid < calGridMax; calGrid++) { // create day grid
        if ((calGrid % calRowMax) == calStart) { //start row
            text += '<div class=\"calRow\">';
        }

        //start day blocks

        if (calGrid < calRowMax) {
            text += '<div class=\"calDay\">' + days[calGrid].substring(0, 3) + '</div>'; //print the day name
        } else if (calGrid == (nmFirst.getDay() + calRowMax) && calDayCount <= nmMax.getDate()) { // match first day to day name
            if (calDayCount <= d.getDay() && nm == currentMonth) { // calendar day < current day= disable day
                //print unselectable
                text += '<div class="calBlock disable">' + calDayCount + '</div>'; //print the day               
            } else {
                //selectable
                text += '<div class="calBlock" onclick="schedule(' + calDayCount + ')">' + calDayCount + '</div>'; //print the day               
            }
            calDayCount++;
        } else if (calGrid == (nmFirst.getDay() + calEnd + calDayCount) && calDayCount <= nmMax.getDate()) {//match first day to first day name AND iterate to print days until calDayMax is reached
            if (calDayCount <= d.getDay() && nm == currentMonth) {
                //print unselectable
                text += '<div class="calBlock disable">' + calDayCount + '</div>'; //print the day               
            } else {
                text += '<div class="calBlock" onclick="schedule(' + calDayCount + ')">' + calDayCount + '</div>'; //print the day
            }
            calDayCount++;
        } else {
            text += '<div class="calBlock disable">-</div>'; //print the day
        }

        if ((calGrid % calRowMax) === calEnd) { //end row
            text += '</div><!--Row End-->';
        }
    }

    document.getElementById("calendar-days").innerHTML = text;
}

function getCurrentMonth() {
    document.getElementById("month").innerHTML = months[currentMonth];
}

function getMonthFromString(mon) {
    return new Date(Date.parse(mon + " 1, 2018")).getMonth();
}

function monthChange(x) { // successfully change months within span of 2 month from current month
    direction = x;
    displayMonth = getMonthFromString(document.getElementById("month").innerHTML);
    // change up to 2 months
    if (direction == "left") {
        nextMonth = displayMonth - 1;
        if (nextMonth < 0) {
            document.getElementById("month").innerHTML = months[displayMonth + 2];
            updateCalendar(displayMonth + 2);
        } else if (nextMonth < currentMonth) {
            document.getElementById("month").innerHTML = months[displayMonth + 2];
            updateCalendar(displayMonth + 2);
        } else {
            document.getElementById("month").innerHTML = months[nextMonth];
            updateCalendar(nextMonth);
        }
    } else { // direction == "right"
        nextMonth = displayMonth + 1;
        if (nextMonth >= 12) {
            document.getElementById("month").innerHTML = months[currentMonth];
            updateCalendar(currentMonth);
        } else if (nextMonth > (currentMonth + 2)) {
            document.getElementById("month").innerHTML = months[currentMonth];
            updateCalendar(currentMonth);
        } else {
            document.getElementById("month").innerHTML = months[nextMonth];
            updateCalendar(nextMonth);
        }
    }
}

function schedule(day) {
    var app_day = day;
    displayMonth = document.getElementById("month").innerHTML;
    //appointment date hidden = false
    var dayBlock = document.querySelectorAll(".calBlock"); // clean calendar
    dayBlock.forEach( function (item, index){
        if (dayBlock[index].classList.contains("daySelect") ){
            dayBlock[index].classList.remove("daySelect");
        }
    });

    var dayID = "day" + day;
    document.getElementById(dayID).classList.add("daySelect");

    var date = displayMonth + " " + app_day + ", " + currentYear;
    document.getElementById("fschedule-date").value = date;
    document.getElementById("dateRow").hidden = false;
}