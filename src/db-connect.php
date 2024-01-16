<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1517472-final';
const USER = 'LAA1517472';
const PASS = 'Pass1026';

$connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';
try {
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

function getDatabaseConnection() {
    global $pdo;

    return $pdo;
}
?>