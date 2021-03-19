function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    var data1 = ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data2 = ev.dataTransfer.getData("text");

    console.log(data2.slice(7));
    console.log(ev.target.id.slice(7));

    if (ev.target.id.slice(7) == data2.slice(7)) {
        ev.target.appendChild(document.getElementById(data2));
    } else {
        alert("Oops! Este não é o bichinho certo.");
    }

}