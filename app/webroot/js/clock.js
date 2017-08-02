function clock() {
    var time = new Date();
    var hours = time.getHours();
    var minutes = time.getMinutes();
    var seconds = time.getSeconds();
    if (hours < 10)
        hours = "0" + hours;
    if (minutes < 10)
        minutes = "0" + minutes;
    if (seconds < 10)
        seconds = "0" + seconds;

    $('#hours').text(hours);
    $('#minutes').text(minutes);
    $('#seconds').text(seconds);
}

function runClock() {
    clock();
    setTimeout(runClock, 1000);
};

runClock();