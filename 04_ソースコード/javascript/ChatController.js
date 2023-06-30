var ChatController = {
    // 初期化
    init : function () {
      this.getMessage();
    },
  
    // メッセージを送信
    send : function (message) {
      $.ajax({
        url: '../php/ChatController.php',
        type: "POST",
        dataType: "json",
        data: {message : message, action : 'send'},
        success : function(response){
          var message = $('<div>', { "class" : "col-sm-offset-4 col-sm-8 alert alert-success"});
          message.append($('<p>', { "html" : response['username'] + '<br>' +response['message'] }));
          $('.messages').append(message);
        },
        error: function(error){
          console.log(error);
       }
      });
    },
  
    // メッセージを受信
    getMessage : function () {
      setInterval(function () {
        $.ajax({
          url: '../php/ChatController.php',
          type: "POST",
          dataType: "json",
          data: {action : 'get'},
          success : function(response){
            var message = $('<div>', { "class" : "col-sm-8 alert alert-warning"});
            message.append($('<p>', { "html" : response['username'] + '<br>' + response['message'] }));
            $('.messages').append(message);
  
          },
          error: function(error){
            console.log(error);
         }
        });
      }, 5000);
    }
  
  };
  