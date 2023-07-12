var Main = {

    // 初期化
    init : function () {
      this.addEventListener();
      ChatController.init();
    },
  
    // イベントハンドラを登録
    addEventListener : function () {
      $('#message')
        .bind("keydown", function(e) {
          if (e.which == 13 && $(this).val()!=''){
            ChatController.send($(this).val());
            $(this).val('');
          }
        });
    },
  
  
  // イベントハンドラを登録
addEventListener: function () {
  $('#message').bind("keydown", function (e) {
    if (e.which == 13 && $(this).val() != '') {
      ChatController.send($(this).val());
      $(this).val('');
    }
  });

  // 送信ボタンをクリックしたときの処理
  $('button').click(function () {
    var message = $('#message').val();
    if (message != '') {
      ChatController.send(message);
      $('#message').val('');
    }
  });
}
};
