<?php



//説明文
$pdo = new PDO('mysql:host=mysql214.phy.lolipop.lan;dbname=LAA1417860-grp1;charset=utf8',
'LAA1417860', 'grp1kaihatu');
$sql = "SELECT * FROM ###";
$selectdata = $pdo->query($sql);
foreach($selectdata as $row){
    echo  $row['###']."<br>";
}
?>