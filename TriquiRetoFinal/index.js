//Express  --> basic server setup
var express = require('express');
var app = express();
var server = require('http').createServer(app);

//Socket.io setup
var io = require('socket.io')(server);

//Port setup(localhost)
var port = process.env.PORT || 3000;

//Console message
server.listen(port, function(){
	console.log('Server listening at port: %d', port);
});

//Router
app.use(express.static(__dirname + '/public'));

// Number of useres connected
var number_of_users = -1;

// Users
var users = [];

var game_rooms = [];

var games;
// Setup game board
//var board = [];

var current_ganes = 0;

io.on('connection', function(socket){
	number_of_users++;

	//State 0 for inactive, 1 for gamming
	users[number_of_users] = {
		'id':socket.id,
		'state':0
	}

	console.log(socket.id + ' connected, there are '+number_of_users+' now');
	//console.log(users);

	io.emit('users message', users);

	socket.on('disconnect', function(){
		delete users[number_of_users];
		number_of_users--;
	
		io.emit('users message', users);
		
		console.log('user disconnected, there are '+number_of_users+' now');

	});
	socket.on('connection message', function(msg){
		io.to(msg.to).emit('connection message',msg);
		if(msg.state == 1){
			var board = [];
			var turns = 0;

			// Setup 3 x 3 board 
			board[0] = new Array(3);
			board[1] = new Array(3);
			board[2] = new Array(3);

			games = {
				'player1': msg.from,
				'player2': msg.to,
				'board': board,
				'turns': turns
			}

			searchUsers(msg.from).state = 1;
			searchUsers(msg.to).state = 1;

			io.emit('users message', users);

			game_rooms[current_ganes] = games;
			current_ganes++;

			console.log(game_rooms);
		}
	});

	socket.on('users message', function(msg){
		io.emmit('users message', msg);
	});

	socket.on('board message', function(msg){
		console.log('board message '+msg);
		//io.emmit('users message', msg);
	});
		
	socket.on('client message', function(msg){
		console.log(socket.id + ' send: '+ msg);

		searchGame(msg.from).turns++;
		var position = msg.pos.split(',');
		if(searchGame(msg.from).board[position[0]][position[1]] != 1 && searchGame(msg.from).board[position[0]][position[1]] != 0 ){
	  		var currentContext = (searchGame(msg.from).turns % 2 == 0) ? 0 : 1;
			searchGame(msg.from).board[position[0]][position[1]] = currentContext;
			console.log(searchGame(msg.from).board);
		}
		var message = {
			'user': msg.from,
			'board':searchGame(msg.from).board,
			'pos':msg.pos
		}
		io.to(msg.to).emit('board message', message);
	});

	socket.on('room message', function(msg){
		console.log('room message: ' + msg);
		io.emit('room message', msg);
	});

});


function roomConnection(user){
	for(var i=0; i<=created_rooms; i++){
		if(rooms[i].player1 == 'nn'){
			rooms[i].player1 = user;
			return;
		}else if(rooms[i].player2 == 'nn'){
			rooms[i].player2 = user;

			//Ready msg to player 1 and 2
			rooms[i].id = rooms[i].player1 + ',' + user;
			io.to(rooms[i].player1).emit('room message', 'ready,' + user);
			io.to(user).emit('room message', 'ready,' + rooms[i].player1);
			return;
		}else{
			createRoom();
		}
	}
	roomConnection();
}

function createRoom(){
	created_rooms++;
	rooms[created_rooms] = {
		'player1': 'nn',
		'player2': 'nn',
		'id': 'nn'
	}
}

function removeUserFromRoom(user){
	for(var i=0; i<=created_rooms; i++){
		if(rooms[i].player1 == user){
			rooms[i].player1 = 'nn';
		}else if(rooms[i].player2 == user){
			rooms[i].player2 = 'nn';	
		}
	}
}

function searchGame(id){
	for(var i=0; i<game_rooms.length; i++){
		if(id == game_rooms[i].player1 || id == game_rooms[i].player2){
			return game_rooms[i];
		}
	}
}

function searchUsers(id){
	for(var i=0; i<users.length; i++){
		if(id == users[i].id || id == users[i].id){
			return users[i];
		}
	}
}