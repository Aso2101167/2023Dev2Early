<?php 
    //データベースを操作するファイル
    class DBManager {
        //データベース接続のメソッド
        private function dbConnect(){
            $pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417860-grp1;charset=utf8',
							'LAA1417860', 'grp1kaihatu');
		    return $pdo;
        }

        //ユーザー新規登録するメソッド
        public function InsertUserTbl($getuserid,$getuserpassword,$getusername){
            $pdo = $this->dbConnect();

            $sql = "INSERT INTO carts(user_id,user_password,user_name) VALUES (?,?,?)";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$getuserid,PDO::PARAM_INT);
		    $ps->bindValue(2,$getuserpassword,PDO::PARAM_STR);
            $ps->bindValue(2,$getusername,PDO::PARAM_STR);
		    $ps->execute();
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

        //カテゴリーコードでグループ検索するメソッド
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

        //カテゴリーを一覧表示するメソッド
        public function getCategoryTbl(){
            $sql = "SELECT * FROM Category";
		    $searchArray = $pdo->query($sql);
		    return $searchArray;
        }
    }
?>