<?php
require("util/toro.php");
require("util/sqlite.php");
require("util/scorehandler.php");

//Error
ToroHook::add("404",  function () {
    echo json_encode(array('error' => 'Not Found',));
});
ToroHook::add("500",  function () {
    echo json_encode(array('error' => 'Internal Error',));
});

// Rutas
Toro::serve(
    array("/" => "ScoreHandler",)
);