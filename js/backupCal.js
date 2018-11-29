// Current Year Calendar only


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
            text += '<div class=\"calRow\">';
        }

        //start day blocks
        if (calGrid < calRowMax) {
            text += '<div class=\"calDay\">' + days[calGrid].substring(0, 3) + '</div>'; //print the day name
        } else if (calGrid == (calFirstDay.getDay() + calRowMax) && calDayCount <= calDayMax.getDate()) { // match first day to day name
            text += '<div class=\"calBlock\" onclick="schedule(' + calDayCount + ')">' + calDayCount + '</div>'; //print the day           
            calDayCount++;
        } else if (calGrid == (calFirstDay.getDay() + calEnd + calDayCount) && calDayCount <= calDayMax.getDate()) {//match first day to first day name AND iterate to print days until calDayMax is reached
            text += '<div class=\"calBlock\" onclick="schedule(' + calDayCount + ')">' + calDayCount + '</div>'; //print the day
            calDayCount++;
        } else {
            text += '<div class=\"calBlock\">-</div>'; //print the day
        }

        if ((calGrid % calRowMax) === calEnd) { //end row
            text += '</div><!--Row End-->';
        }
    }

    document.getElementById("calendar-days").innerHTML = text;
}

function updateCalendar(m) {
    var nm = m;
    var nmMax = new Date(currentYear, (nm+1), 0);
    var nmFirst = new Date(currentYear, nm, 1);
    text =""
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
            text += '<div class=\"calBlock\" onclick="schedule(' + calDayCount + ')">' + calDayCount + '</div>'; //print the day           
            calDayCount++;
        } else if (calGrid == (nmFirst.getDay() + calEnd + calDayCount) && calDayCount <= nmMax.getDate()) {//match first day to first day name AND iterate to print days until calDayMax is reached
            text += '<div class=\"calBlock\" onclick="schedule(' + calDayCount + ')">' + calDayCount + '</div>'; //print the day
            calDayCount++;
        } else {
            text += '<div class=\"calBlock\">-</div>'; //print the day
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

function monthChange(x) {
    direction = x;
    displayMonth = getMonthFromString(document.getElementById("month").innerHTML);
    if (direction == "left") {
        nextMonth = displayMonth -1;
        if (nextMonth < 0) {
            document.getElementById("month").innerHTML = months[11];
            updateCalendar(11);
        } else {
            document.getElementById("month").innerHTML = months[nextMonth];
            updateCalendar(nextMonth);
        }
    } else {
        nextMonth = displayMonth +1;
        if (nextMonth >= 12) {
            document.getElementById("month").innerHTML = months[0];
            updateCalendar(0);
        } else {
            document.getElementById("month").innerHTML = months[nextMonth];
            updateCalendar(nextMonth);
        }
    }
}


/* 


function changeMonth(x) {

    document.getElementById("calendar-month").innerHTML = months[currentMonth];
}

$(function () {
    function c() {
        p(); var e = h(); var r = 0; var u = false; l.empty();
        while (!u) {
            if (s[r] == e[0].weekday) {
                u = true
            } else {
                l.append('<div class="blank"></div>'); r++
            }
        } for (var c = 0; c < 42 - r; c++) {
            if (c >= e.length) {
                l.append('<div class="blank"></div>')
            } else {
                var v = e[c].day;
                var m = g(d(t, n - 1, v)) ? '<div class="today">' : "<div>";
                l.append(m + "" + v + "</div>")
            }
        } var y = o[n - 1];
        a.css("background-color", y).find("h1").text(i[n - 1] + " " + t);
        f.find("div").css("color", y);
        l.find(".today").css("background-color", y);
        d()
    }
    function h() {
        var e = [];
        for (var r = 1; r < v(t, n) + 1; r++) {
            e.push({ day: r, weekday: s[m(t, n, r)] })
        } return e
    }
    function p() {
        f.empty();
        for (var e = 0; e < 7; e++) {
            f.append("<div>" + s[e].substring(0, 3) + "</div>")
        }
    }
    function d() {
        var t;
        var n = $("#calendar").css("width", e + "px");
        n.find(t = "#calendar_weekdays, #calendar_content").css("width", e + "px").find("div").css({ width: e / 7 + "px", height: e / 7 + "px", "line-height": e / 7 + "px" });
        n.find("#calendar_header").css({ height: e * (1 / 7) + "px" }).find('i[class^="icon-chevron"]').css("line-height", e * (1 / 7) + "px")
    }
    function v(e, t) {
        return (d(e, t, 0)).getDate()
    }
    function m(e, t, n) {
        return (d(e, t - 1, n)).getDay()
    }
    function g(e) {
        return y(d) == y(e)
    } function y(e) {
        return e.getFullYear() + "/" + (e.getMonth() + 1) + "/" + e.getDate()
    }
    function b() {
        var e = d; t = e.getFullYear(); n = e.getMonth() + 1
    }
    var e = 480;
    var t = 2013;
    var n = 9;
    var r = [];
    var i = ["JANUARY", "FEBRUARY", "MARCH", "APRIL", "MAY", "JUNE", "JULY", "AUGUST", "SEPTEMBER", "OCTOBER", "NOVEMBER", "DECEMBER"];
    var s = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var o = ["#16a085", "#1abc9c", "#c0392b", "#27ae60", "#FF6860", "#f39c12", "#f1c40f", "#e67e22", "#2ecc71", "#e74c3c", "#d35400", "#2c3e50"];
    var u = $("#calendar");
    var a = u.find("#calendar_header");
    var f = u.find("#calendar_weekdays");
    var l = u.find("#calendar_content");
    b();
    c();
    a.find('i[class^="icon-chevron"]').on("click", function () {
        var e = $(this); var r = function (e) {
            n = e == "next" ? n + 1 : n - 1;
            if (n < 1) {
                n = 12; t--
            } else if (n > 12) {
                n = 1; t++
            } c()
        };
        if (e.attr("class").indexOf("left") != -1) {
            r("previous")
        } else { r("next") }
    })
})
*/