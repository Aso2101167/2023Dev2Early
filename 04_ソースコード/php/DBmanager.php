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

            $sql = "INSERT INTO Users(user_id,user_password,user_name) VALUES (?,?,?)";
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
        public function InsertGroupTbl($getgroupname,$getgrouptext){
            $pdo = $this->dbConnect();

            $sql = "INSERT INTO XXX(group_name,group_text) VALUES(?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$getgroupname,PDO::PARAM_STR);
            $ps->bindValue(2,$getgrouptext,PDO::PARAM_STR);
            $ps->execute();
        }

        //グループIDでグループ検索するメソッド
        public function getGroupTblByGroupId(){
            $pdo = $this->dbConnect();
        }

        //カテゴリーコードでグループ検索するメソッド
        public function getGroupTblByCategoryCode(){
            $pdo = $this->dbConnect();
        }

        //グループ参加退出テーブルをグループIDで検索するメソッド
        public function getGroupInfoTblByGroupId(){
            $pdo = $this->dbConnect();
        }

        //グループ参加退出テーブルをユーザーIDで検索するメソッド
        public function  getGroupInfoTblByUserId(){
            $pdo = $this->dbConnect();
        }

        //グループ参加退出テーブルに追加するメソッド
        public function InsertGroup_infoTbl($getgroupid, $getuserid){
            $pdo = $this->dbConnect();
        }

        //グループ参加退出テーブルのデータを削除するメソッド
        public function  deleteGroup_infoTbl(){
            $pdo = $this->dbConnect();
        }

        //チャットテーブルをグループIDで検索し表示するメソッド
        public function getChatTblByGroupId($getgroupid){
            $pdo = $this->dbConnect();

            $sql = "SELECT * FROM Chat WHERE group_id = ?";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$getgroupid,PDO::PARAM_INT);
		    $ps->execute();

		    $searchArray = $ps->fetchAll();
		    foreach ($searchArray as $row) {
                echo $row['chat_sentence'] . "<br>";
            }
        }

        //リアクション情報をチャットIDで検索するメソッド
        public function  getReactionTblByChatId(){
            $pdo = $this->dbConnect();
        }

        //カテゴリーを一覧表示するメソッド
        public function getCategoryTbl(){
            $sql = "SELECT * FROM Category";
		    $searchArray = $pdo->query($sql);
		    return $searchArray;
        }

        //チャットをテーブルに入れるメソッド
        public function InsertChatTbl($getgroupid, $getuserid, $getchatsentence){
            $pdo = $this->dbConnect();

            $sql = "INSERT INTO Chat(group_id,user_id,chat_sentence,chat_date) VALUES (?,?,?,?)";
		    $ps = $pdo->prepare($sql);
            $dayStr = date("Y/m/d");
		    $ps->bindValue(1,$getgroupid,PDO::PARAM_STR);
		    $ps->bindValue(2,$getuserid,PDO::PARAM_STR);
            $ps->bindValue(3,$getchatsentence,PDO::PARAM_STR);
            $ps->bindValue(4,$dayStr,PDO::PARAM_STR);
		    $ps->execute();
        }
    }
?>