//Socket.io
var socket = io();
//Board
var board = [];

//Turns
var turns;
var currentContext;

// Elements
var game = document.getElementById('game');
var boxes = document.querySelectorAll('li');

//Buttons and messages
var resetGame = document.getElementById('reset-game');
var turnDisplay = document.getElementById('whos-turn');
var gameMessages = document.getElementById('game-messages');

//Player score labels
var playerOneScoreCard = document.getElementById('player-one-score');
var playerTwoScoreCard = document.getElementById('player-two-score');

socket.on('board message', function(msg){
	//Updating the board
	board = msg.board;

	//Updating the <li> objects
	//Asking if this client id is different than another sockets id
	if('/#'+socket.id != msg.user){

		//Another player resets the game
		if(msg == 'reset'){ 
			socket.emit('client message','reset');
			location.reload();
		}else{
			//Remove board disable
			$("#game").removeClass('disabled');
			$("#player-turn").text("Your turn");

			//$('#messages').append($('<li>').text(msg.pos));

			//Current position
			var current = msg.pos;

			//Current <li> tag
			var currentLi = $("li[data-pos='" + current +"']");
			currentLi.addClass('x disabled');
			currentLi.text('x');

			turns++;
			checkStatus();
		}
	}
});

//Users context
var context = {
	'player1': 'o',
	'player2': 'x'
};

// Constructor
var init = function() {
	turns = 0;
	// bind events
	for (var i = 0; i < boxes.length; i++) {
		boxes[i].addEventListener('click', clickHandler, false);
	}
}

// Bind the dom element to the click callback
var clickHandler = function() {
	//console.log(this.getAttribute('data-pos'));
	socket.emit('client message', this.getAttribute('data-pos') );
	
	this.removeEventListener('click', clickHandler);

	this.className = context.player1;
	this.innerHTML = context.player1;
	
	$("#game").addClass('disabled');
	$("#player-turn").text("Players turn");
	
	turns++;
	checkStatus();
}

// Check to see if player has won
function checkStatus() {
	//row [0]
	if(boxes[0].innerText == boxes[1].innerText && boxes[0].innerText == boxes[2].innerText && boxes[0].innerText != ""){
		gameWon(boxes[0].innerText);
	}
	//row[1]
	else if(boxes[3].innerText == boxes[4].innerText && boxes[3].innerText == boxes[5].innerText && boxes[3].innerText != ""){
		gameWon(boxes[3].innerText);
	}
	//row[2]
	else if(boxes[6].innerText == boxes[7].innerText && boxes[6].innerText == boxes[8].innerText && boxes[6].innerText != ""){
		gameWon(boxes[6].innerText);
	}
	//col[0]
	else if(boxes[0].innerText == boxes[3].innerText && boxes[0].innerText == boxes[6].innerText && boxes[0].innerText != ""){
		gameWon(boxes[0].innerText);
	}
	//col[1]
	else if(boxes[1].innerText == boxes[4].innerText && boxes[1].innerText == boxes[7].innerText && boxes[1].innerText != ""){
		gameWon(boxes[1].innerText);
	}
	//col[2]
	else if(boxes[2].innerText == boxes[5].innerText && boxes[2].innerText == boxes[8].innerText && boxes[2].innerText != ""){
		gameWon(boxes[2].innerText);
	}
	//diagonal[0]
	else if(boxes[0].innerText == boxes[4].innerText && boxes[0].innerText == boxes[8].innerText && boxes[0].innerText != ""){
		gameWon(boxes[0].innerText);
	}
	//diagonal[1]
	else if(boxes[2].innerText == boxes[4].innerText && boxes[2].innerText == boxes[6].innerText && boxes[2].innerText != ""){
		gameWon(boxes[2].innerText);
	}else if(turns == 9){
		gameDraw();
	}
}

//Gam won function
var gameWon = function(winner) {
	winner = winner == "O" ? "o" : "x"; 
	// show game won message
	gameMessages.className = 'player-' + winner + '-win';
	$("#game").addClass('disabled');
	$("#reset-game").removeClass('invisible');
}

//Game draw function
var gameDraw = function() {
	gameMessages.className = 'draw';
	$("#game").addClass('disabled');
	$("#reset-game").removeClass('invisible');
}

//Reset buttom handler
$("#reset-game").click(function() {
	socket.emit('client message','reset');
	location.reload();
});


game && init();

