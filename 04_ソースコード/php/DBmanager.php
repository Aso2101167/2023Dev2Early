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

            $group_id = mt_rand(1000000, 9999999);

            $sql = "INSERT INTO Groups(group_id,group_name,category_code,group_text) VALUES(?,?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$group_id,PDO::PARAM_INT);
            $ps->bindValue(2,$getgroupname,PDO::PARAM_STR);
            $ps->bindValue(3,$getcategorycode,PDO::PARAM_STR);
            $ps->bindValue(4,$getgrouptext,PDO::PARAM_STR);
            $ps->execute();

            return $group_id;
        }

        //グループIDでグループ検索するメソッド
        public function getGroupTblByGroupId($getgroupid){
            $pdo = $this->dbConnect();

            $sql = "SELECT g.*, c.category_name 
            FROM Groups g
            INNER JOIN Category c ON g.category_code = c.category_code
            WHERE g.group_id = ?";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$getgroupid,PDO::PARAM_STR);
		    $ps->execute();

		    $searchArray = $ps->fetchAll();
		    return $searchArray;
        }

        //カテゴリーコードでグループ検索するメソッド
        public function getGroupTblByCategoryCode($getcategorycode){
            $pdo = $this->dbConnect();

            $sql = "SELECT * FROM Groups WHERE category_code = ?";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$getcategorycode,PDO::PARAM_STR);
		    $ps->execute();

		    $searchArray = $ps->fetchAll();
		    return $searchArray;
        }

        //グループ参加退出テーブルをグループIDで検索するメソッド
        public function getGroupInfoTblByGroupId($getgroupid){
            $pdo = $this->dbConnect();

            $sql = "SELECT * FROM Group_info WHERE group_id = ?";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$getgroupid,PDO::PARAM_STR);
		    $ps->execute();

		    $searchArray = $ps->fetchAll();
		    return $searchArray;
        }

        //グループ参加退出テーブルをユーザーIDで検索するメソッド
        public function  getGroupInfoTblByUserId($getid){
            $pdo = $this->dbConnect();

            $sql = "SELECT Group_info.*, Groups.group_name
            FROM Group_info
            JOIN Groups ON Group_info.group_id = Groups.group_id
            WHERE Group_info.user_id = ?";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$getid,PDO::PARAM_INT);
		    $ps->execute();

		    $searchArray = $ps->fetchAll();
		    return $searchArray;
        }

        //グループ参加退出テーブルに追加するメソッド
        public function InsertGroup_infoTbl($getgroupid, $getuserid){
            $pdo = $this->dbConnect();

            $sql = "INSERT INTO Group_info(group_id,user_id,join_date) VALUES (?,?,?)";
		    $ps = $pdo->prepare($sql);
            $dayStr = date("Y/m/d");
		    $ps->bindValue(1,$getgroupid,PDO::PARAM_INT);
		    $ps->bindValue(2,$getuserid,PDO::PARAM_INT);
            $ps->bindValue(3,$dayStr,PDO::PARAM_STR);
		    $ps->execute();
        }

        //グループ参加退出テーブルのデータを削除するメソッド
        public function  deleteGroup_infoTbl(){
            $pdo = $this->dbConnect();
        }

        //チャットテーブルをグループIDで検索し表示するメソッド
        public function getChatTblByGroupId($getgroupid){
            $pdo = $this->dbConnect();

            $sql = "SELECT Chat.*, User.user_name, User.user_image
            FROM Chat
            JOIN User ON Chat.user_id = User.user_id
            WHERE Chat.group_id = ?";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$getgroupid,PDO::PARAM_INT);
		    $ps->execute();

		    $searchArray = $ps->fetchAll();
		    return $searchArray;
        }

        //リアクション情報をチャットIDで検索するメソッド
        public function  getReactionTblByChatId(){
            $pdo = $this->dbConnect();

            $sql = "SELECT * FROM User WHERE chat_id = ?";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$getid,PDO::PARAM_INT);
		    $ps->execute();

		    $searchArray = $ps->fetchAll();
		    return $searchArray;
        }

        //カテゴリーを一覧表示するメソッド
        public function getCategoryTbl(){
            $pdo = $this->dbConnect();

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

        public function getLatestChatByGroupId($getgroupid){
            $pdo = $this->dbConnect();

            $sql = "SELECT Chat.chat_id, Chat.chat_sentence, User.user_name,User.user_image
            FROM Chat
            JOIN User ON Chat.user_id = User.user_id
            WHERE Chat.group_id = ?
            ORDER BY Chat.chat_id DESC
            LIMIT 1";
		    $ps = $pdo->prepare($sql);
		    $ps->bindValue(1,$getgroupid,PDO::PARAM_INT);
		    $ps->execute();

		    $searchArray = $ps->fetch();
            return $searchArray;
        }

        public function getLastChatId() {
            $pdo = $this->dbConnect();
        
            $sql = "SELECT MAX(chat_id) FROM Chat";
            $ps = $pdo->prepare($sql);
            $ps->execute();
        
            $lastChatId = $ps->fetchColumn();
            return $lastChatId;
        }

        public function getGroupTblByKeyword($getkeyword){
            $pdo = $this->dbConnect();
        
            $sql = "SELECT * FROM Groups WHERE group_name LIKE ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,'%'.$getkeyword.'%',PDO::PARAM_STR);
            $ps->execute();
        
            $searchArray = $ps->fetchAll();
            return $searchArray;
        }

        public function updateUserImage($userid, $imageFileName) {
            $pdo = $this->dbConnect();

            $sql = "UPDATE User SET user_image = ? WHERE user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $imageFileName, PDO::PARAM_STR);
            $ps->bindValue(2, $userid, PDO::PARAM_STR);
            $ps->execute();
        }

        public function updateUserName($userId, $userName) {
            $pdo = $this->dbConnect();
          
            $sql = "UPDATE User SET user_name = ? WHERE user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $userName, PDO::PARAM_STR);
            $ps->bindValue(2, $userId, PDO::PARAM_STR);
            
            $ps->execute();
        }

        public function deleteGroupMember($groupId, $userId) {
            $pdo = $this->dbConnect();
          
            $sql = "DELETE FROM Group_info WHERE group_id = ? AND user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $groupId, PDO::PARAM_STR);
            $ps->bindValue(2, $userId, PDO::PARAM_STR);
          
            $ps->execute();
        }

        public function updateGroupImage($groupid, $imageFileName) {
            $pdo = $this->dbConnect();

            $sql = "UPDATE Groups SET group_image = ? WHERE group_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $imageFileName, PDO::PARAM_STR);
            $ps->bindValue(2, $groupid, PDO::PARAM_STR);
            $ps->execute();
        }

        public function updateGroupName($groupId, $groupName) {
            $pdo = $this->dbConnect();
          
            $sql = "UPDATE Groups SET group_name = ? WHERE group_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $groupName, PDO::PARAM_STR);
            $ps->bindValue(2, $groupId, PDO::PARAM_STR);
            
            $ps->execute();
        }

        public function updateGroupText($groupId, $groupText) {
            $pdo = $this->dbConnect();
          
            $sql = "UPDATE Groups SET group_text = ? WHERE group_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $groupText, PDO::PARAM_STR);
            $ps->bindValue(2, $groupId, PDO::PARAM_STR);
            
            $ps->execute();
        }
    }
?>