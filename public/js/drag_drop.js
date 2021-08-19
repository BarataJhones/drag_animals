//Timer
// Convert time to a format of hours, minutes, seconds, and milliseconds

function timeToString(time) {
    let diffInHrs = time / 3600000;
    let hh = Math.floor(diffInHrs);

    let diffInMin = (diffInHrs - hh) * 60;
    let mm = Math.floor(diffInMin);

    let diffInSec = (diffInMin - mm) * 60;
    let ss = Math.floor(diffInSec);

    let diffInMs = (diffInSec - ss) * 100;
    let ms = Math.floor(diffInMs);

    let formattedMM = mm.toString().padStart(2, "0");
    let formattedSS = ss.toString().padStart(2, "0");
    let formattedMS = ms.toString().padStart(3, "0");

    return `${formattedMM}:${formattedSS}:${formattedMS}`;
}

// Declare variables to use in our functions below

let startTime;
let elapsedTime = 0;
let timerInterval;

// Create function to modify innerHTML

function print(txt) {
    document.getElementById("display").innerHTML = txt;
    document.getElementById("timerResult").innerHTML = txt;
    document.getElementById('timerResultForm').value = innerHTML = txt;
}

// Create "start" function

function start() {
    startTime = Date.now() - elapsedTime;
    timerInterval = setInterval(function printTime() {
        elapsedTime = Date.now() - startTime;
        print(timeToString(elapsedTime));
    }, 10);
}

// Create event listeners
playButton.addEventListener("click", start);

//Drag and drop
var contAcertos = 0;

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    var data1 = ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data2 = ev.dataTransfer.getData("text");

    //console.log(data2.slice(7));
    //console.log(ev.target.id.slice(7));
    
    $('#modalFinish').modal({ show: false})

    if (ev.target.id.slice(7) == data2.slice(7)) {
        ev.target.appendChild(document.getElementById(data2));
        contAcertos++;
        if (contAcertos === 10) {
            document.getElementById("mensagem").removeAttribute('hidden');
            clearInterval(timerInterval);
            document.getElementById("playButton").setAttribute("hidden", true);
            document.getElementById("display").setAttribute("hidden", true);
            $('#modalFinish').modal('show');
        }
    } else {
        $('#modalError').modal('show');
    }
}

//Play audio
function play(id) {
    var audio = document.getElementById(id);
    audio.play();
}