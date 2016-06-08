<?php
//TEMP CONNECTION TO DEVELOPMENT SERVER FOR TESTING CEG
function db_connect() {
    $dsn = "mysql:host=107.170.124.237;dbname=CEG;charset=utf8";
    $opt = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );
    return new PDO($dsn,'cegltd','ow6xLPeQ7PxoC', $opt);
}