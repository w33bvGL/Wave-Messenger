console.log("wss Work! Connect to websockets...");

// chat socket
const chatSocket = new WebSocket('ws://localhost:4040');

chatSocket.onopen = function() {
    console.log('chat wss connectet successfuly!.');
};

chatSocket.onclose = function() {
    console.log('chat wss closed.');
};

chatSocket.onerror = function(error) {
    console.error('chat wss not connected!.', error);
};

// status socket 
const statusSocket = new WebSocket('ws://localhost:4040');

statusSocket.onopen = function() {
    console.log('status wss connectet successfuly!.');
};

statusSocket.onclose = function() {
    console.log('status wss closed.');
};

statusSocket.onerror = function(error) {
    console.error('status wss not connected!.', error);
};
