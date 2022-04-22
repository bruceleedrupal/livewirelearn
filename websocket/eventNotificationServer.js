var WebSocketServer = require("websocket").server;
var http = require("http");
var htmlEntity = require("html-entities");
var PORT = 3289;

var clients = [];

var server = http.createServer();

server.listen(PORT, function () {
    console.log("Server is listening on PORT:" + PORT);
});

wsServer = new WebSocketServer({
    httpServer: server,
});

wsServer.on("request", function (request) {
    var connection = request.accept(null, request.origin);
    var index = client.push(connection) - 1;
    console.log("Client", index, "connection");

    connection.on("message", function (message) {
        console.log("message");
    });

    connection.on("close", function (message) {
        clients.splice(index, 1);
        console.log("message", index, "was disconnected");
    });
});
