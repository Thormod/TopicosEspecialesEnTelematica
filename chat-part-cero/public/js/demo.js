var socket = io();

      // Envio de mensaje a traves de los botones
      $('#xBut').click(function() {
        socket.emit('chat message', 'x');
      });
      $('#oBut').click(function() {
        socket.emit('chat message', 'o');
      });
      // Envio de mensajes a través del form
      $('form').submit(function(){
        socket.emit('chat message', $('#m').val());
        $('#m').val('');
        return false;
      });
      socket.on('chat message', function(msg){
        $('#messages').append($('<li>').text(msg));
      });