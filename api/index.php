<?php
require("util/sqlite.php");

function load_players() {
    $query_zan = "SELECT a.KeyName, (SELECT Value FROM Zandronum WHERE Namespace='name' AND KeyName=a.KeyName) AS Alias , a.Value, a.Timestamp FROM Zandronum AS a WHERE a.Namespace='scores' GROUP BY a.KeyName ORDER BY CAST(a.Value AS int) DESC LIMIT 10;";
    $result = array();
    $query = SQLite::getInstance()->query($query_zan);
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $player = [];
        $player[0] = $row['KeyName'];
        $player[1] = $row['Alias'];
        $player[2] = (int)$row['Value'];
        //$player[2] = $row['Timestamp'];
        array_push($result, $player);
    }
    return $result;
}

echo json_encode(load_players());
