/*
* SOcket.io se compone de dos partes:
* 1- Un servidor que se integra con el servidor HTTP de node.js
* 2- Una libreria cliente que se carga en el browser (socket.io client)
*/
var app = require('express')();
var http = require('http').Server(app);
/* SOCKET IO INCLUDE */
var io = require('socket.io')(http);

app.get('/', function(req, res){
  res.sendfile('index.html');
});

/* SOCKET IO CONNECTION */
io.on('connection', function(socket){
  /* Conexión de usuarios */
  console.log('a user connected');
  /* Desconexión de usuarios */
  socket.on('disconnect', function(){
    console.log('user disconnected');
  });
  /* Emisión de mensajes */
  socket.on('chat message', function(msg){
    console.log('message: ' + msg);
    /* Enviar un evento a todos */
    io.emit('chat message', msg);
  });

});

http.listen(3000, function(){
  console.log('listening on *:3000');
});