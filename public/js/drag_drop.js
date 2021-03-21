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

    if (ev.target.id.slice(7) == data2.slice(7)) {
        ev.target.appendChild(document.getElementById(data2));
        contAcertos++;
        if (contAcertos === 10) {
            document.getElementById("mensagem").innerHTML = "Congratulations! Você conseguiu completar o desafio!";
        }
    } else {
        alert("Oops! Este não é o bichinho certo.");
    }
}

function play(id) {
    var audio = document.getElementById(id);
    audio.play();
}



var sec = 0;
    function pad ( val ) { return val > 9 ? val : "0" + val; }
    setInterval( function(){
        $("#seconds").html(pad(++sec%60));
        $("#minutes").html(pad(parseInt(sec/60,10)));
    }, 1000);