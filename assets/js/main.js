window.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById("loader").style.display = "none";
});

function runtime_prettier(time){
    hours = Math.floor(time / 60);
    final_string = "";
    switch (hours){
        case 0:
            final_string = "";
        break;
        case 1:
            final_string = "1 hour ";
        break;
        default:
            final_string += hours;
            final_string += " hours";
    }
    minutes = time % 60;
    switch (minutes){
        case 0:
        break;
        case 1:
            final_string += " 1 minute";
        break;
        default:
            final_string += " " + minutes;
            final_string += " minutes";
    }
    return final_string;
}

function btnClick(){
  var value = document.getElementById("runtime").innerHTML;
  if(isNaN(value)){
       var arr = value.split(" ");
       var number = parseInt(arr[0]) * 60 + parseInt(arr[2]);
        document.getElementById("runtime").innerHTML = number;
  }else{
      //este numar
        document.getElementById("runtime").innerHTML =  runtime_prettier(value);
  }
}


var now = new Date().getTime();

setInterval(function(){
    now2 = localStorage.getItem('now');
    var d = new Date();
    var t = Math.floor((d.getTime() - now)/1000);
    document.getElementById("timer").innerHTML = "Time spent on this page: " + t + " seconds";
    if(t == 60){
        alert("You have already spent 1 minute on this page. If you did not found what you were looking for, contact the page administration and we will be answering in the shortest time possible. Thank you!")
    }
}, 1000);