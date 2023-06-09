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

            $sql = "INSERT INTO User(user_id,user_password,user_name) VALUES (?,?,?)";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$getuserid,PDO::PARAM_INT);
		    $ps->bindValue(2,$getuserpassword,PDO::PARAM_STR);
            $ps->bindValue(3,$getusername,PDO::PARAM_STR);
		    $ps->execute();
        }

        //ユーザーIDでユーザー検索するメソッド
        public function getUserTblById($getid){
            $pdo = $this->dbConnect();

            $sql = "SELECT * FROM User WHERE user_id = ?";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$getid,PDO::PARAM_INT);
		    $ps->execute();

		    $searchArray = $ps->fetchAll();
		    return $searchArray;
        }

        //グループを作成するメソッド
        public function InsertGroupTbl($getgroupname,$getcategorycode,$getgrouptext){
            $pdo = $this->dbConnect();
        }

        //グループIDでグループ検索するメソッド


        //カテゴリーコードでグループ検索するメソッド
        

        //グループ参加退出テーブルをグループIDで検索するメソッド
        

        //グループ参加退出テーブルをユーザーIDで検索するメソッド
        

        //グループ参加退出テーブルに追加するメソッド
        

        //グループ参加退出テーブルのデータを削除するメソッド
        

        //チャットテーブルをグループIDで検索するメソッド
        

        //リアクション情報をチャットIDで検索するメソッド
        

        //カテゴリーを一覧表示するメソッド
        public function getCategoryTbl(){
            $sql = "SELECT * FROM Category";
		    $searchArray = $pdo->query($sql);
		    return $searchArray;
        }
    }
?>