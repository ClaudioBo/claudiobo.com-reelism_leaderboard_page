<?php
class SQLite {
    private static $instance = null;
    public static function getInstance() {
        try {
            self::$instance = new PDO('sqlite:/var/www/claudio/default/leaderboard/api/util/database.db');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return self::$instance;
    }
}
