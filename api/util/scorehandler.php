<?php

class ProductosHandler {
    function get() {
        echo json_encode(load_players());
    }
}

function load_players() {
    $query_zan = "SELECT a.KeyName, (SELECT Value FROM Zandronum WHERE Namespace='name' AND KeyName=a.KeyName) AS Alias , a.Value, a.Timestamp FROM Zandronum AS a WHERE a.Namespace='scores' GROUP BY a.KeyName ORDER BY CAST(a.Value AS int) DESC LIMIT 10;";
    $result = array();
    $query = SQLite::getInstance()->query($query_zan);
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $player = [];
        $player[0] = $row[0];
        $player[1] = $row[1];
        $player[2] = (int)$row[2];
        $player[3] = $row[3];
        array_push($result, $player);
    }
    return $result;
}
