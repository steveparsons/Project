
const socket = new WebSocket('ws://localhost:8080');

socket.onopen = function(event) {
  // Handle connection open
  console.log("CONNEXCTED");
};

socket.onmessage = function(event) {
    const obj = JSON.parse(event.data);
    $('#'+ obj.machine).removeClass();
    let state = obj.state;
    $('#'+ obj.machine).addClass(state);
    $('#'+ obj.machine).html(state.toUpperCase());
  // Handle received message
};

socket.onclose = function(event) {
  // Handle connection close
};


function getDashboardUpdate() {
  socket.send("");
}



$(function() {
    var intervalID = setInterval(function() {
       getDashboardUpdate();
    }, 3000);
    setTimeout(function() {
        clearInterval(intervalID);
    }, 180000);
});
