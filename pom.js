"use strict";

var bigTime = 1499;
var percent;

var mins;
var secs;

var countdownID;


var minutes = document.getElementById("minutes");
var seconds = document.getElementById("seconds");

var start = document.getElementById("start");
start.addEventListener("click", startTimer, false);

var stop = document.getElementById("stop");
stop.addEventListener("click", stopTimer, false);

var reset = document.getElementById("reset");
reset.addEventListener("click", resetTimer, false);

function counter() {

    // calculate the minutes and seconds from bigTime
    mins = Math.floor(bigTime / 60);
    secs = bigTime - mins * 60;

    // change the HTML to show new minutes and seconds
    minutes.innerHTML = (mins < 10 ? '0' : '') + mins;
    seconds.innerHTML = (secs < 10 ? '0' : '') + secs;

    // animations
    var divisor = 300;
    percent = secs / divisor;
    divisor - 100;

    // switch modes if timer ends
    if (bigTime == 0) {

        if (mode == "normal") {

            // cooldown is 5min
            mode = "cooldown";
            bigTime = 300;

        } else if (mode == "cooldown") {

            // switch back to normal 25min mode
            mode = "normal";
            bigTime = 1499;

            minutes.innerHTML = "25";
            seconds.innerHTML = "00";

            // show start button
            start.style.display = "block";
            stop.style.display = "none";
            reset.style.display = "none";

            // stop timer
            clearInterval(countdownID);
        }

    } else {
        // decrement
        bigTime = bigTime - 1;
    }

}
// start timer
function startTimer() {
    // start timer
    countdownID = setInterval("counter()", 1000);

    // show stop button
    start.style.display = "none";
    stop.style.display = "block";
    reset.style.display = "none";
}

// stop timer
function stopTimer() {

    // stop timer
    clearInterval(countdownID);

    // show reset button
    start.style.display = "none";
    stop.style.display = "none";
    reset.style.display = "block";
}

// reset timer
function resetTimer() {
    // reset big time
    bigTime = 1499;

    // show start button
    start.style.display = "block";
    stop.style.display = "none";
    reset.style.display = "none";
}


