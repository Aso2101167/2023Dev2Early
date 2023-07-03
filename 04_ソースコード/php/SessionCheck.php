<?php 
    class SessionCheck{
        //セッションをチェックするメソッド
        public function checkSession(){
		    session_start();
            if (!isset($_SESSION['userid'])) {
                // セッションがない場合はログインページにリダイレクト
                header("Location: ../html/login.html");
                exit();
            }
        }
    }
?>