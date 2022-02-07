<?php
require("util/toro.php");
require("util/sqlite.php");
require("util/scorehandler.php");

//Error
ToroHook::add("404",  function () {
    echo json_encode(array('error' => 'Not Found',));
});

// Rutas
Toro::serve(
    array("/" => "ScoreHandler",)
);