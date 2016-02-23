//Express basic server setup
var express = require('express');
var app = express();
var server = require('http').createServer(app);

//Socket.io setup
var io = require('socket.io')(server);

//Port setup(localhost)
var port = process.env.PORT || 3000;

var flash = require('req-flash');

//Console message
server.listen(port, function(){
	console.log('Server listening at port: %d', port);
});

//Router
app.use(express.static(__dirname + '/public'));

var dbOperations = require("./dbOperations.js");

app.get('/', function(req, res){
	if (req.param("error" == 1)) { 
	// do stuff bassed off that error match
	console.log("si");
	}; 
});

app.get('/login', function(req, res){
	if(req.query['username'] == "" || req.query['password'] == ""){
		return;
	}else{
		var data = { "usr": req.query['username'],"pss": req.query['password'] };
		dbOperations.getRecords(req, res, data);
	}
});

// Setup game board
var board = [];

//turns
var turns;
turns = 0;

//Board init
// Setup 3 x 3 board 
board[0] = new Array(3);
board[1] = new Array(3);
board[2] = new Array(3);

console.log(board);
//Socket.io
/*io.on('connection', function(socket){
	io.emit('message ', socket.id );
	for (var socketId in io.nsps['/'].adapter.rooms['/']) {
    	//console.log(io.sockets.connected[socketId]);
	}
	//console.log(io.sockets.connected);
	//console.log(socket.id + ' connected');
});*/

io.on('connection', function(socket){	

	for (var socketId in io.nsps['/'].adapter.rooms['/']) {
    	console.log(io.sockets.connected[socketId]);
	}

	socket.on('board message', function(msg){
  		console.log('board message ' + msg);	
  	});

  	socket.on('client message', function(msg){
  		if(msg == "reset"){
			//Reset the turns
			turns = 0;

			//Reset the board
  			board = [];
  			board[0] = new Array(3);
			board[1] = new Array(3);
			board[2] = new Array(3);

			console.log(board);

			io.emit('board message', 'reset');
			
  		}else{
  			console.log(turns);
	  		turns++;
	  		console.log('client message ' + msg);
			var pos = msg.split(',');
	  		if(board[pos[0]][pos[1]] != 1 && board[pos[0]][pos[1]] != 0 ){
	  			var currentContext = (turns % 2 == 0) ? 0 : 1;
				board[pos[0]][pos[1]] = currentContext;
				console.log(board);
			}

			var message = {
				'user': socket.id,
				'board':board,
				'pos':msg
			}

			console.log(message);
			io.emit('board message', message);
		}
  	});
});


