<?php 
    //データベースを操作するファイル
    class DBManager {
        //データベース接続のメソッド
        private function dbConnect(){
            $pdo = new PDO('mysql:host=;dbname=;charset=utf8',
							'', '');
		    return $pdo;
        }

        //ユーザー新規登録するメソッド
        public function InsertUserTbl($getuserid,$getuserpassword,$getusername){
            $pdo = $this->dbConnect();

        }

        //ユーザーIDでユーザー検索するメソッド
        public function getUserTblById($getid){
            $pdo = $this->dbConnect();
        }

        //グループを作成するメソッド
        public function InsertGroupTbl($getgroupname,$getcategorycode,$getgrouptext){
            $pdo = $this->dbConnect();
        }

        //グループIDでグループ検索するメソッド
        public function  (){
            $pdo = $this->dbConnect();
        }

        //グループ参加退出テーブルをグループIDで検索するメソッド
        public function  (){
            $pdo = $this->dbConnect();
        }

        //グループ参加退出テーブルをユーザーIDで検索するメソッド
        public function  (){
            $pdo = $this->dbConnect();
        }

        //グループ参加退出テーブルに追加するメソッド
        public function  (){
            $pdo = $this->dbConnect();
        }

        //グループ参加退出テーブルのデータを削除するメソッド
        public function  (){
            $pdo = $this->dbConnect();
        }

        //チャットテーブルをグループIDで検索するメソッド
        public function  (){
            $pdo = $this->dbConnect();
        }

        //リアクション情報をチャットIDで検索するメソッド
        public function  (){
            $pdo = $this->dbConnect();
        }
    }
?>