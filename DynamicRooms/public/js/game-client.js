  //Socket.io -- Client socket
      var socket = io();
      //Board
      var board = [];
      //Turns
      var turns;
      //Context
      var currentContext;
      //Oponnent
      var opponent = '';
      
      //Borrar
      var flag = false;

      //Buttons and messages
      var resetGame = document.getElementById('reset-game');
      var turnDisplay = document.getElementById('whos-turn');
      var gameMessages = document.getElementById('game-messages');

      //User response
      var response = false;
      var game_flag = false;

      // Game elements
      var game = document.getElementById('game');
      var boxes = document.querySelectorAll('li');

      //Users context
      var context = {
        'player1': 'o',
        'player2': 'x'
      };

      /************ CONNECTION ¨****************/
      $('form').submit(function(){
        socket.emit('connection message', $('#m').val());
        $('#m').val('');
        return false;
      });

      function liUser(id){
        opponent = id;
        var connection_conf = {
          'from':'/#'+socket.id,
          'to':id,
          'state':0
        }
        $('#usersList').addClass('disabled');
        $('#waiting-msg').show();
        response = true;
        socket.emit('connection message', connection_conf);
      }
      //Socket necessary to connection
      socket.on('connection message', function(msg){
        if(!response){
          var r = confirm("User: "+msg.from+" wants to play with you");
          var state = 0;
          if (r == true) {
            state = 1;
            opponent = msg.from;
            $('#oponnentCatch').hide();
            $('#game-board').show();
          }
          var connection_conf = {
            'from':'/#'+socket.id,
            'to':msg.from,
            'state':state,
          }
          socket.emit('connection message', connection_conf);
        }else{
          if(msg.state == 1){
            $('#messages').append($('<li>').text(msg.from + ' accepted'));
            game_flag = true;
            opponent = msg.from;
            $('#oponnentCatch').hide();
            $('#game-board').show();
          }else{
            $('#messages').append($('<li>').text(msg.from + ' rejected'));
            $('#usersList').removeClass('disabled');
            $('#waiting-msg').hide();
            response = false;
            opponent = '';
          }
        }
      });

      socket.on('users message', function(msg){
        $("#usersList").empty();
        for(var i = 0; i<msg.length; i++){
            if(msg[i].id != '/#'+socket.id){
                var state = msg[i].state == 0 ? 'online' : 'none';

                var appendLi = '<li id="liUser" class="clearfix"><img src="http://lorempixel.com/50/50/" alt="avatar" /><div class="about"><div class="name">'+msg[i].id+'</div><div class="status"><i class="fa fa-circle '+state+'"></i>'+state+'</div></div><button class="btn '+state+'"onClick=" liUser(\''+msg[i].id+'\')">Play</button></li>';

                $('#usersList').append(appendLi);
            }
        }
      });

      socket.on('chat message', function(msg){
        if(msg.user != '/#'+socket.id && msg.user == opponent){
          $('#messages').append($('<li>').text(msg.message));
        }
      });
      /*********************************************************/
      /***************** GAME **********************************/
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
        var message = {
          'from': '/#'+socket.id,
          'to':opponent,
          'pos':this.getAttribute('data-pos')
        }

        socket.emit('client message', message );
        
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
        if(boxes[0].innerText == boxes[1].innerText && boxes[0].innerText == boxes[2].innerText && boxes[0].innerText != "" && boxes[0].innerText != null){
          gameWon(boxes[0].innerText);
        }
        //row[1]
        else if(boxes[3].innerText == boxes[4].innerText && boxes[3].innerText == boxes[5].innerText && boxes[3].innerText != "" && boxes[3].innerText != null){
          gameWon(boxes[3].innerText);
        }
        //row[2]
        else if(boxes[6].innerText == boxes[7].innerText && boxes[6].innerText == boxes[8].innerText && boxes[6].innerText != "" && boxes[6].innerText != null){
          gameWon(boxes[6].innerText);
        }
        //col[0]
        else if(boxes[0].innerText == boxes[3].innerText && boxes[0].innerText == boxes[6].innerText && boxes[0].innerText != "" && boxes[0].innerText != null){
          gameWon(boxes[0].innerText);
        }
        //col[1]
        else if(boxes[1].innerText == boxes[4].innerText && boxes[1].innerText == boxes[7].innerText && boxes[1].innerText != "" && boxes[1].innerText != null){
          gameWon(boxes[1].innerText);
        }
        //col[2]
        else if(boxes[2].innerText == boxes[5].innerText && boxes[2].innerText == boxes[8].innerText && boxes[2].innerText != "" && boxes[2].innerText != null){
          gameWon(boxes[2].innerText);
        }
        //diagonal[0]
        else if(boxes[0].innerText == boxes[4].innerText && boxes[0].innerText == boxes[8].innerText && boxes[0].innerText != "" && boxes[0].innerText != null){
          gameWon(boxes[0].innerText);
        }
        //diagonal[1]
        else if(boxes[2].innerText == boxes[4].innerText && boxes[2].innerText == boxes[6].innerText && boxes[2].innerText != "" && boxes[2].innerText != null){
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
        location.reload();
      });
      game && init();

      socket.on('board message', function(msg){
        //Updating the board
        board = msg.board;

        //Updating the <li> objects
        //Asking if this client id is different than another sockets id
        

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
        
    });

